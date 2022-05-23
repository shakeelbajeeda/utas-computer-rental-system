@extends('layouts.angvo')
@section('content')
<style>
    .c_title{height: 71px;
    overflow: hidden;}
    .pagination {justify-content: center;}
    .single_price {
            text-align: center;
    font-size: 21px;
    margin: 10px;
    font-weight: bold;
    color: black;
    }
    .main_div {
           padding: 60px 12px 60px 30px;
    border: 1px solid #75666624;
    border-radius: 10px;
    margin-top:10px;
    margin-bottom: 10px;
    }
    .btn_unactive{
            background: white;
            color: black;
    }
    .btn_active{
        background: #2196f3;
        color: white;
    }
    .all_btns {margin-left: 5px; margin-right: 5px;}
    #actual_price {
            font-size: 15px;
    font-weight: 500;
   color: #8a8a8a;
    }
   .description_div p
   {
            text-align: justify;
            font-size: 19px!important;
            color: black;
            line-height: 37px;
            font-family: inherit;
    }
</style>
    <!--====== PAGE TITLE PART START ======-->

    <section class="banner-area page-title bg_cover" style="background-image: url({{asset('public/angvo/assets/images/banners/service_banner.jpg')}})">
        <div class="banner-bg">
            <div class="container">
                <div class="row">
                  <!--   <div class="col-lg-12">
                        <div class="page-title-content">
                            <h3 class="title">{{$service->title}}</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{$service->slug}}</li>
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
   
    <section class="shop-collection-area pt-30 pb-130">
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="product-details-content-item">
                    <h4 class="title">{{$service->title}} <span style="color: #ff5722;"></span></h4>
                </div>
            </div>
        @if($service->is_whatsapp==1)
            <div class="col-md-6">
                <div class="main_div">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 justify-content-center" style="text-align:center;">
                            <a href="https://api.whatsapp.com/send?phone=+923244448940&text=Hi, I’m reaching out through Angvo! and i want to buy {{$service->title}}" style="" class="main-btn main-btn-2">Contact For Price   </a>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($service->is_one_time_payment==1)
            <div class="col-md-6">
                <div class="main_div">
                    <div class="row">
                        
                        <div class="col-lg-6">
                            <p class="single_price">{{$service->price}} USD</p>
                        </div>
                        <div class="col-lg-6">
                            <a href="javascript:" style="" class="main-btn main-btn-2" id="{{$service->id}}" vendor_price="{{$service->vendor_price}}" price ="{{$service->price}}" onclick="add_to_cart(this);">Add To Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($service->is_sub_service==1)
        <div class="col-md-8">
                <div class="main_div">
                    <div class="row">
                        
                        <div class="col-lg-4">
                            <p class="single_price"> <span id="append_price"> </span> USD
                                <br>
                                <span style="color: #ff5722;" id="append_discount"></span>
                            </p>
                        </div>
                        <div class="col-lg-8">
                            <label>Select Service</label>
                            <br>
                            <select class="form-control" id="sub_services" onchange="apply_sub_service();">
                                @foreach($service->sub_services as $sub)
                                <option value='{!! $sub !!}'>{{$sub->title}}</option>
                                @endforeach
                            </select>
                            <br>
                            <label>Choose Subscription</label>
                            <div id="append_packages">
                            </div>
                            <br>
                            <a href="javascript:" style="margin-top: 10px;" class="main-btn main-btn-2 add_to_cart_btn" id="{{$service->id}}" onclick="add_to_cart_sub_services(this);">Add To Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="col-md-8">
                <div class="main_div">
                    <div class="row">
                        
                        <div class="col-lg-4">
                            <p class="single_price"> <span id="append_price"> </span> USD
                                <br>
                                <span style="color: #ff5722;" id="append_discount"></span>
                            </p>
                        </div>
                        <div class="col-lg-8">
                            <label>Choose Subscription</label>
                            <br>
                            @if(isset($service->one_month_price) and $service->one_month_price > 0)
                            <button id="monthly_pkg" type="button" class="btn btn-primary all_btns btn_unactive" package="Monthly" discount="{{$service->one_month_discount}}" price="{{$service->one_month_discounted_price}}" vendor_price="{{$service->one_month_vendor_price}}"  actual_price="{{$service->one_month_price}}" onclick="apply_pkg(this);"> Monthly</button>
                            @endif
                            @if(isset($service->six_month_price) and $service->six_month_price >0)
                            <button id="six_month_pkg" type="button" class="btn btn-primary all_btns btn_unactive" package="6 Months" discount="{{$service->six_month_discount}}" price="{{$service->six_month_discounted_price}}" vendor_price="{{$service->six_month_vendor_price}}" actual_price="{{$service->six_month_price}}" onclick="apply_pkg(this);"> 6 Months</button>
                            @endif
                            @if(isset($service->twelve_month_price) and $service->twelve_month_price >0)
                            <button id="one_year_pkg" type="button" class="btn btn-primary all_btns btn_unactive" package="1 Year" discount="{{$service->twelve_month_discount}}" price="{{$service->twelve_month_discounted_price}}" vendor_price="{{$service->twelve_month_vendor_price}}" actual_price="{{$service->twelve_month_price}}" onclick="apply_pkg(this);"> 1 Year</button>
                            @endif
                            <br>
                            <a href="javascript:" style="margin-top: 10px;" class="main-btn main-btn-2 add_to_cart_btn" id="{{$service->id}}" onclick="add_to_cart_subscriptions(this);">Add To Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        </div>
            <div class="row no-gutters justify-content-center">
                <div class="col-lg-12">
                    <div class="shop-tab-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <br>
                    <h4>Description</h4>
                    <br>
                    <div class="description_div">
                         {!! $service->description !!}
                    </div>
                   
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
@section('footer_scripts')
 <script>
     function apply_pkg(e) {
        $('.all_btns').removeClass('btn_active');
        $('.all_btns').addClass('btn_unactive');
        $(e).addClass('btn_active');
         $('#append_price').text($(e).attr('price'));
         if($(e).attr('discount')>0) {
            $('#append_discount').html($(e).attr('discount') + '% OFF <span id="actual_price">(Actual was $'+ $(e).attr('actual_price') +')</span>');
         } else {
            $('#append_discount').text('');
         }
         $('.add_to_cart_btn').attr('package',$(e).attr('package'));
         $('.add_to_cart_btn').attr('price',$(e).attr('price'));
         $('.add_to_cart_btn').attr('vendor_price',$(e).attr('vendor_price'));
         $('.add_to_cart_btn').attr('sub_service_id',$(e).attr('sub_service_id'));
          $('.add_to_cart_btn').attr('sub_service_title',$(e).attr('sub_service_title'));
     }
     @if(isset($service->one_month_price) and $service->one_month_price >0)
        $('#monthly_pkg').click();
     @elseif(isset($service->six_month_price) and $service->six_month_price >0)
        $('#six_month_pkg').click();
     @else
         $('#one_year_pkg').click();
     @endif

     @if($service->is_sub_service==1)
          apply_sub_service();
         @if(isset($service->sub_services->first()->one_month_price) and $service->sub_services->first()->one_month_price >0)
             $('#monthly_pkg').click();
         @elseif(isset($service->sub_services->first()->six_month_price) and $service->sub_services->first()->six_month_price >0)
            $('#six_month_pkg').click();
         @else
             $('#one_year_pkg').click();
         @endif
     @endif

     function apply_sub_service() {
        var sub= JSON.parse($('#sub_services :selected').val());
        var append_able = '';
        $('.add_to_cart_btn').attr('sub_service_id','');
        if(sub.one_month_price && sub.one_month_price >0) {
            append_able += '<button id="monthly_pkg" type="button" class="btn btn-primary all_btns btn_unactive" package="Monthly" discount="'+sub.one_month_discount+'" sub_service_id="'+sub.id+'" sub_service_title="'+sub.title+'" actual_price="'+sub.one_month_price+'" price="'+sub.one_month_discounted_price+'"  vendor_price="'+sub.one_month_vendor_price+'" onclick="apply_pkg(this);"> Monthly</button>'
        }
        if(sub.six_month_price && sub.six_month_price >0) {
            append_able += '<button id="six_month_pkg" type="button" class="btn btn-primary all_btns btn_unactive" package="6 Months" discount="'+sub.six_month_discount+'" sub_service_id="'+sub.id+'" sub_service_title="'+sub.title+'" price="'+sub.six_month_discounted_price+'" vendor_price="'+sub.six_month_vendor_price+'"  actual_price="'+sub.six_month_price+'" onclick="apply_pkg(this);"> 6 Months</button>'
        }
        if(sub.twelve_month_price && sub.twelve_month_price >0) {
            append_able += '<button id="one_year_pkg" type="button" class="btn btn-primary all_btns btn_unactive" package="1 Year" discount="'+sub.twelve_month_discount+'" sub_service_id="'+sub.id+'" sub_service_title="'+sub.title+'" price="'+sub.twelve_month_discounted_price+'" vendor_price="'+sub.twelve_month_vendor_price+'"  actual_price="'+sub.twelve_month_price+'" onclick="apply_pkg(this);"> 1 Year</button>'
        }
        $('#append_packages').html(append_able);
     }
 </script>
@endsection
