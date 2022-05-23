@extends('layouts.angvo')
@section('content')
<style>
    .c_title{height: 71px;
    overflow: hidden;}
    .pagination {justify-content: center;}
    /*
*
* ==========================================
* FOR DEMO PURPOSE
* ==========================================
*
*/

.shop-collection-area {
  background: #eecda3;
  background: -webkit-linear-gradient(to right, #eecda3, #ef629f);
  background: linear-gradient(to right, #eecda3, #ff5722);
  min-height: 100vh;
}
.custom_btn{    width: 221px;
    float: right;
    background: #ff5722;
    border-color: #ff5722;}
    @media screen and (max-width: 512px) {
      .pl-4, .px-4 {padding: 0px!important;}
    }
    @media screen and (max-width: 768px) {
      .pl-4, .px-4 {padding: 0px!important;}
            .p-5 {
          padding: 1rem!important;
      }
    }
</style>
<?php 
$cart=\Cart::content();
 ?>
    <!--====== PAGE TITLE PART START ======-->

    <section class="banner-area page-title bg_cover" style="background-image: url({{asset('public/angvo/assets/images/banners/shopping_cart_banner.jpg')}})">
        <div class="banner-bg">
            <div class="container">
                <div class="row">
                    <!-- <div class="col-lg-12">
                        <div class="page-title-content">
                            <h3 class="title">View Cart</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View Cart</li>
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
   
    <section class="shop-collection-area pt-30 pb-130 them_bg_color">
        <div class="container">
            <div class="px-4 px-lg-0">
  <!-- For demo purpose -->
  <div class="container text-white py-5 text-center">
    <h3 class="display-5" style="color: white;">My Cart</h3>
    </p>
  </div>
  <!-- End -->

  <div class="pb-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-sm-12 col-xs-12 p-5 bg-white rounded shadow-sm mb-5">

          <!-- Shopping cart table -->
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Service</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Price</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Subscription</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Quantity</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Remove</div>
                  </th>
                </tr>
              </thead>
              <tbody>
                @if(isset($cart) and sizeof($cart)>0)
                @foreach($cart as $key=> $c)
                <tr>
                  <th scope="row" class="border-0">
                    <div class="p-2">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a  class="text-dark d-inline-block align-middle">{{$c->name}} @if($c->options->sub_service_title != '') ( {{$c->options->sub_service_title}} ) @endif</a></h5><span class="text-muted font-weight-normal font-italic d-block"></span>
                      </div>
                    </div>
                  </th>
                  <td class="border-0 align-middle"><strong>{{$c->price}} USD</strong></td>
                  <td class="border-0 align-middle"><strong>{{$c->options->package}}</strong></td>
                  <td class="border-0 align-middle"><strong>{{$c->qty}}</strong></td>
                  <td id="{{$c->rowId}}" onclick="remove_from_cart(this);" class="border-0 align-middle"><a href="javascript:" class="text-dark"><i class="fa fa-trash"></i></a></td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="4" style="text-align: center;">
                        No Record Found
                    </td>
                </tr>
                @endif
              </tbody>
            </table>
          </div>
          <!-- End -->
          @if(isset($cart) and sizeof($cart)>0)
            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                    <a href="{{route('checkout')}}" class="btn btn-dark rounded-pill py-2 btn-block custom_btn">Proceed to checkout</a>
            </div>
          @endif
        </div>
      </div>

    </div>
  </div>
</div>

        </div>
    </section> 

    <!--====== SERVICES PRICING PART ENDS ======-->
@endsection
