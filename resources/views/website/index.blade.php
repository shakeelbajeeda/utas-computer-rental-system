@extends('layouts.website')
@section('content')
    @include('website.include.errors')
    <style>
        .banner {
            background-image: url("{{ asset('website/images/bg-1.png') }}")
        }

        @media (max-width:768px) {
            .text-light {
                color: black !important;
            }
        }

    </style>
    <section class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-xl-7">
                    <div class="block">
                        <div class="divider mb-3"></div>
                        <span class="text-uppercase text-sm letter-spacing text-light ">Computer Rental System</span>
                        <h1 class="mb-3 mt-3">University of Tasmania</h1>

                        <p class="mb-4 pr-5 text-light">Tasmania is an island of creative and curious minds. No matter where
                            you join us from, you’ll become part of a welcoming and collaborative community.</p>
                        <div class="btn-container ">
                            <a href="{{route('all_computers')}}" class="btn btn-main-2 btn-icon btn-round-full">See University<i
                                    class="icofont-simple-right ml-2  "></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="col-12 text-center h1 mt-5 text-danger">View All Computers</div>
        <div class="container my-5">
            <div class="row justify-content-center">
                @foreach ($computers as $computer)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="service-block mb-5">
                            <img height="200px" width="200px" src="{{asset(env('PUBLIC_URL').'public/images/service_images/')}}/{{ $computer->image}}" alt="" >
                            <div class="content">
                                <h4 class="mt-4 mb-2 title-color">{{ $computer->title }}</h4>
                                <p class="mb-4">Per/Hour Price: ${{ $computer->per_hour_rate }}</p>
                            </div>
                            <div>
                                <a href="{{route('order_page', [$computer->id])}}" class="btn btn-danger">Book Now</a>
                                <a href="{{route('computer_detail', [$computer->id])}}" class="btn btn-danger float-right">See Details</a>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center">
                <a href="{{route('all_computers')}}" class="btn btn-danger">See All Computers <i class="fa fa-arrow-right ml-2 "></i></a>
            </div>
        </div>

    </section>
@endsection
