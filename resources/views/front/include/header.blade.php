<!-- ==========Preloader========== -->
<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- ==========Preloader========== -->
<!-- ==========Overlay========== -->
<div class="overlay"></div>
<a href="#0" class="scrollToTop">
    <i class="fas fa-angle-up"></i>
</a>
<!-- ==========Overlay========== -->

<!-- ==========Header-Section========== -->
<header class="header-section">
    <div class="container">
        <div class="header-wrapper">
            <div class="logo">
                <a href="{{route('home_page')}}">
                    <img src="{{asset('public/assets/images/logo/logo.png')}}" alt="logo">
                </a>
            </div>
            <ul class="menu">


                <li class="header-button pr-0">
                    @guest
                        <a href="{{route('login')}}">join us</a>

                    @else
                        @switch(Auth::user()->is_admin)
                            @case(1)
                            <a href="{{route('supper_admin_dashboard')}}">Dashboard</a>
                            @break
                            @case(2)
                            <a href="{{route('vendor_dashboard')}}">Dashboard</a>
                            @break
                            @default
                            <a href="{{route('dashboard')}}">Dashboard</a>
                        @endswitch
                    @endguest
                </li>
            </ul>
            <div class="header-bar d-lg-none">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</header>
<!-- ==========Header-Section========== -->
