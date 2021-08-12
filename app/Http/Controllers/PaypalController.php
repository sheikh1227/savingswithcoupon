<?php

namespace App\Http\Controllers;

use App\Models\homeform;
use App\Notifications\CouponNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Notification;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use PayPal\Api\Details;

class PaypalController extends Controller
{
    //
    private $_api_context;

    public function __construct()
    {

        $paypal_configuration = Config::get('paypal');

        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration['client_id'], $paypal_configuration['secret']));
        $this->_api_context->setConfig($paypal_configuration['settings']);
    }

    public function payWithPaypal()
    {
        return view('paywithpaypal');
    }

    public function postPaymentWithpaypal(Request $request)
    {

        if(Auth::user())
        {
            $quantity = $request->button;
            $values =[1,3,5];
    
            $item = homeform::findOrFail($request->product);
    
            if(in_array($quantity,$values))
            {
                $payer = new Payer();
                $payer->setPaymentMethod('paypal');
        
                $item_1 = new Item();
        
                $price = !empty($item->Dprice) ? $item->Dprice : $item->Oprice;
                $item_1->setName($item->sold)
                    ->setCurrency('USD')
                    ->setQuantity($quantity)
                    ->setPrice($price);
        
                $item_list = new ItemList();
                $item_list->setItems(array($item_1));
        
    
        
        
                $amount = new Amount();
                $amount->setCurrency('USD')
                    ->setTotal($quantity*$price);
        
                $transaction = new Transaction();
                $transaction->setAmount($amount)
                    ->setItemList($item_list)
                    ->setDescription('USD')
                    ->setInvoiceNumber(uniqid());
        
                $redirect_urls = new RedirectUrls();
                $redirect_urls->setReturnUrl(URL::route('status'))
                    ->setCancelUrl(URL::route('status'));
        
                $payment = new Payment();
                $payment->setIntent('sale')
                    ->setPayer($payer)
                    ->setRedirectUrls($redirect_urls)
                    ->setTransactions(array($transaction));
        
                try {
        
        
        
        
                    $payment->create($this->_api_context);
                } catch (\PayPal\Exception\PayPalConnectionException $ex) {
                    dd($ex->getData());
                    // if (Config::get('app.debug')) {
                    //     Session::put('error','Connection timeout');
                    //     return redirect()->route('home');                
                    // } else {
                    //     Session::put('error','Some error occur, sorry for inconvenient');
                    //     return redirect()->route('home');                
                    // }
                }
        
                foreach ($payment->getLinks() as $link) {
                    if ($link->getRel() == 'approval_url') {
                        $redirect_url = $link->getHref();
                        break;
                    }
                }
        
                Session::put('paypal_payment_id', $payment->getId());
        
                if (isset($redirect_url)) {
        
                    return redirect()->away($redirect_url);
                }
        
                Session::put('error', 'Unknown error occurred');
                return redirect()->route('home');
            }else{
                return redirect()->back()->with(['error'=>'Something Went Wrong Plase Try Agian']);
            }
          
        }else{
            return redirect()->back()->with(['error'=>'Please Login To Buy Coupon '.'<a href="/login">(Click Here For Login)</a>']);

        }
       
    }

    public function getPaymentStatus(Request $request)
    {
        $payment_id = Session::get('paypal_payment_id');

        Session::forget('paypal_payment_id');
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            Session::put('error', 'Payment Failed Please Try Again ');
            return redirect()->route('home');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));
        $result = $payment->execute($execution, $this->_api_context);

     
        if ($result->getState() == 'approved') {
            Session::put('success', 'Payment success !!');
            Notification::route('mail', Auth::user()->email)
            ->notify((new CouponNotification()));
            return redirect()->route('home');
        }

        Session::put('error', 'Payment failed !!');
        return redirect()->route('home');
    }
}
