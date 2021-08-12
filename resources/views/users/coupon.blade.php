
    <!DOCTYPE html>
    <html lang="en">
    <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <title>Thankyou Email</title>
       <style>
           body{
               margin: ;
               padding: 0;
           }
           .top-header-logo-sec{
               width: 100%;
               border-bottom: 1px solid #55c159;
               padding-bottom: 10px;
           }
           .cartlow-logo{
               width: 130px;
           }
           .table-custom{
               width: 100%;
           }
           .table{
               width: 500px;
               border: 1px solid #cfcfcf;
               margin:0 auto;
           }
           /* .table th, table td{
               border: 1px solid #cfcfcf
           } */
           .brdrBtm{
               border-bottom: 1px solid #cfcfcf;
           }
           .brdrLft{
               border-left: 1px solid #cfcfcf
           }
           .brdrRgt{
               border-left: 1px solid #cfcfcf
           }
           .table th{
               font-size: 13px;
           }
           .table td{
               font-size: 12px;
               text-align: center;
           }
           .emailSignature p{
               display:block;
           }
           .emailSignature p:first-child{
               margin-bottom: 5px;
           }
           .emailSignature p:nth-child(2){
               margin-top:0px;
           }
           .whtNext li {
                font-size: 14px;
                margin-bottom: 10px;
                line-height: 22px;
            }

       </style>
    </head>
    <body>
    <div id="thank-you-sec">
        <div style="width: 100%; border-bottom: 1px solid #55c159; padding-bottom: 10px;" class="top-header-logo-sec">
            <img style="width: 130px;" class="cartlow-logo" src="{{ asset('huawei/images/logo-cartlow.jpg') }}" alt="jpg">

            {{-- <img class="samsung-logo" src=" {{ asset('samsung/images/Samsung-logo1.png') }}" alt="jpg"> --}}
        </div>
        <div class="header-text">
            <p>Hi {{ ucwords(Auth::user()->email) }}!</p>
            <p>
                Thank you for participating saving with coupon.
            </p>
        </div>
        <div class="form-section">
            <div class="row">
                <div class="col-12">
                    <div>
                        <div>
                            {{-- <i class="fad fa-smile-beam"></i> --}}
                            <h4 class="trncRec">Coupon Record</h4>
                            <div class="table-custom">
                                <table style="width:550px; border: 1px solid #cfcfcf; " class="table" cellpadding="2" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center; border-bottom: 1px solid #cfcfcf; border-right: 1px solid #cfcfcf; font-size: 13px;" scope="col">Sr #</th>
                                            <th style="text-align:center; border-bottom: 1px solid #cfcfcf; border-right: 1px solid #cfcfcf; font-size: 13px;" scope="col">Coupon Code</th>
                                            <th style="text-align:center; border-bottom: 1px solid #cfcfcf; border-right: 1px solid #cfcfcf; font-size: 13px;" scope="col">Price</th>
                                            <th style="text-align:center; border-bottom: 1px solid #cfcfcf; border-right: 1px solid #cfcfcf; font-size: 13px;" scope="col">Expiry</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dataRow">
                                       
                                         {{-- @foreach ($coupons as $key=>$coupon)
                                            <tr>
                                                <td style="text-align:center; border-bottom: 1px solid #cfcfcf; border-right: 1px solid #cfcfcf; font-size: 12px;"> {{++$key}} </td>
                                                <td style="text-align:center; border-bottom: 1px solid #cfcfcf; border-right: 1px solid #cfcfcf; font-size: 12px;"> {{$order->category_name}}  </td>
                                                <td style="text-align:center; border-bottom: 1px solid #cfcfcf; border-right: 1px solid #cfcfcf; font-size: 12px;"> {{$order->brand_name}} </td>
                                                <td style="text-align:center; border-bottom: 1px solid #cfcfcf; border-right: 1px solid #cfcfcf; font-size: 12px;">  {{$order->device_name}}</td>
                                            </tr>
                                        
                                        @endforeach
                                     --}}
                                     <tr>
                                        <td style="text-align:center; border-bottom: 1px solid #cfcfcf; border-right: 1px solid #cfcfcf; font-size: 12px;"> 1 </td>
                                        <td style="text-align:center; border-bottom: 1px solid #cfcfcf; border-right: 1px solid #cfcfcf; font-size: 12px;"> 123224  </td>
                                        <td style="text-align:center; border-bottom: 1px solid #cfcfcf; border-right: 1px solid #cfcfcf; font-size: 12px;">200.00 </td>
                                        <td style="text-align:center; border-bottom: 1px solid #cfcfcf; border-right: 1px solid #cfcfcf; font-size: 12px;"> 18-AUG-2021</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center; border-bottom: 1px solid #cfcfcf; border-right: 1px solid #cfcfcf; font-size: 12px;"> 2 </td>
                                        <td style="text-align:center; border-bottom: 1px solid #cfcfcf; border-right: 1px solid #cfcfcf; font-size: 12px;"> 123224asd  </td>
                                        <td style="text-align:center; border-bottom: 1px solid #cfcfcf; border-right: 1px solid #cfcfcf; font-size: 12px;">400.00 </td>
                                        <td style="text-align:center; border-bottom: 1px solid #cfcfcf; border-right: 1px solid #cfcfcf; font-size: 12px;"> 19-AUG-2021</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center; border-bottom: 1px solid #cfcfcf; border-right: 1px solid #cfcfcf; font-size: 12px;"> 3 </td>
                                        <td style="text-align:center; border-bottom: 1px solid #cfcfcf; border-right: 1px solid #cfcfcf; font-size: 12px;"> 123224New  </td>
                                        <td style="text-align:center; border-bottom: 1px solid #cfcfcf; border-right: 1px solid #cfcfcf; font-size: 12px;">500.00 </td>
                                        <td style="text-align:center; border-bottom: 1px solid #cfcfcf; border-right: 1px solid #cfcfcf; font-size: 12px;"> 20-AUG-2021</td>
                                    </tr>
                                        {{-- <tr>
                                            <th scope="row"></th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td style="border-right: 1px solid #cfcfcf; border-left: 1px solid #cfcfcf;">Total Value</td>
                                            <td><b>{{  $orders[0]->order_price  }}  SAR</b> </td>

                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                    
                        </div>

                      
                          
                        <div class="emailSignature">
                            <p style="display:block; margin-bottom: 5px;">Best wishes</p>
                            <p style="display:block; margin-top:0px;"><b>Saving With Coupon</b></p>
                            <small>Please do not reply to this email. It is automatically sent out by our system.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </body>
   </html>
   
 


