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
    <link href="{{ asset('assets/css/toastr.min.css') }}" rel="stylesheet">
    <style>
        .toast {
    opacity:1!important;
}
    </style>
    <!--====== animate css ======-->
    <link rel="stylesheet" href="{{asset('website/assets/css/animate.css')}}">

    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="{{asset('website/assets/css/all.css')}}">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{asset('website/assets/css/magnific-popup.css')}}">

    <!--====== nice select css ======-->
    <!-- <link rel="stylesheet" href="{{asset('website/assets/css/nice-select.css')}}"> -->

    <!--====== rangeSlider css ======-->
    <link rel="stylesheet" href="{{asset('website/assets/css/ion.rangeSlider.min.css')}}">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{asset('website/assets/css/slick.css')}}">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{asset('website/assets/css/default.css')}}">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{asset('website/assets/css/style.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

@include('website.include.header')
@yield('content')
@include('website.include.footer')
  <!--====== jquery js ======-->
    <script src="{{asset('website/assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('website/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{asset('website/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('website/assets/js/popper.min.js')}}"></script>

    <!--====== Slick js ======-->
    <script src="{{asset('website/assets/js/slick.min.js')}}"></script>

    <!--====== counterup js ======-->
    <script src="{{asset('website/assets/js/jquery.counterup.min.js')}}"></script>

    <!--====== nice select js ======-->
    <!-- <script src="{{asset('website/assets/js/jquery.nice-select.min.js')}}"></script> -->

    <!--====== waypoints js ======-->
    <script src="{{asset('website/assets/js/waypoints.min.js')}}"></script>

    <!--====== rangeSlider js ======-->
    <script src="{{asset('website/assets/js/ion.rangeSlider.min.js')}}"></script>

    <!--====== wow js ======-->
    <script src="{{asset('website/assets/js/wow.min.js')}}"></script>

    <!--====== Magnific Popup js ======-->
    <script src="{{asset('website/assets/js/jquery.magnific-popup.min.js')}}"></script>

    <!--====== Ajax Contact js ======-->
    <script src="{{asset('website/assets/js/ajax-contact.js')}}"></script>

    <!--====== Main js ======-->
    <script src="{{asset('website/assets/js/main.js')}}"></script>


<!--Scroll to top-->
<script src="{{ asset('public/assets/js/toastr.min.js')}}"></script>
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

    @if($errors->any())
    @php
        $html  = "<ul>";

        foreach ($errors->all() as $error) {
            $html .= "<li> $error </li>";
        }
            $html .= "</ul>";
    @endphp
    // toastr.error("{!! $html !!}", 'Error');

    @endif

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

 function add_to_cart(e)
{
    var data = {
        id:$(e).attr('id'),
        package: 'Forever',
        package_type: 'one_time_payment',
        sub_service_id: 0,
        sub_service_title: '',
        price: $(e).attr('price'),
        vendor_price: $(e).attr('vendor_price'),
        _token:'{{csrf_token()}}'
    }
    generalAjax(data, '{{route("add_to_cart")}}', function(res){
        if(res.status)
        {
            $('.cart_counter').text(res.response.count);
            toastr.success(res.response.msg,'Success');
        }
        else{
          toastr.error(res.response,'Error');
        }
    });
}
 function add_to_cart_subscriptions(e)
{
    var data = {
        id:$(e).attr('id'),
        package: $(e).attr('package'),
        package_type: 'subscription',
        sub_service_id: 0,
        sub_service_title: '',
        price: $(e).attr('price'),
        vendor_price: $(e).attr('vendor_price'),
        _token:'{{csrf_token()}}'
    }
    generalAjax(data, '{{route("add_to_cart")}}', function(res){
        if(res.status)
        {
            $('.cart_counter').text(res.response.count);
            toastr.success(res.response.msg,'Success');
        }
        else{
          toastr.error(res.response,'Error');
        }
    });
}
 function add_to_cart_sub_services(e)
{
    var data = {
        id:$(e).attr('id'),
        package: $(e).attr('package'),
        package_type: 'sub_service',
        sub_service_id: $(e).attr('sub_service_id'),
        sub_service_title: $(e).attr('sub_service_title'),
        price: $(e).attr('price'),
        vendor_price: $(e).attr('vendor_price'),
        _token:'{{csrf_token()}}'
    }
    if(data.sub_service_id !='')
    {
        generalAjax(data, '{{route("add_to_cart")}}', function(res){
        if(res.status)
        {
            $('.cart_counter').text(res.response.count);
            toastr.success(res.response.msg,'Success');
        }
        else{
          toastr.error(res.response,'Error');
        }
       });

    } else
    {
        toastr.error("Please choose subscription",'Error');
    }
}
 function remove_from_cart(e)
{
    generalAjax({id:$(e).attr('id'),_token:'{{csrf_token()}}'}, '{{route("remove_from_cart")}}', function(res){
        if(res.status)
        {
            $('#cart_counter').text(res.response.count);
            $(e).parent().remove();
            toastr.success(res.response.msg,'Success');
        }
        else{
          toastr.error(res.response,'Error');
        }
    });
}
   function sub_email()
    {
        var data = {
            email:$('#subscribe_email').val(),
            _token:'{{csrf_token()}}'
        }
        generalAjax(data, '{{route("subscirbe_email")}}', function(res){
            if(res.status)
            {
                $('#subscribe_email').val('');
                toastr.success(res.response,'Success');
            }
            else{
              toastr.error(res.response,'Error');
            }
        });
    }
</script>
</body>
</html>

