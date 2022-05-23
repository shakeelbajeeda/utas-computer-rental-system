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
<div class="empty_space"></div>
<!-- Slider Section -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{asset(env('PUBLIC_URL').'website/assets/images/slider_images/slider_1.jpg')}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset(env('PUBLIC_URL').'website/assets/images/slider_images/slider_2.jpg')}}" alt="Second slide">
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

<section class="features-area pb-130 bg_cover" style="background-image: url('{{asset('public/angvo/assets/images/features-bg.jpg')}}');">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title section-title-2  text-center">
                    <h2 class="title">One-Stop-Shop Services <span> For Amazon  <span>Sellers</span></span></h2>
                    <p>Our Services</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @if(isset($services) and sizeof($services)>0)
                @foreach($services as $s)
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="features-item text-center white-bg mt-30 item-2 wow fadeIn  animated" data-wow-duration="2000ms" data-wow-delay="0ms">
                           {!! $s->icon !!}
                            <h4 class="title">{{$s->title}}</h4>
                           <!--  <a href="javascript:" id="{{$s->id}}" onclick="add_to_cart(this);">Add To Cart</a>
                            <a style="cursor:auto;">|</a> -->

                            <a  href="{{route('single',[$s->slug])}}">Buy Now</a>
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="col-lg-12 col-md-12 col-sm-12">
                <center>
                    <br>
                 <a class="main-btn" href="{{route('services')}}">View All Services <i class="fal fa-long-arrow-right"></i></a>
                 </center>
            </div>
        </div>
    </div>
</section>

<!--====== FEATURES PART ENDS ======-->

<!--====== ABOUT PART START ======-->

<section class="about-area pt-130 pb-130">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-thumb text-center">
                    <img src="{{asset(env('PUBLIC_URL').'website/assets/images/about-thumb.jpg')}}" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content">
                    <h3 class="title">Perfect Solution Makes <span>A Successful <span>History</span></span></h3>
                    <span>Something knows About Our Company</span>
                    <p>We want our nation to become strong enough to compete in the arena of International market. That can only happen  when we will have the familiaity with the new trends trade. We develop opportunities for people who have urge in them to excel in their lives. We provide them a direction which leads them to success. Take a step forward and grab unlimited opportunities.</p>
                   <!--  <ul>
                        <li><a class="main-btn " href="#">Read More</a></li>
                        <li><a class="" href="#">Let’s Get Started <i class="fal fa-long-arrow-right"></i></a></li>
                    </ul> -->
                </div>
            </div>
        </div>
    </div>
</section>

<!--====== ABOUT PART ENDS ======-->

<!--====== WORKING PROCESS PART START ======-->

<section class="working-process" style="background: #101e3b;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center">
                    <h2 class="title">
                        <span>Why Choose Angvo? <span></span></span>
                    </h2>
                    <p>Significant Advantages of Choosing Angvo</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 col-sm-7">
                <div class="working-item text-center item-1">
                    <i class="fal fa-head-side-brain">
                       <img src="{{asset(env('PUBLIC_URL').'website/assets/images/icons/icon_1.png')}}">
                    </i>
                    <h5 class="title">360-degree Solution</h5>
                    <p>We've the authority, expertise, potential & resources to effectively deliver all Services to empower sellers & brands above & beyond.</p>
                    <div class="dot-1">
                        <img src="{{asset('public/angvo/assets/images/working-dot-1.png')}}" alt="working">
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-7">
                <div class="working-item text-center item-2">
                    <i class="fal fa-layer-group">
                        <img src="{{asset(env('PUBLIC_URL').'website/assets/images/icons/icon_2.png')}}">
                    </i>
                    <h5 class="title">Huge Experience</h5>
                    <p>We've spent countless hours on Amazon marketplace so we know every solution, way-out and tactic to get your work done!</p>
                    <div class="dot-2">
                        <img src="{{asset('public/angvo/assets/images/working-dot-2.png')}}" alt="working">
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-7">
                <div class="working-item text-center item-3">
                    <i class="fal fa-unicorn">
                         <img src="{{asset('public/angvo/assets/images/icons/icon_3.png')}}">
                    </i>
                    <h5 class="title">In-house Team</h5>
                    <p>We've an in-house team of Amazon-trained experts for each service task to let us undertake every project regardless of the size.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-7">
                <div class="working-item text-center item-4">
                    <i class="fal fa-upload">
                         <img src="{{asset('public/angvo/assets/images/icons/icon_4.png')}}">
                    </i>
                    <h5 class="title">Complete Solutions</h5>
                    <p>A-Z solutions offered by Angvo so that you do not have to wander here & there for specific tasks. With us, you'll get everything.</p>
                    <div class="dot-3">
                        <img src="{{asset('public/angvo/assets/images/working-dot-1.png')}}" alt="working">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shape-1"></div>
    <div class="shape-2"></div>
    <div class="shape-3"></div>
    <div class="shape-4"></div>
