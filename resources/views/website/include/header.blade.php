<header>
    <div class="header-top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <ul class="top-bar-info list-inline-item pl-0 mb-0">
                        <li class="list-inline-item"><a href=""><i
                                    class="icofont-support-faq mr-2"></i>support@utas.com</a></li>
                        <li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>Address Churchill Ave,
                            Hobart TAS 7005, Australia </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="text-lg-right top-right-bar mt-2 mt-lg-0">
                        <a href="">
                            <span>Call Now : </span>
                            <span class="h4"> +61 3 6226 2999</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navigation" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home_page') }}">
                <img src="{{ asset('website/images/logo.png') }}" alt="" class="img-fluid">
            </a>

            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain"
                aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icofont-navigation-menu"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarmain">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home_page') }}">Home</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('all_computers') }}">Rental
                            Computers</a></li>
                    <li class="nav-item">
                        @if (auth()->check())
                            <a class="nav-link"
                                href="@if (auth()->user()->role == 'Customer') {{ route('user_dashboard') }}

                          @else
                          {{ route('dashboard') }} @endif">Dashboard</a>
                        @else
                            <a class="nav-link" href="{{ url('login') }}">Login</a>
                        @endif
                    </li>
                    @if (auth()->check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
