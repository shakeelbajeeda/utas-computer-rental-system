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
.content {text-align: justify!important;}
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
            .p-5 {
          padding: 1rem!important;
      }
    }
    
</style>
    <!--====== PAGE TITLE PART START ======-->

    <section class="banner-area page-title bg_cover" style="background-image: url({{asset('public/angvo/assets/images/banners/service_banner.jpg')}})">
        <div class="banner-bg">
            <div class="container">
                <div class="row">
                   <!--  <div class="col-lg-12">
                        <div class="page-title-content">
                            <h3 class="title">Payment Proof</h3>
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
   
    <section class="shop-collection-area pt-30 pb-130 them_bg_color" style="padding-bottom: 5px!important; min-height:10px!important;">
        <div class="container">
            <div class="px-4 px-lg-0">
  <!-- For demo purpose -->
  <!-- End -->

  <div class="pb-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-sm-12 col-xs-12 p-5 bg-white rounded shadow-sm mb-5">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h5>Enter Order ID</h5>
                <br>
              <form method="post" action="{{route('find_order')}}">
                @csrf
                <input type="text" class="form-control" name="order_id" placeholder="eg. 30001" required="">
                @if(session()->has('msg'))
                <span style="color:red;margin-left:5px;">{{session()->get('msg')}}</span>
                @endif
                <br>
                <button type="submit" class="btn btn-dark rounded-pill py-2 btn-block custom_btn">Find Order</button>
              </form>
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
