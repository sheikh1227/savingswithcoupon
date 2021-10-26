
    <!DOCTYPE html>
    <html lang="en">
    <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <title>Thankyou Email</title>
      
    </head>
    <body>
        <table style="max-width:600px;border-collapse:collapse;margin:0 auto" cellspacing="0" cellpadding="0" border="0" align="center">
            <tbody>
                <tr>
                    <td>
                        <table style="width:100%;text-align:center" cellspacing="0" cellpadding="8" border="0" align="left">
                            <tbody>
                                <tr>
                                    <td align="left">
                                        Saving With Coupons
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table style="background:white;border:1px solid #e8e9ed;color:#2c4778;line-height:1.25;font-size:100%;border-radius:3px;border-bottom-left-radius:0;border-bottom-right-radius:0;border-top:4px solid #00bdaa" cellspacing="0" cellpadding="30" border="0" align="center">
                            <tbody>
                                <tr>
                                    <td>
                                        <table style="width:100%;font-size:115%;color:#2c4778" cellspacing="0" cellpadding="0" border="0" align="center">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <p></p><b><i>Hello {{ auth()->user()->name }},</i></b>
    
                                                        <p>
                                                            </p>Thank you for your purchase.  Your {{ $coupons->count() }} coupon is shown below.
    
                                                        
                                                        <p>
                                                        
                                                        To use your coupon online, enter the 15-digit coupon code in the "Promotion Code" field of the Lowes Online Shopping Cart on the Lowes website (NOT the Lowes mobile app).
                                                    </p>
                                                    <p>
                                                        To use in-store, show your coupon barcode to the cashier or scan yourself at self-checkout.
                                                        
                                                        
                                                     </p>
                                                        <ol>
                                                            @foreach ($coupons as $item)
                                                            @if(!empty($item->coupon_code))
                                                            <li>
                                                                {{ $item->coupon_code }}
                                                            </li> 
                                                            @endif
                                                                
                                                            @endforeach
                                                          
                                                            </ol>
                                                        
                                                        <p></p>If you have any problems using your coupon please reply to this email.  We are committed to your satisfaction, and we promise we'll help!
    
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table style="width:100%;background:white;border:1px solid #e8e9ed;color:#2c4778;line-height:1.25;font-size:100%;border-top:0;border-radius:3px;border-top-left-radius:0;border-top-right-radius:0" cellspacing="0" cellpadding="30" border="0" align="center">
                            <tbody>
                                <tr>
                                    <td>
                                        <table style="width:100%;font-size:1em" cellspacing="0" cellpadding="0" border="0" align="center">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <p style="margin:0">
                                                            {{-- <i>Be safe,</i><br> --}}
                                                            {{-- <b>Lillie</b> --}}
                                                        </p>
    
                                                <p style="margin:0">
                                                    <b>
                                                        <a href="{{ route('home') }}" rel="noreferrer noreferrer" target="_blank" >Savingwithcoupons.com
                                                        </a>
                                                    </b>
                                                </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
    
    
            </tbody>
        </table>
   </body>
   </html>
   
 


