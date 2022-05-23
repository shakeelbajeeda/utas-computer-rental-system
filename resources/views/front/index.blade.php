@extends('layouts.guest')
@section('content')
    @include('guest.include.errors')
    <style>
        @media (max-width: 415px) {
            .item, .item a {
                width: 100%;
            }
        }
        .movie-list .movie-content .movie-tags a::after {
    content: "|";
    font-size: 14px;
    color: #dbe2fb;
    margin: 0 15px;
    display: none;
}
    </style>
    <!-- ==========Banner-Section========== -->
    <section class="banner-section">
        <div class="banner-bg bg_img bg-fixed" data-background="{{asset('public/assets/images/banner/banner01.jpg')}}"></div>
        <div class="container">
            <div class="banner-content">
                <h1 class="title  cd-headline clip"><span class="d-block">book your</span> tickets for
                    <span class="color-theme cd-words-wrapper p-0 m-0">
                        <b class="is-visible">Movie</b>
                    </span>
                </h1>
                <p>Safe, secure, reliable ticketing.Your ticket to live entertainment!</p>
            </div>
        </div>
    </section>
    <!-- ==========Banner-Section========== -->
    <form action="" autocomplete="off">
        <!-- ==========Ticket-Search========== -->
        <section class="search-ticket-section padding-top pt-lg-0">
            <div class="container">
                <div class="search-tab bg_img" data-background="{{asset('public/assets/images/ticket/ticket-bg01.jpg')}}">
                    <div class="row align-items-center mb--20">
                        <div class="col-lg-6 mb-20">
                            <div class="search-ticket-header">
                                <h6 class="category">welcome to Drive In Movie Night </h6>
                                <h3 class="title">what are you looking for</h3>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-20">
                        </div>
                    </div>
                    <div class="tab-area">
                        <div class="tab-item active">
                            <div class="ticket-search-form">
                                <div class="form-group large">
                                    <input type="text" placeholder="Search fo Movies" name="q" value="{{$q}}">
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </div>
                                <div class="form-group">
                                    <div class="thumb">
                                        <img src="{{asset('public/assets/images/ticket/city.png')}}" alt="ticket">
                                    </div>
                                    <span class="type">City</span>
                                    <select class="select-bar" name="city">
                                        <option value="" selected>select</option>
                                        @if (isset($cities) && count($cities))
                                            @foreach($cities as $c)
                                                <?php $c = strtolower($c); ?>
                                                <option value="{{$c}}" {{$c==$city?'selected':''}} >{{ucfirst($c)}}</option>
                                            @endforeach
                                        @endif

                                        {{--                                    <option value="london">Anaheim</option>--}}
                                        {{--                                    <option value="dhaka"> San Bernardino</option>--}}
                                        {{--                                    <option value="rosario">Los Angeles</option>--}}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="thumb">
                                        <img src="{{asset('public/assets/images/ticket/date.png')}}" alt="ticket">
                                    </div>
                                    <span class="type">date</span>
                                    <select class="select-bar" name="date">
                                        <option value="" selected>select</option>
                                        @if (isset($dates) && count($dates))
                                            @foreach($dates as $d)
                                                <option value="{{$d->format('Y-m-d')}}" {{$d->format('Y-m-d')==$date?'selected':''}}>{{$d->format('m/d/Y')}}</option>
                                            @endforeach
                                        @endif
                                        {{--                                    <option value="26-12-19">23/10/2020</option>--}}
                                        {{--                                    <option value="26-12-19">24/10/2020</option>--}}
                                        {{--                                    <option value="26-12-19">25/10/2020</option>--}}
                                        {{--                                    <option value="26-12-19">26/10/2020</option>--}}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="thumb">
                                        <img src="{{asset('public/assets/images/ticket/cinema.png')}}" alt="ticket">
                                    </div>
                                    <span class="type">cinema</span>
                                    <select class="select-bar" name="cinema">
                                        {{--                                    <option value="Awaken">Drive In Movie Night</option>--}}
                                        <option value="" selected>select</option>
                                        @if (isset($cinemas) && count($cinemas))
                                            @foreach($cinemas as $c)
                                                <?php $c = strtolower($c); ?>
                                                <option value="{{$c}}" {{$c==$cinema?'selected':''}}>{{ucfirst($c)}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="tab-item">
                            <div class="ticket-search-form">
                                <div class="form-group large">
                                    <input type="text" placeholder="Search fo Events">
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </div>
                                <div class="form-group">
                                    <div class="thumb">
                                        <img src="{{asset('public/assets/images/ticket/city.png')}}" alt="ticket">
                                    </div>
                                    <span class="type">city</span>
                                    <select class="select-bar">
                                        <option value="london">London</option>
                                        <option value="dhaka">dhaka</option>
                                        <option value="rosario">rosario</option>
                                        <option value="madrid">madrid</option>
                                        <option value="koltaka">kolkata</option>
                                        <option value="rome">rome</option>
                                        <option value="khoksa">khoksa</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="thumb">
                                        <img src="{{asset('public/assets/images/ticket/date.png')}}" alt="ticket">
                                    </div>
                                    <span class="type">date</span>
                                    <select class="select-bar">
                                        <option value="26-12-19">23/10/2019</option>
                                        <option value="26-12-19">24/10/2019</option>
                                        <option value="26-12-19">25/10/2019</option>
                                        <option value="26-12-19">26/10/2019</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="thumb">
                                        <img src="{{asset('public/assets/images/ticket/cinema.png')}}" alt="ticket">
                                    </div>
                                    <span class="type">event</span>
                                    <select class="select-bar">
                                        <option value="angular">angular</option>
                                        <option value="startup">startup</option>
                                        <option value="rosario">rosario</option>
                                        <option value="madrid">madrid</option>
                                        <option value="koltaka">kolkata</option>
                                        <option value="Last-First">Last-First</option>
                                        <option value="wish">wish</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="tab-item">
                            <div class="ticket-search-form">
                                <div class="form-group large">
                                    <input type="text" placeholder="Search fo Sports">
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </div>
                                <div class="form-group">
                                    <div class="thumb">
                                        <img src="{{asset('public/assets/images/ticket/city.png')}}" alt="ticket">
                                    </div>
                                    <span class="type">city</span>
                                    <select class="select-bar">
                                        <option value="london">London</option>
                                        <option value="dhaka">dhaka</option>
                                        <option value="rosario">rosario</option>
                                        <option value="madrid">madrid</option>
                                        <option value="koltaka">kolkata</option>
                                        <option value="rome">rome</option>
                                        <option value="khoksa">khoksa</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="thumb">
                                        <img src="{{asset('public/assets/images/ticket/date.png')}}" alt="ticket">
                                    </div>
                                    <span class="type">date</span>
                                    <select class="select-bar">
                                        <option value="26-12-19">23/10/2019</option>
                                        <option value="26-12-19">24/10/2019</option>
                                        <option value="26-12-19">25/10/2019</option>
                                        <option value="26-12-19">26/10/2019</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="thumb">
                                        <img src="{{asset('public/assets/images/ticket/cinema.png')}}" alt="ticket">
                                    </div>
                                    <span class="type">sports</span>
                                    <select class="select-bar">
                                        <option value="football">football</option>
                                        <option value="cricket">cricket</option>
                                        <option value="cabadi">cabadi</option>
                                        <option value="madrid">madrid</option>
                                        <option value="gadon">gadon</option>
                                        <option value="rome">rome</option>
                                        <option value="khoksa">khoksa</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ==========Ticket-Search========== -->


        <!-- ==========Movie-Section========== -->
        <section class="movie-section padding-top padding-bottom">
            <div class="container">
                <div class="row flex-wrap-reverse justify-content-center">
                    <div class="col-lg-12 mb-50 mb-lg-0">
                        <div class="filter-tab tab">
                            {{--form start old--}}
                            <div class="filter-area">
                                <div class="filter-main">
                                    <div class="left">
                                        <div class="item">
                                            <span class="show">Show :</span>
                                            <select class="select-bar" name="per_page">
                                                <option value="6" {{$per_page == 6 ? 'selected' : ''}}>6</option>
                                                <option value="12" {{$per_page == 12 ? 'selected' : ''}}>12</option>
                                                <option value="24" {{$per_page == 24 ? 'selected' : ''}}>24</option>
                                                <option value="48" {{$per_page == 48 ? 'selected' : ''}}>48</option>
                                                <option value="99" {{$per_page == 99 ? 'selected' : ''}}>99</option>
                                            </select>
                                        </div>
                                        <div class="item">
                                            <span class="show">Sort By :</span>
                                            <select class="select-bar" name="order">
                                                <option value="latest" {{$order == 'latest' ? 'selected' : ''}}>Latest</option>
                                                <option value="title" {{$order == 'title' ? 'selected' : ''}}>A-Z</option>
                                                {{--                                                <option value="showing">now showing</option>--}}
                                                {{--                                                <option value="exclusive">exclusive</option>--}}
                                                {{--                                                <option value="trending">trending</option>--}}
                                                {{--                                                <option value="most-view">most view</option>--}}
                                            </select>
                                        </div>
                                        <div class="item">
                                            <button type="submit" class="btn btn-outline-primary btn-sm" style="height: 35px;color:white;">Apply Filter</button>
                                        </div>
                                        <div class="item">
                                            <a href="{{route('home_page')}}" class="btn btn-outline-primary btn-sm" style="height:35px;color:white;">Clear Filter</a>
                                        </div>

                                    </div>
                                    <ul class="grid-button tab-menu">
                                        <li>
                                            <i class="fas fa-th"></i>
                                        </li>
                                        <li class="active">
                                            <i class="fas fa-bars"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
    </form>
    <div class="tab-area">
        <div class="tab-item">
            <div class="row mb-10 justify-content-center">
                @foreach($events as $row)
                    <?php
                    if ($row->images->count()) {
                        $src = asset('/public/images/event_images') . '/' . $row->images[0]->image;
                    } else {
                        $src = asset('public/assets/images/movie/movie01.jpg');
                    }
                    ?>
                    <div class="col-sm-6 col-lg-4">
                        <div class="movie-grid">
                            <div class="movie-thumb c-thumb">
                                <a href="{{route('single')}}/{{$row->slug}}"><img src="{{$src}}" alt="movie"></a>
                            </div>
                            <div class="movie-content bg-one">
                                <h5 class="title m-0">
                                    <a href="{{route('single')}}/{{$row->slug}}">{{$row->title}}</a>
                                </h5>
{{--                                <ul class="movie-rating-percent">--}}
{{--                                    <li>--}}
{{--                                        <div class="thumb">--}}
{{--                                            <img src="{{asset('public/assets/images/movie/tomato.png')}}" alt="movie">--}}
{{--                                        </div>--}}
{{--                                        <span class="content">88%</span>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <div class="thumb">--}}
{{--                                            <img src="{{asset('public/assets/images/movie/cake.png')}}" alt="movie">--}}
{{--                                        </div>--}}
{{--                                        <span class="content">88%</span>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="tab-item active">
            <div class="movie-area mb-10">
                @foreach($events as $row)
                    <?php
                    if ($row->images->count()) {
                        $src = asset('/public/images/event_images') . '/' . $row->images[0]->image;
                    } else {
                        $src = asset('public/assets/images/movie/movie01.jpg');
                    }
                    ?>
                    <div class="movie-list">
                        <div class="movie-thumb c-thumb">
                            <a href="{{route('single')}}/{{$row->slug}}" class="w-100 bg_img h-100" data-background="{{$src}}">
                                <img class="d-sm-none" src="{{$src}}" alt="movie">
                            </a>
                        </div>
                        <div class="movie-content bg-one">
                            <h5 class="title">
                                <a href="{{route('single')}}/{{$row->slug}}">{{$row->title}}</a>
                            </h5>
                            <p class="duration">{{$row->movie_time_hour}} hrs {{$row->movie_time_minutes}} min</p>
                            <div class="movie-tags details-banner-content">
                                @foreach($row->categories as $cat)
                                    <a href="javascript:void(0);" class="button">{{$cat->title}}</a>
                                @endforeach
                            </div>

                            <div class="release">
                                <span>Movie Date : </span> <a href="#0"> {{$row->event_date ? $row->event_date->format("F j , Y") : ''}}</a><br>
                                <span>Movie Timing : </span> <a href="#0"> {{$row->event_time ? date("h:i A",strtotime($row->event_time)) : ''}}</a>
                            </div>

                            {{--                            <ul class="movie-rating-percent">--}}
                            {{--                                <li>--}}
                            {{--                                    <div class="thumb">--}}
                            {{--                                        <img src="{{asset('public/assets/images/movie/tomato.png')}}" alt="movie">--}}
                            {{--                                    </div>--}}
                            {{--                                    <span class="content">88%</span>--}}
                            {{--                                </li>--}}
                            {{--                                <li>--}}
                            {{--                                    <div class="thumb">--}}
                            {{--                                        <img src="{{asset('public/assets/images/movie/cake.png')}}" alt="movie">--}}
                            {{--                                    </div>--}}
                            {{--                                    <span class="content">88%</span>--}}
                            {{--                                </li>--}}
                            {{--                            </ul>--}}
                            <div class="book-area" style="margin-top: 110px;">
                                <div class="book-ticket">
                                    {{--                                    <div class="react-item">--}}
                                    {{--                                        <a href="#0">--}}
                                    {{--                                            <div class="thumb">--}}
                                    {{--                                                <img src="{{asset('public/assets/images/icons/heart.png')}}" alt="icons">--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </div>--}}
                                    <div class="react-item mr-auto">
                                        <a href="{{route('choose_seat',$row->slug)}}">
                                            <div class="thumb">
                                                <img src="{{asset('public/assets/images/icons/book.png')}}" alt="icons">
                                            </div>
                                            <span>book ticket</span>
                                        </a>
                                    </div>
                                    <div class="react-item">
                                        <a href="{{$row->trailer}}" class="popup-video" target="_blank">
                                            <div class="thumb">
                                                <img src="{{asset('public/assets/images/icons/play-button.png')}}" alt="icons">
                                            </div>
                                            <span>watch trailer</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @if ($paginator->lastPage() > 1)
        <div class="pagination-area text-center">
            <a href="{{ $paginator->currentPage() != 1 ? $paginator->url($paginator->currentPage()-1) : '#' }}" class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}"><i class="fas fa-angle-double-left"></i><span>Prev</span></a>

            @for ($i = 1; $i <= $paginator->lastPage(); $i++)

                <a href="{{ $paginator->url($i) }}" class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">{{ $i }}</a>

            @endfor

            <a class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}" href="{{ $paginator->currentPage() != $paginator->lastPage() ? $paginator->url($paginator->currentPage()+1) : "#"}}"><span>Next</span><i class="fas fa-angle-double-right"></i></a>


        </div>
        {{--                            <ul class="pagination">--}}
        {{--                                <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">--}}
        {{--                                    <a href="{{ $paginator->url(1) }}">Previous</a>--}}
        {{--                                </li>--}}
        {{--                                @for ($i = 1; $i <= $paginator->lastPage(); $i++)--}}
        {{--                                    <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">--}}
        {{--                                        <a href="{{ $paginator->url($i) }}">{{ $i }}</a>--}}
        {{--                                    </li>--}}
        {{--                                @endfor--}}
        {{--                                <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">--}}
        {{--                                    <a href="{{ $paginator->url($paginator->currentPage()+1) }}">Next</a>--}}
        {{--                                </li>--}}
        {{--                            </ul>--}}
        @endif

        {{--                        <div class="pagination-area text-center">--}}
        {{--                            <a href="#0"><i class="fas fa-angle-double-left"></i><span>Prev</span></a>--}}
        {{--                            <a href="#0">1</a>--}}
        {{--                            <a href="#0">2</a>--}}
        {{--                            <a href="#0" class="active">3</a>--}}
        {{--                            <a href="#0">4</a>--}}
        {{--                            <a href="#0">5</a>--}}
        {{--                            <a href="#0"><span>Next</span><i class="fas fa-angle-double-right"></i></a>--}}
        {{--                        </div>--}}
        {{--                        <div class="pagination-area text-center">{!! $events->links() !!}</div>--}}
        </div>
        </div>
        </div>
        </div>
        </section>
        <!-- ==========Movie-Section========== -->
        <!-- ==========FOOD Section========== -->
        {{--
        <div class="movie-facility padding-bottom padding-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
    <!--                     <div class="c-thumb padding-bottom">
                            <img src="{{asset('public/assets/images/sidebar/banner/banner04.jpg')}}" alt="sidebar/banner">
                        </div> -->
                        <div class="section-header-3">
                            <span class="cate">You're hungry</span>
                            <h2 class="title">we have food</h2>
                            <p>Prebook Your Meal and Save More!</p>
                        </div>
                        <div class="grid--area">
                            <ul class="filter">
                                <li data-filter="*" class="active">all</li>
                                <li data-filter=".combos">combos</li>
                                <li data-filter=".bevarage">bevarage</li>
                                <li data-filter=".popcorn">popcorn</li>
                            </ul>
                            <div class="grid-area">
                                <div class="grid-item combos popcorn">
                                    <div class="grid-inner">
                                        <div class="grid-thumb">
                                            <img src="{{asset('public/assets/images/movie/popcorn/pop1.png')}}" alt="movie/popcorn">
                                            <div class="offer-tag">
                                                $57
                                            </div>
                                            <div class="offer-remainder">
                                                <h6 class="o-title mt-0">24%</h6>
                                                <span>off</span>
                                            </div>
                                        </div>
                                        <div class="grid-content">
                                            <h5 class="subtitle">
                                                <a href="#0">
                                                    Muchaco, Crispy Taco, Bean Burrito
                                                </a>
                                            </h5>

                                        </div>
                                    </div>
                                </div>
                                <div class="grid-item bevarage">
                                    <div class="grid-inner">
                                        <div class="grid-thumb">
                                            <img src="{{asset('public/assets/images/movie/popcorn/pop2.png')}}" alt="movie/popcorn">
                                            <div class="offer-tag">
                                                $57
                                            </div>
                                            <div class="offer-remainder">
                                                <h6 class="o-title mt-0">24%</h6>
                                                <span>off</span>
                                            </div>
                                        </div>
                                        <div class="grid-content">
                                            <h5 class="subtitle">
                                                <a href="#0">
                                                    Crispy Beef Taco, Beef Mucho Nachos
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        --}}
        <!-- ==========END FOOD Section========== -->


        <!-- ==========Speaker-Single========== -->
        <section class="apps-seciton padding-top pt-lg-0">
            <br><br>
            <div class="container">
                <div class="apps-wrapper bg-six padding-top padding-bottom">
                    <div class="bg_img apps-bg" data-background="{{asset('public/assets/images/apps/apps01.png')}}"></div>
                    <div class="section-header-3">
                        <span class="cate">get Drive In Movie Night  app</span>
                        <h2 class="title">app download</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-7 offset-lg-5">
                            <div class="content">
                                <h5 class="title">MAKE LIFE EASIER</h5>
                                <p>
                                    As the largest mobile platform in the country, we have the right
                                    services, the know-how and the expertise to make your buying
                                    transition to mobile simple, easy and painless.
                                </p>
                                <ul class="app-button">
                                    <li>
                                        <a href="#0">
                                            <img src="{{asset('public/assets/images/apps/apps03.png')}}" alt="apps">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#0">
                                            <img src="{{asset('public/assets/images/apps/apps02.png')}}" alt="apps">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="counter--area">
                                <div class="counter-item">
                                    <div class="d-flex justify-content-center align-items-center mb-10">
                                        <h4 class="odometer title" data-odometer-final="50"></h4>
                                        <h4 class="title">M+</h4>
                                    </div>
                                    <p class="info">apps downloads</p>
                                </div>
                                <div class="counter-item">
                                    <div class="d-flex justify-content-center align-items-center mb-10">
                                        <h4 class="odometer title" data-odometer-final="15"></h4>
                                        <h4 class="title">M+</h4>
                                    </div>
                                    <p class="info">tickets a month</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ==========Speaker-Single========== -->
        <br>
@endsection
