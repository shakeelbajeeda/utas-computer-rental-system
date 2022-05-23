@extends('layouts.angvo')
@section('content')
<style>
    .c_title{height: 71px;
    overflow: hidden;}
    .pagination {justify-content: center;}
</style>
    <!--====== PAGE TITLE PART START ======-->

    <section class="banner-area page-title bg_cover" style="background-image: url({{asset('public/angvo/assets/images/banners/service_banner.jpg')}})">
        <div class="banner-bg">
            <div class="container">
                <div class="row">
                   <!--  <div class="col-lg-12">
                        <div class="page-title-content">
                            <h3 class="title">Services</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Service</li>
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
   
    <section class="services-pricing-area priceing-page">
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center">
                    <h2 class="title" style="color: white;">View All Services</h2>
                </div>
            </div>
        </div>
            <div class="row no-gutters justify-content-center">
                <div class="col-lg-12">
                    <div class="row no-gutters justify-content-center">
                        @if(isset($services) and sizeof($services)>0)
                            @foreach($services as $s)
                                <div class="col-lg-3 col-md-6 col-sm-9">
                                    <div class="pricing-item white-bg mt-30 text-center" style="height:490px;">
                                       <a href="{{route('single',[$s->slug])}}"> <h3 class="title c_title">{{$s->title}}</h3></a>
                                        <p style="text-align: justify;height: 300px;">
                                           {!! short_desc($s->short_desc,250) !!}
                                           <span style="font-weight:bold;">
                                            <!-- <a href="{{route('single',[$s->slug])}}">Read More</a> -->
                                        </span>
                                        </p>
                                        <a class="main-btn main-btn-2" href="{{route('single',[$s->slug])}}">Buy Now</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            {{$services->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 

    <!--====== SERVICES PRICING PART ENDS ======-->
@endsection
