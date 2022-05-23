  <style
  >
      .header-nav .navigation .navbar .navbar-nav .nav-item .sub-menu
      {
        width:300px;
      }
      .header-nav {
        background: white;
        }
        .header-nav .navigation .navbar .navbar-nav .nav-item a {
            color:black;
        }
        @media screen and (max-width: 768px) {
          .header-nav .navigation .navbar .navbar-nav .nav-item a {
                color:white;
            }
            .all_btns {
            margin-left: 2px!important;
            margin-right: 2px!important;
            padding: 5px!important;
             }
        }
            .header-nav.sticky {
            background:white;
        }
        .header-left-side{
                color: white;
            font-weight: bold;
            font-size: 14px;
        }
        .header-top {
            background: #ff5722;
        }
        .header-top .header-top-item .header-right-social ul li a {
            background: black;
        }
        .header-nav .navigation .navbar .navbar-btn a {
            background: #ff5722;
            color: white;
        }
          </style>
          <style>
    .features-area .features-item .title {
    font-size: 24px;
    height: 84px;
    }
    .empty_space{
        height:115px;background:white;
    }
    .w-100 {
        height: 460px;
    }
    .navbar-toggler{background:#ff5722;}
    @media screen and (max-width: 768px) {
      .empty_space{height:71px;}
      .w-100 {
          height: 145px;
        }
        .header-nav .navigation .navbar .navbar-nav .nav-item a span 
        /*{display: block!important;}*/
        .header-nav .navigation .navbar .navbar-nav .nav-item a > i 
        /*{display: block!important;}*/
        .conter_style {
                top:-7px!important;
                right: 280px!important;
            }
            .p-4 {
                        padding: 0px!important;
                        padding-top: 15px!important;
                        padding-bottom: 15px!important;
                    }
            }
    .brand-area .brand-item img {border-radius:2px;}
    .conter_style {
               position: absolute;
    right: -12px;
    top: 34px;
    padding: 4px!important;
    font-size: 12px!important;
    background: #ff5722!important;
    }
    a {cursor: pointer;}
    .sticky .conter_style{top: 13px;}
    .toastr-container{opacity:1!important;}
    .toast-top-center {
        top: 10%;
        }
    .d-sm-block li a:hover{background: white!important;color: #ff5722!important;}
    .banner-area.page-title .banner-bg {
    height: 300px;
    }
    .them_bg_color {background: #0e2b5c!important;}
    .conter_style1 {
    position: absolute!important;
    /*right: -12px;*/
    top: -9px;
    padding: 4px!important;
    font-size: 12px!important;
    background: #ff5722!important
    }
    .main_counter_div{
           position: absolute;
    right: 22%;
    z-index: 444;
    }
    .banner-shape-1, .banner-shape-2, .banner-shape-3 {
        display: none!important;
    }
    @media (max-width: 767px){
        .header-nav {
            padding: 0px 0;
        }
    }
@media screen and (max-width: 768px) {
    .header-nav {
            padding: 0px 0;
        }
}
</style>
    <!--====== PRELOADER PART START ======-->

<!--     <div class="preloader" id="preloader">
        <div class="three ">
            <div class="loader" id="loader">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div> -->
<style type="text/css">
     
    #please_wait {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        opacity: 1.0;
    }
    #icons_style{
        margin-top: 243px;
            font-size: 80px;
        color: #ff5722;
    }
    .blockUI{border: none!important;}
 </style>

 <!-- preloader -->
 <div id="please_wait" style="display:none;">
    <i id="icons_style" class="fa fa-circle-o-notch fa-spin"></i>
</div>

    <!--====== PRELOADER PART START ======-->

    <!--====== HEADER PART START ======-->

    <header class="header-area">
        <div class="header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="header-top-item d-flex justify-content-between">
                            <div class="header-left-side">
                                <!-- <p><i class="fal fa-bells"></i>  -->
                                Turning Brands into Amazon Best Sellers</p>
                            </div>
                            <div class="header-right-social d-flex justify-content-end align-items-center">
                                <ul class="d-none d-sm-block">
                                    <li><a target="_blank" href="https://web.facebook.com/Angvo-102749278652306"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://twitter.com/Angvo3"target="_blank"><i class="fab fa-twitter" ></i></a></li>
                                    <li><a href="https://www.instagram.com/angvo1/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    <!-- <li><a href="#"><i class="fab fa-google"></i></a></li> -->
<!--                                     <li><a href="{{route('view_cart')}}"><i class="fas fa-shopping-cart"></i><span class="badge badge-pill badge-danger conter_style" id="cart_counter">{{\Cart::count() ? \Cart::count():''}}</span></a></li> -->
                                </ul>
                            </div>
                        </div> <!-- header top item -->
                    </div>
                </div> <!-- row -->
            </div>
        </div>
        <div class="header-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="navigation">
                            <nav class="navbar navbar-expand-lg navbar-light ">
                                <a class="navbar-brand" href="{{url('/')}}"><img style="width:200px;" src="{{asset('public/angvo/assets/images/logo.png')}}" alt=""></a>
                                <div class="main_counter_div">
                                    <a href="{{route('view_cart')}}" style="color: black;">
                                <i style="font-size:30px;" class="fa fa-shopping-cart"></i> <span class="badge badge-pill badge-danger conter_style1 cart_counter" id="cart_counter">{{\Cart::count() ? \Cart::count():''}}</span>
                                </a>
                                </div>
                                 <!-- logo -->
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                </button> <!-- navbar toggler -->

                                <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                    <ul class="navbar-nav m-auto">
                                         <li class="nav-item">
                                            <a class="nav-link" href="{{route('home_page')}}">Home </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('about_us')}}">about </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('services')}}">Services </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" target="_blank" href="https://api.whatsapp.com/send?phone=+923244448940&text=Hi, I’m reaching out through Angvo!">Contact</a>
                                        </li>
                                        <li class="nav-item">
                                            @if(auth()->check())
                                            <a class="nav-link" href="@if(auth()->user()->is_admin==1)
                                                {{route('supper_admin_dashboard')}}
                                                @elseif(auth()->user()->is_admin==2)
                                                {{route('vendor_dashboard')}}
                                            @else
                                            {{route('dashboard')}}
                                            @endif">Dashboard</a>
                                            @else
                                            <a class="nav-link" href="{{url('login')}}">Login</a>
                                            @endif
                                        </li>
                                        @if(auth()->check())
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('logout')}}">Logout </a>
                                        </li>
                                        @else
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('register')}}">Register </a>
                                        </li>
                                        @endif
                                         <!--  <li class="nav-item">
                                            <a class="nav-link" href="{{route('view_cart')}}"><i class="fa fa-shopping-cart"></i> <span class="badge badge-pill badge-danger conter_style cart_counter" id="cart_counter">{{\Cart::count() ? \Cart::count():''}}</span></a>
                                        </li> -->
                                    </ul>
                                </div> <!-- navbar collapse -->
                                <div class="navbar-btn d-none d-sm-block">
                                    <a class="main-btn" href="{{route('services')}}">LET'S GET STARTED</a>
                                </div>
                            </nav>
                        </div> <!-- navigation -->
                    </div>
                </div> <!-- row -->
            </div>
        </div>
    </header>

    <!--====== HEADER PART ENDS ======-->