@if(auth()->user() and request()->route()->getName() != 'home_page')
     @if(auth()->user()->is_active == 0)
         <?php
           session()->flash('message', "Your Account has been blocked. Please contact to Admin");
           session()->flash('alert-type', "error");

         ?>
         <script>window.location = "{{route('home_page')}}";</script>
     @endif
 @endif
<!DOCTYPE html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>{{ENV('APP_NAME')}}</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{asset('website/assets/images/favicon.png')}}" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{asset('website/assets/css/bootstrap.min.css')}}">
    <!--====== Notification css ======-->
    <link href="{{ asset('public/assets/css/toastr.min.css') }}" rel="stylesheet">

    <style>
        .toast {
    opacity:1!important;
}
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="{{asset('website/plugins/bootstrap/css/bootstrap.min.css')}}">
    <!-- Icon Font Css -->
    <link rel="stylesheet" href="{{asset('website/plugins/icofont/icofont.min.css')}}">
    <!-- Slick Slider  CSS -->
    <link rel="stylesheet" href="{{asset('website/plugins/slick-carousel/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('website/plugins/slick-carousel/slick/slick-theme.css')}}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{asset('website/css/style.css')}}">
</head>
<body>

@include('website.include.header')
@yield('content')
@include('website.include.footer')

<!--Scroll to top-->
<script src="{{ asset('public/assets/js/toastr.min.js') }}"></script>



<script src="{{asset('website/plugins/jquery/jquery.js')}}"></script>
<!-- Bootstrap 4.3.2 -->
<script src="{{asset('website/plugins/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('website/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('website/plugins/counterup/jquery.easing.js')}}"></script>
<!-- Slick Slider -->
<script src="{{asset('website/plugins/slick-carousel/slick/slick.min.js')}}"></script>
<!-- Counterup -->
<script src="{{asset('website/plugins/counterup/jquery.waypoints.min.js')}}"></script>

<script src="{{asset('website/plugins/shuffle/shuffle.min.js')}}"></script>
<script src="{{asset('website/plugins/counterup/jquery.counterup.min.js')}}"></script>
<!-- Google Map -->
<script src="{{asset('website/plugins/google-map/map.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>

<script src="{{asset('website/js/script.js')}}"></script>
<script src="{{asset('website/js/contact.js')}}"></script>

<script type="text/javascript">
    toastr.options = {
        "closeButton": true,
        "debug": true,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "3000",
        "extendedTimeOut": "1000",
        // "showEasing": "swing",
        // "hideEasing": "linear",
        // "showMethod": "fadeIn",
        // "hideMethod": "fadeOut"
    }

    @if(Session::has('message'))
    var type = "{{Session::get('alert-type','Notification')}}"


    switch (type) {
        case 'Notification':
            toastr.info("{{ Session::get('message') }}", 'Congrats');
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}", 'Success');
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}", 'Warning');
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}", 'Error');
            break;
            default:
            toastr.error("{{ Session::get('message') }}", 'Error');
            break;
    }
    @endif
    @if($errors->any())
    @php
        $html  = "<ul>";

        foreach ($errors->all() as $error) {
            $html .= "<li> $error </li>";
        }
            $html .= "</ul>";
    @endphp
    toastr.error("{!! $html !!}", 'Error');
    @endif
</script>
@yield('footer_scripts')
<script type="text/javascript">

function generalAjax(data, route, call_back)

{



$.ajax({

type: "POST",

url: route,

data: data,

dataType: 'json',

async: true,

success: call_back,

error: function (err) {
 toastr.error("Network Server Error",'Error');
return err;

}

});

}


</script>
</body>
</html>