</section>

<!--====== WORKING PROCESS PART ENDS ======-->

<!--====== QUOTE PART START ======-->

<section class="quote-area pt-130 pb-130">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="quote-thumb">
                    <img src="{{asset('public/angvo/assets/images/quote-thumb.jpg')}}" alt="quote">
                </div>
            </div>
            <div class="col-lg-5">
                <div class="quote-content">
                    <h3 class="title">Get A Quote <br> <span>Free <span>Consultations</span></span></h3>
                    <form method="post" action="{{route('contact_us_form_submittion')}}">
                        @csrf
                        <div class="input-box mt-25">
                            <label for="#">Full Name Here</label>
                            <input name="name" type="text" placeholder="eg. Abdul Waheed" required="">
                            <i class="fal fa-user"></i>
                        </div>
                        <div class="input-box mt-25">
                            <label for="#">Contact Number</label>
                            <input name="contact_no" type="text" placeholder="eg. 0324-4448940" required="">
                            <i class="fal fa-user"></i>
                        </div>
                        <div class="input-box mt-25">
                            <label for="#">I Would Like To Discuss</label>
                            <input name="subject2" type="text" placeholder="I’m Talking About" required="">
                            <i class="fal fa-file"></i>
                        </div>
                        <div class="input-box mt-25">
                            <label for="#">Leave A Message</label>
                            <textarea name="message" id="#" cols="30" rows="10" placeholder="Write Message" required=""></textarea>
                            <i class="fal fa-pen-alt"></i>
                        </div>
                        <div class="submit-btn text-right mt-20">
                            <button type="submit" class="main-btn">Send Mesage</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!--====== QUOTE PART ENDS ======-->

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
                    <!-- <img src="{{asset('public/angvo/assets/images/testimonial-1.jpg')}}" alt="testimonial"> -->
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
                    <p>I can surely that their teachings got me out of many troubles. Sometimes I got really puzzled when I fell my account was not working in a proper way. Angvo sorted out my problems and briefed me the better ways of proceedings.</p>
                    <h6 class="title">Mehar Waheed</h6>
                    <i class="fal fa-quote-right"></i>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="testimonial-item white-bg text-center mt-70">
                    <!-- <img src="{{asset('public/angvo/assets/images/testimonial-2.jpg')}}" alt="testimonial"> -->
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
                    <p>Now I do not have to face that panic which I used to bear in the start of my business. Things are good now because of Angvo. Before contacting this company, It was so much difficult for me to manage the important tasks.</p>
                    <h6 class="title">Ch Yasir Ali</h6>
                    <i class="fal fa-quote-right"></i>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="testimonial-item white-bg text-center mt-70">
                    <!-- <img src="{{asset('public/angvo/assets/images/testimonial-3.jpg')}}" alt="testimonial"> -->
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
                    <p>The sustainability in my business I wanted to see and feel my winning charm. That I have gained because of Angvo, because  I run my business from my home,  I do not have such a huge team to manage such important tasks.</p>
                    <h6 class="title">Dr. Irshad CH</h6>
                    <i class="fal fa-quote-right"></i>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="testimonial-item white-bg text-center mt-70">
             <!--        <img src="{{asset('public/angvo/assets/images/testimonial-4.jpg')}}" alt="testimonial"> -->
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
                    <p>Sometimes we feel hesitate to trust a company with which we have not worked before. Same was the feeling of mine but before working with Angvo I checked their profile thoroughly. Then I contacted this company Angvo.</p>
                    <h6 class="title">Ayesha</h6>
                    <i class="fal fa-quote-right"></i>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="testimonial-item white-bg text-center mt-70">
                    <!-- <img src="{{asset('public/angvo/assets/images/testimonial-5.jpg')}}" alt="testimonial"> -->
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
                    <p>In difficult times, when you find someone who can get you out of the problem and shows you the clear path to explore then there you find the opportunity. I found the one when I came to know about the services and the reputation of Angvo.</p>
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
                        <img src="{{asset('public/angvo/assets/images/brand-1.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="brand-item text-center">
                        <img src="{{asset('public/angvo/assets/images/brand-2.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="brand-item text-center">
                        <img src="{{asset('public/angvo/assets/images/brand-3.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="brand-item text-center">
                        <img src="{{asset('public/angvo/assets/images/brand-4.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="brand-item text-center">
                        <img src="{{asset('public/angvo/assets/images/brand-5.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="brand-item text-center">
                        <img src="{{asset('public/angvo/assets/images/brand-1.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="brand-item text-center">
                        <img src="{{asset('public/angvo/assets/images/brand-2.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!--====== BRAND PART ENDS ======-->
@endsection
