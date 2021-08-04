<?php

namespace App\Http\Controllers;


use App\Models\homeform;
use Illuminate\Http\Request;


use Carbon\Carbon;
class AdminController extends Controller
{


    public function __construct()
    {

        $this->middleware('auth');
        $this->middleware('admin');

    }

    public function Insert(Request $request){


        $img=$request->file('txtimage')->getClientOriginalName();

        $request->txtimage->move(public_path('images'), $img);


        homeform::create([
         'sold'=>$request->txtSold,
         'discount'=>$request->txtDiscount,
         'save'=>$request->txtSave,
         'image'=>$img,
         'Oprice'=>$request->txtOrgprice,
         'Dprice'=>$request->txtDisprice,
         'expires'=>$request->txtexpires,
         $request['txtexpires'] =  Carbon::parse($request->txtexpires)->format('Y-m-d'),

         'useonline'=>request('txtUseOnline'),
         'use'=>request('txtUseIn'),
        

        ]);
      return redirect('show');
       }

    public function show(){
        $data=homeform::paginate(4);

        return view('Admin.dashboard',compact('data'));
    }

    public function update(homeform $id){
    
       // $data = [];
        return view('Admin.update',compact('id'));
    }

    public function updatedata(Request $request,homeform $para){
       //  dd(request('txtOrgprice'));

        $updateData =[
            'sold'=>request('txtSold'),
            'discount'=>request('txtDiscount'),
            'save'=>request('txtSave'),

            'Oprice'=>request('txtOrgprice'),
            'Dprice'=>request('txtDisprice'),
            'expires'=>Carbon::parse(request('txtexpires'))->format('d-m-Y'),
            'useonline'=>request('txtUseOnline'),
            'use'=>request('txtUseIn'),
        ];

        if ( $request->has('txtimage'))
        {
            $img=  $request->file('txtimage')->getClientOriginalName();

            $request->txtimage->move(public_path('images'), $img);

            $updateData['image'] = $img;
//            'image'=>$img,
        }
//        $img=request('txtimage')->getClientOriginalName();
//        request('txtimage')->storeAs('public/Img/',$img);
        $para->update( $updateData);
    
           return redirect('show');
           
     }


    public function deletedata(homeform $para){
     //  dd($para);
        $para->delete();
         return redirect('show');
    }


    public  function addNewCoupon()
    {
        return view('Admin.homepageform');
    }
}
