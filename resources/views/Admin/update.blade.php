<!DOCTYPE html>
<html>
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-176910255-1"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg==" crossorigin="anonymous" />
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() { dataLayer.push(arguments); }
            gtag('js', new Date());
    
            gtag('config', 'UA-176910255-1');
        </script>
    <title>
        SavingWithCoupons
    </title>
    <meta charset="utf-8" />
    <meta name="description" content="Lowe&#39;s and Home Depot coupons delivered instantly for use online and instore - fast and fresh!" />
    <meta name="keywords" content="Lowes, Home Depot, HD, Coupons, Save money, Promotional Promo Code, Big savings, Fresh, cheap, guaranteed to work, $20 off $100 savings" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="{{ asset('content/bootstrap.minb57c.css') }}" />
    <link rel="stylesheet" href="{{ asset('content/app8f99.css') }}" />
    <link rel="stylesheet" href="{{ asset('content/font-awesome.min514e.css') }}" />
    <link rel="stylesheet" href="{{ asset('content/ekko-lightboxf9e3.css') }}" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&amp;display=swap" rel="stylesheet"><link rel="stylesheet" href="../../../../stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css%2bbootstrap-datetimepicker.min.css.pagespeed.cc.V_ITF8Fjuf.css') }}" />

    </head>    
    <body>

  
        <form method="POST" action="/update/co/{{ $id->id }}" id="ctl00" enctype="multipart/form-data" accept-charset="utf-8" class="p-4 m-4 border rounded shadow needs-validation" novalidate="">
            <div class="aspNetHidden">
            <input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="CqLHOs2DR3brj6UoNdL7UzKVzq/hL+fDw0E1r4EHg9Np13+8/SKxUVDiwJirIge6tLCkILsqQBz5UP7svvDW5aDQjpfoJ3EGHcMfhypq6BRs+MHV" />
            </div>
            
            <div class="aspNetHidden">
            
                <input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="CD2448B2" />
                <input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="6s861HL+XSKDebeYZpkUimNp4M7RMC/mXPqVPIXOe2qpjX6/89xFzDDwCmsoh4GeGZ4O3AbQg8l8Ii1QuKkcw5Q2FbgBEHLosLLmd9klLlHunBYOiJi4YPCP8Ucv9ipHWgF7bXjjG/+QuWAkeqAHFinaUScpd1RWQGd8lEGd8xLHLuF2tRlzeWzhMWAZ70yxLP23SQ==" />
            </div>
            
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="{{ asset('offer.jpg') }}" class="img-fluid" alt="Responsive image">
                            </div>
                            <div class="col-lg-6">
                                <div class="row" >  
                                    <div class="col-sm-5 col-2-offset col-lg-8">
                                                       Admin form 
                                    </div>
                                    @csrf
                                    @method('PUT')
                                    
                                    
                                    <div class="col-sm-5 col-2-offset col-lg-8">
                                        <div class="form-group">
                                            <label for="txtSold">Sold Title</label>
                                            <input name="txtSold" value="{{ $id->sold }}" type="text" maxlength="30" id="MainContent_txtFirstName" class="form-control" placeholder="Enter sold title" minlength="1" required="true" />
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-lg-8">
                                        <div class="form-group">
                                            <label for="txtDiscount">Discount title</label>
                                            <input name="txtDiscount" value="{{ $id->discount }}" type="text" maxlength="30" id="MainContent_txtLastName" class="form-control" placeholder="Enter discount title" minlength="1" required="true" />
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-lg-8">
                                        <div class="form-group">
                                            <label for="txtSave">Save title</label>
                                            <input name="txtSave" value="{{ $id->save }}" type="text" maxlength="30" id="MainContent_txtLastName" class="form-control" placeholder="Enter save title" minlength="1" required="true" />
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-lg-8">
                                        <div class="form-group">
                                            <label for="txtimage">Enter Image</label><br>
                                            <input name="txtimage" type="file" maxlength="30" id="MainContent_txtLastName"   required="true" />
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-lg-8">
                                        <div class="form-group">
                                            <label for="txtOrgprice">Orignal price title</label>
                                            <input name="txtOrgprice" value="{{ $id->Oprice }}" type="text" maxlength="30" id="MainContent_txtLastName" class="form-control" placeholder="Enter Orignal price title" minlength="1" required="true" />
                                        </div>
                                    </div>
                                
                                    <div class="col-sm-5 col-lg-8">
                                        <div class="form-group">
                                            <label for="txtDisprice">Discount price title</label>
                                            <input name="txtDisprice" value="{{ $id->Dprice }}" type="text" maxlength="30" id="MainContent_txtLastName" class="form-control" placeholder="Enter Discounted price title" minlength="1" required="true" />
                                        </div>
                                    </div>
                                    
                                    {{-- <div class="col-sm-5 col-lg-8">
                                        <div class="form-group">
                                            <div class="input-group date" data-target-input="nearest">
                                                <input type="text" name="txtexpires" class="form-control datetimepicker-input" data-toggle="datetimepicker"  data-target="#datetimepicker1"/>
                                                <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                  
                                    <div class="col-sm-5 col-lg-8">
                                       
                                       
                                        <div class="form-group">
                                        <div class="input-group " id="id_0">
                                        <input type="text" name="txtexpires" value="{{ $id->expires }}" placeholder="{{ $id->expires }}" class="form-control datetimepicker-input"  />
                                        </div>
                                        </div>
                                        
                                        
                                        
                                        </div>

                                    <div class="col-sm-5 col-lg-8">
                                        <div class="form-group">
                                            <label for="txtUseOnline">Use online title</label>
                                            <input name="txtUseOnline" value="{{ $id->useonline }}" type="text" maxlength="30" id="MainContent_txtLastName" class="form-control" placeholder="Enter Use online title" minlength="1" required="true" />
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-lg-8">
                                        <div class="form-group">
                                            <label for="txtUseIn">Use in title</label>
                                            <input name="txtUseIn" value="{{ $id->use }}" type="text" maxlength="30" id="MainContent_txtLastName" class="form-control" placeholder="Enter where to use title" minlength="1" required="true" />
                                        </div>
                                </div>
                                <div class="col-sm-10 col-lg-8">
                                    <span id="MainContent_lblMessage" class="text-danger"></span>
                                    <button type="submit" name="ctl00$MainContent$btnSubmit" id="MainContent_btnSubmit" class="btn btn-primary my-3" >Update</button>
                                </div>
                            </div>
                          
                        </div>
                       
                        </div>
                    </form>  
                    
                    <script src="js/jquery.min.js"></script>
<script src="{{ asset('js/popper.js%2bbootstrap.min.js.pagespeed.jc.ilRh47MgLJ.js') }}js/popper.js%2bbootstrap.min.js.pagespeed.jc.ilRh47MgLJ.js"></script><script>eval(mod_pagespeed_wCbBOb8kv3);</script>
<script>eval(mod_pagespeed_rz9I0b_D0i);</script>
<script src="{{ asset('js/moment-with-locales.min.js') }}js/moment-with-locales.min.js"></script>
<script src="{{ asset('js/bootstrap-datetimepicker.min.js%2bmain.js.pagespeed.jc.eHFwUdHeoV.js') }}"></script><script>eval(mod_pagespeed_CHCOOPHC8j);</script>
<script>eval(mod_pagespeed_hNhF016OYM);</script>

    </body>
    {{-- <script type="text/javascript" src="{{ asset('scripts/app5e1f.js') }}"></script>
    <script type="text/javascript" src="{{ asset('scripts/bootstrap.bundle.minb57c.js') }}"></script>
    <script type="text/javascript" src="{{ asset('scripts/ekko-lightbox.minf9e3.js') }}"></script>
    <script type="text/javascript" src="{{ asset('scripts/jquery-3.6.0.min1e4d.js') }}"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script> --}}
   
</html>