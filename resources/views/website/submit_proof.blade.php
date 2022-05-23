@extends('layouts.angvo')
@section('content')
    <style>
        .c_title {
            height: 71px;
            overflow: hidden;
        }

        .pagination {
            justify-content: center;
        }

        /*
    *
    * ==========================================
    * FOR DEMO PURPOSE
    * ==========================================
    *
    */
        .content {
            text-align: justify !important;
        }

        .shop-collection-area {
            background: #eecda3;
            background: -webkit-linear-gradient(to right, #eecda3, #ef629f);
            background: linear-gradient(to right, #eecda3, #ff5722);
            min-height: 100vh;
        }

        .custom_btn {
            width: 221px;
            float: right;
            background: #ff5722;
            border-color: #ff5722;
        }

        @media screen and (max-width: 512px) {
            .pl-4, .px-4 {
                padding: 0px !important;
            }

            .p-5 {
                padding: 1rem !important;
            }
        }

    </style>
    <!--====== PAGE TITLE PART START ======-->

    <section class="banner-area page-title bg_cover"
             style="background-image: url({{asset('public/angvo/assets/images/banners/service_banner.jpg')}})">
        <div class="banner-bg">
            <div class="container">
                <div class="row">
                <!--  <div class="col-lg-12">
                        <div class="page-title-content">
                            <h3 class="title">Submit Proof</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Upload Order Payment Proofs</li>
                                </ol>
                            </nav>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="banner-shape-1">
        </div>
        <div class="banner-shape-2">
            <img src="{{asset('public/angvo/assets/images/banner-shape-1.png')}}" alt="">
        </div>
        <div class="banner-shape-3">
            <img src="{{asset('public/angvo/assets/images/banner-shape-2.png')}}" alt="">
        </div>
    </section>

    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== SERVICES PRICING PART START ======-->

    <section class="shop-collection-area pt-30 pb-130 them_bg_color"
             style="padding-bottom: 5px!important; min-height:10px!important;">
        <div class="container">
            <div class="px-4 px-lg-0">
                <!-- For demo purpose -->
                <!-- End -->

                <div class="pb-5">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12 p-5 bg-white rounded shadow-sm mb-5">
                                <div class="row">
                                    @if(session()->has('msg'))
                                        <div class="col-md-12">
                                            <center style="color: #fd612d;font-weight: bold;">
                                                {{session()->get('msg')}}
                                            </center>
                                            <br>
                                        </div>
                                    @endif
                                    <div class="col-md-12">
                                        <strong> Order ID:</strong> {{$order->ref_no}} <br>
                                        <strong> Customer
                                            Name:</strong> {{$order->customer->first_name}} {{$order->customer->last_name}}
                                        <br>
                                        <strong> Payment Method:</strong> {{$order->payment_method}} <br>
                                        <strong> Order Status:</strong> {{$order->status}} <br>

                                    </div>
                                    <div class="col-md-12">
                                        <br>
                                        <h5>Order Detail</h5>
                                        <br>
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Service</th>
                                                <th scope="col">Subscription</th>
                                                <th scope="col">Expiry</th>
                                                <th scope="col">Price</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(isset($order_items) and sizeof($order_items)>0)
                                                @php
                                                    $totalPrice = 0;
                                                    $SubTotalPrice = 0;
                                                @endphp

                                                @foreach($order_items as $key=>$i)
                                                    <tr>
                                                        <th scope="row">{{$key+1}}</th>
                                                        <td>{{$i->title}} @if($i->sub_service_title != '')
                                                                ( {{$i->sub_service_title}} ) @endif</td>
                                                        <td>{{$i->package}}</td>
                                                        <td>{{$i->expire_at}}</td>
                                                        {{--                                                        <td>{{$i->price}} PKR</td>--}}
                                                        {{--                                                        <td>{{$i->sub_service_title}}</td>--}}
                                                        {{--                                                        <td>{{$i->sub_service_id}}</td>--}}
                                                        <td>
                                                            @php
                                                                $Setting = App\Setting::where('type','usd_to_pkr')->get()->first();
                                                                $Settingvalue = $Setting['value'];
                                                            @endphp

                                                            @if(isset($i->sub_service_id) and !empty($i->sub_service_id) and $i->sub_service_id > 0)



                                                                @php

                                                                    $Sub_service = App\Sub_service::where('package_id', $i->package_id)->where('title', $i->sub_service_title)->get()->first();
                                                                  //  $Sub_service = App\Sub_service::where('package_id', $i->package_id)->where('id', $i->sub_service_id)->get()->first();

                                                                        $one_month_discounted_price = $Sub_service['one_month_discounted_price'];
                                                                        $six_month_discounted_price = $Sub_service['six_month_discounted_price'];
                                                                        $twelve_month_discounted_price = $Sub_service['twelve_month_discounted_price'];






                                                                @endphp

                                                                @if($i->package == 'Monthly')

                                                                    @php   $totalPrice = $one_month_discounted_price*$Settingvalue; @endphp
                                                                    <span></span> {{$totalPrice}}  PKR

                                                                @elseif($i->package == '1 Year')

                                                                    @php    $totalPrice = $twelve_month_discounted_price*$Settingvalue; @endphp
                                                                    {{$totalPrice}}  PKR

                                                                @elseif($i->package == '6 Month')
                                                                    @php

                                                                        $totalPrice = $six_month_discounted_price*$Settingvalue; @endphp

                                                                    {{$totalPrice}}  PKR

                                                                @else

                                                                    {{$i->price}}  PKR

                                                                @endif

                                                            @elseif($i->sub_service_id == 0 && ($i->package_type == "sub_service" || $i->package_type == "subscription" )  )
                                                                @php

                                                                    $Packages = App\Package::where('id', $i->package_id)->get()->first();

                                                                    $one_month_discounted_price = $Packages['one_month_discounted_price'];
                                                                    $six_month_discounted_price = $Packages['six_month_discounted_price'];
                                                                    $twelve_month_discounted_price = $Packages['twelve_month_discounted_price'];
                                                                    $price = $Packages['price'];

                                                                @endphp

                                                                @if($i->package == 'Monthly')

                                                                    @php   $totalPrice = $one_month_discounted_price*$Settingvalue; @endphp

                                                                    {{$totalPrice}}  PKR

                                                                @elseif($i->package == '1 Year')

                                                                    @php     $totalPrice = $twelve_month_discounted_price*$Settingvalue; @endphp
                                                                    {{$totalPrice}}  PKR

                                                                @elseif($i->package == '6 Month')

                                                                    @php      $totalPrice = $six_month_discounted_price*$Settingvalue; @endphp

                                                                    {{$totalPrice}}  PKR



                                                                @else

                                                                    @php    $totalPrice = $i->price; @endphp

                                                                    {{$i->price}}  PKR

                                                                @endif

                                                            @elseif($i->package == 'Forever')

                                                                @php

                                                                    $Packages = App\Package::where('id', $i->package_id)->get()->first();

                                                                    $price = $Packages['price'];

                                                                @endphp

                                                                @php   $totalPrice = $price*$Settingvalue; @endphp

                                                                {{$totalPrice}}  PKR

                                                            @else

                                                                @php    $totalPrice = $i->price; @endphp

                                                                {{$i->price}}  PKR

                                                            @endif

                                                        </td>
                                                    </tr>


                                                    @php
                                                        $SubTotalPrice += $totalPrice;
                                                    @endphp

                                                @endforeach
                                                <tr>
                                                    <td colspan="4" style="text-align: right;">Subtotal</td>
                                                    {{--                                                    <td>{{$order->subtotal}} PKR</td>--}}
                                                    <td>{{$SubTotalPrice}} PKR</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" style="text-align: right;">Discount</td>
                                                    <td>{{$order->coupon_discount}} PKR</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" style="text-align: right;">Total</td>
                                                    {{--<td>{{$order->total}} PKR</td>--}}
                                                    <td>{{ $SubTotalPrice - $order->coupon_discount}} PKR</td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    @if($order->status != "Paid")
                                        <div class="col-md-12">
                                            <hr>
                                            <h5>Upload Proof Document Here</h5>
                                            <form method="post" action="{{route('upload_proofs')}}"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <br>
                                                        <input type="hidden" name="order_id" value="{{$order->id}}">
                                                        <label>Enter Your Name</label>
                                                        <input type="text" class="form-control" name="name"
                                                               placeholder="eg. Abrahim" required="">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <br>
                                                        <label>Enter Paid Amount</label>
                                                        <input type="text" class="form-control" name="amount"
                                                               placeholder="eg. 500" required="">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <br>
                                                        <label>Transaction Date</label>
                                                        <input type="date" class="form-control" name="date" required="">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <br>
                                                        <label>Attach Payment Receipt</label>
                                                        <input type="file" class="form-control" name="file" required="">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <br>
                                                        <button type="submit"
                                                                class="btn btn-dark rounded-pill py-2 btn-block custom_btn">
                                                            Submit Proof
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>

    <!--====== SERVICES PRICING PART ENDS ======-->
@endsection
