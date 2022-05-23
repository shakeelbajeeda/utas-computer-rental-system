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
                    <!-- <div class="col-lg-12">
                        <div class="page-title-content">
                            <h3 class="title">About Us</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">About Us</li>
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
  <!-- End -->

  <div class="pb-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-sm-12 col-xs-12 p-5 bg-white rounded shadow-sm mb-5">
          <h3>About Us</h3>
          <p class="content">
            <br>
            Let’s run your business on your own set patterns and rules. Where you have all freedom of taking all your decisions and managing your life with your standards.
            The question arises here from where to take a start ? Sometimes begging seems the most difficult because at this point most of the people do not have a clarity about their motives and destination.
            When you step into the competition of the market then you face some tougher challenges, but focusing on your major concerns keeps you motivated. And, with passing time you learn the way of dealing with occurring problems. 
          <br><br>
              We have been resolving problems of online businesses for years and helping them to earn profits. We make it happen by teaching them useful techniques, this thing really does not matter that if one is just a beginner or one has marked huge successes in businesses. It is all about moving forward in life, expanding your resources and making your living standards better day by day.
              <br><br>
              There are lots of success stories of our clients, who are completely satisfied with our services. Especially our VA services, Tools, VPS, Physical Addresses and other services as well. Anyone can learn these services from anywhere. This is the beauty of new trends of learning and doing business. Only seriousness and dedication is required. 
              <br><br>
              The people who urge in them and want to run their business we provide them guidance in the retail Amazon marketplace. Our motive is to help you to step in the world of international business.
          </p>
          <br>
           <h3>Our Vision</h3>
           <p class="content">
             <br>
             To teach the younger generation the basic tactics and skills of earning a handsome amount for living. In this rapidly changing world where more and more business is now on the internet, we also want our clients to become <strong> successful in the Amazon marketplace  </strong> to meet the global pace. There are some specific goals to make progress collectively.
           </p>

           <br>
           <h3>Our Mission</h3>
           <p class="content">
             <br>
             Helping every ecommerce business in more expansion and more growth. To bring your product on the top list on Amazon. To provide the best of the understanding about the complexities of the Amazon market.
           </p>

           <br>
           <h3>Why Us?</h3>
           <p class="content">
             <br>
             We resolve problems people face in their ecommerce business. Our services facilitate everyone, whether one is a beginner or the company which has been running its business for many years. Our services are a great opportunity for true learners, who want to learn the methods of professional working in the international market.
             <br><br>
             We proudly say that all of our international clients are completely satisfied with our quality services. Day by day the increasing number of clients signifies our quality performance. The good news is with each passing day we are expanding our services. The increasing demand of our services shows our success in the international market.

             <br><br>
             We guarantee there will not be any other option once you start acquiring our services. Because for running an online successful business you cannot afford a single glitch.
           </p>
        </div>
      </div>

    </div>
  </div>
</div>

        </div>
    </section> 

    <!--====== SERVICES PRICING PART ENDS ======-->
@endsection
