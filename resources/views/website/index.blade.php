@extends('layouts.website')
@section('content')
    @include('website.include.errors')
    <style>
        .fa-head-side-brain:before {
            display: none;
        }

        .fa-layer-group:before {
            display: none;
        }

        .fa-unicorn:before {
            display: none;
        }

        .fa-upload:before {
            display: none;
        }

    </style>
    <!-- Slider Section -->
    <br><br><br>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" height="auto"
                    src="{{ asset(env('PUBLIC_URL') . 'website/assets/images/slider_images/slider_1.jpg') }}"
                    alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100"
                    src="{{ asset(env('PUBLIC_URL') . 'website/assets/images/slider_images/slider_2.jpg') }}"
                    alt="Second slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- Slider Section End here -->

    <!--====== FEATURES PART START ======-->

    <section class="features-area pb-130 bg_cover"
        style="background-image: url('{{ asset(env('PUBLIC_URL') . 'website/assets/images/features-bg.jpg') }}');">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title section-title-2  text-center">
                        <h2 class="title">UTAS <span>Computer <span>Rental Services</span></span></h2>
                        <p>Our Services</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($services as $product)
                    <div class="col-md-3 mb-5">
                        <div class="card">
                            @if($product->is_rented ==1)
                            <span class="rent_out">Reserved</span>
                            @endif
                            <img height="230px"
                                src="{{ asset(env('PUBLIC_URL') . 'public/images/service_images/') }}/{{ $product->image }}"
                                class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $product->title }}</h5>
                                <p class="card-text">${{ $product->per_hour_rate }} Per/Hour</p>
                            </div>
                            <div class="card-body text-center">
                                <a href="{{ route('checkout_page', [$product->id]) }}" class="card-link btn btn-primary">Rent it</a>
                                <a href="{{ route('single', [$product->id]) }}" class="card-link btn btn-primary float-end">View
                                    Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach


                <div class="col-lg-12 col-md-12 col-sm-12">
                    <center>
                        <br>
                        <a class="main-btn" href="{{ route('services') }}">View All Services <i
                                class="fal fa-long-arrow-right"></i></a>
                    </center>
                </div>
            </div>
        </div>
    </section>

    <!--====== FEATURES PART ENDS ======-->

    <!--====== TESTIMONIALS PART START ======-->

    <section class="testimonial-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <h2 class="title">How We Works <span>Customer <span> Reviews</span></span></h2>
                        <p>knows About Our Customer Say</p>
                    </div>
                </div>
            </div>
            <div class="row testinonials-active">
                <div class="col-lg-4">
                    <div class="testimonial-item white-bg text-center mt-70">
                        <!-- <img src="{{ asset('public/angvo/assets/images/testimonial-1.jpg') }}" alt="testimonial"> -->
                        <div style="height:40px;"></div>
                        <div class="star d-flex justify-content-center">
                            <!-- <span>(</span> -->
                            <ul>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                            </ul>
                            <!-- <span>)</span> -->
                        </div>
                        <p>I can surely that their teachings got me out of many troubles. Sometimes I got really puzzled
                            when I fell my account was not working in a proper way. Angvo sorted out my problems and briefed
                            me the better ways of proceedings.</p>
                        <h6 class="title">Mehar Waheed</h6>
                        <i class="fal fa-quote-right"></i>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-item white-bg text-center mt-70">
                        <!-- <img src="{{ asset('public/angvo/assets/images/testimonial-2.jpg') }}" alt="testimonial"> -->
                        <div style="height:40px;"></div>
                        <div class="star d-flex justify-content-center">
                            <ul>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                            </ul>
                        </div>
                        <p>Now I do not have to face that panic which I used to bear in the start of my business. Things are
                            good now because of Angvo. Before contacting this company, It was so much difficult for me to
                            manage the important tasks.</p>
                        <h6 class="title">Ch Yasir Ali</h6>
                        <i class="fal fa-quote-right"></i>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-item white-bg text-center mt-70">
                        <!-- <img src="{{ asset('public/angvo/assets/images/testimonial-3.jpg') }}" alt="testimonial"> -->
                        <div style="height:40px;"></div>
                        <div class="star d-flex justify-content-center">
                            <ul>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                            </ul>
                        </div>
                        <p>The sustainability in my business I wanted to see and feel my winning charm. That I have gained
                            because of Angvo, because I run my business from my home, I do not have such a huge team to
                            manage such important tasks.</p>
                        <h6 class="title">Dr. Irshad CH</h6>
                        <i class="fal fa-quote-right"></i>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-item white-bg text-center mt-70">
                        <!--        <img src="{{ asset('public/angvo/assets/images/testimonial-4.jpg') }}" alt="testimonial"> -->
                        <div style="height:40px;"></div>
                        <div class="star d-flex justify-content-center">
                            <ul>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                            </ul>
                        </div>
                        <p>Sometimes we feel hesitate to trust a company with which we have not worked before. Same was the
                            feeling of mine but before working with Angvo I checked their profile thoroughly. Then I
                            contacted this company Angvo.</p>
                        <h6 class="title">Ayesha</h6>
                        <i class="fal fa-quote-right"></i>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-item white-bg text-center mt-70">
                        <!-- <img src="{{ asset('public/angvo/assets/images/testimonial-5.jpg') }}" alt="testimonial"> -->
                        <div style="height:40px;"></div>
                        <div class="star d-flex justify-content-center">
                            <ul>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                            </ul>
                        </div>
                        <p>In difficult times, when you find someone who can get you out of the problem and shows you the
                            clear path to explore then there you find the opportunity. I found the one when I came to know
                            about the services and the reputation of Angvo.</p>
                        <h6 class="title">Sardar Waqas</h6>
                        <i class="fal fa-quote-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== TESTIMONIALS PART ENDS ======-->

    <!--====== BRAND PART START ======-->

    <!--   <div class="brand-area pb-130 pt-130">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="section-title text-center">
                                <h2 class="title"><span>Our Trusted <span> Partners</span></span></h2>
                                <p>We have many trusted partners</p>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row brand-active">
                            <div class="col-lg-2">
                                <div class="brand-item text-center">
                                    <img src="{{ asset('public/angvo/assets/images/brand-1.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="brand-item text-center">
                                    <img src="{{ asset('public/angvo/assets/images/brand-2.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="brand-item text-center">
                                    <img src="{{ asset('public/angvo/assets/images/brand-3.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="brand-item text-center">
                                    <img src="{{ asset('public/angvo/assets/images/brand-4.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="brand-item text-center">
                                    <img src="{{ asset('public/angvo/assets/images/brand-5.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="brand-item text-center">
                                    <img src="{{ asset('public/angvo/assets/images/brand-1.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="brand-item text-center">
                                    <img src="{{ asset('public/angvo/assets/images/brand-2.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

    <!--====== BRAND PART ENDS ======-->
@endsection
