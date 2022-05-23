@extends('layouts.front')
@section('content')
    @include('front.include.errors')

    <style>
        .header-section{background:white!important;}
        .movie-facility{background: #f6f6f6;}
        @media (max-width: 514px) {
            #right-summary {
                display: none;
            }
        }

        @media (min-width: 515px) {
            #left-summary {
                display: none;
            }
        }

        .create_account_divs{display: none;}
        @media (min-width: 576px)
        {
h1 {
    font-size: 50px;
    color: black;
}
}
h1 {
    font-size: 50px;
    color: black;
}
.booking-summery
{
        background: white;
      color: black;
}
.title{color:black;}
.proceed-area {
    padding: 30px;
    background: white;
    color: black;
}
.subtitle{color: black;}
.checkout-widget
{
    background:white;
    color:black;
}
.preloader {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 9999;
    width: 100%;
    height: 100%;
    background: #92b198a8;
    overflow: hidden;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- ==========Banner-Section========== -->
    @include('common.error')
    <!-- ==========Page-Title========== -->

    <!-- ==========Page-Title========== -->

    <!-- ==========Movie-Section========== -->
    <div class="movie-facility padding-bottom padding-top">

        <div class="container">
            @if(session()->has('message'))
            <div class="row">
                <div class="col-md-12">
                    <br>
                             <center>

                        <p style=" 
                            padding-bottom: 20px;
                            font-size: 20px;
                            font-weight: bold;
                            color: red;">{{session()->get('message')}}</p>

                        </center>
                </div>
            </div>
        @endif
            <form method="post" action="{{route('pay')}}" enctype="multipart/form-data" onsubmit="return validate_checkobxes();">
                @csrf
                <input type="hidden" name="payment_method" id="payment_method" value="strip">
                <div class="row">
                   <!-- s -->
                    <div class="col-lg-4" id="right-summary1">
                        <div class="booking-summery bg-one">
                            <h4 class="title">Payment summery</h4>

                        
                            <ul> 
                            <li><strong>Choosed Packages</strong> </li>
                             <li id="package_title">
                             </li>
                            </ul>

                        </div>
                        <div class="proceed-area  text-center">
                            <h6 class="subtitle"><span>Amount Payable</span><span id="payable"></span></h6>
                            
                           
                        </div>
                    </div>
                    <div class="col-lg-8">

                        <div class="checkout-widget">

                                <label>
                                <b> Choose Packages</b>

                            </label>
                                <div class="row">
                             @if(isset($packages) and sizeof($packages)>0)
                             @foreach($packages as $p)
                            <div class="col-md-6">
                                <label onclick="append_items();">
                                <input price="{{$p->price}}" title="{{$p->title}}" class="custom_boxes" value="{{$p->id}}" type="checkbox" name="packages[]" style="width:20px;" >
                                <span style="    position: absolute;
                            top: 11px;
                            left: 42px;">{{$p->title}}</span> 
                                </label>
                            </div>
                            @endforeach
                            @endif
                         
                        </div>
                                                    </div>
                        @guest
                            
                            <div class="checkout-widget checkout-contact checkout-card ">
                                <h5 class="title">Login / Sign up</h5>
                                <div class="row">
                                    <div class="col-md-6 create_account_divs" >
                                        <div class="form-group">
                                    <input id="first_name" type="text" name="first_name" placeholder="First Name">
                                    </div>
                                    </div>
                                    <div class="col-md-6 create_account_divs">
                                        <div class="form-group">
                                    <input id="last_name" type="text" name="last_name" placeholder="Last Name" >
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                         
                                    <input type="email" name="email" placeholder="Enter your email" value="{{old('email')}}"  autocomplete="off" required="required">
                                </div>
                            </div>
                                <div class="col-md-6">
                                        <div class="form-group">
                                    <input type="password" name="password" placeholder="Enter Password" required="required" >
                                </div>
                                    </div>
                                </div>
                                

                                <div class="form-group create_account_divs">
                                    <input type="text" name="phone" placeholder="Enter your Phone Number " value="{{old('phone')}}" >
                                </div>
                                @guest


                                    <div class="payment-card-form">
                                        <div class="form-group check-group">

                                            <input id="create_account" type="checkbox" name="create_account" value="1">
                                            <label for="create_account">
                                                <span class="title" style="    margin-top: 9px;">Create account?</span>
                                            </label>
                                        </div>
                                    </div>
                                @endguest
                            </div>
                        @endguest

                       <div class="checkout-widget checkout-card mb-0 accordion" id="accordion">
                            <h5 class="title">Payment Option </h5>
                            <ul class="payment-option">
                                <li class="active" id="strip-li">
                                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#strip-payment" aria-expanded="true" aria-controls="strip-payment" onclick="paymentType('strip')">
                                        <img src="{{asset('public/assets/images/payment/card.png')}}" alt="payment">
                                        <span>Credit Card</span>
                                    </a>
                                </li>
                                <li class="" id="paypal-li">
                                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#paypal-payment" aria-expanded="true" aria-controls="paypal-payment" onclick="paymentType('paypal')">
                                        <img src="{{asset('public/assets/images/payment/paypal.png')}}" alt="payment">
                                        <span>PayPal</span>
                                    </a>
                                </li>
                            </ul>
                            <div id="strip-payment" class="collapse show" data-parent="#accordion">
                                <h6 class="subtitle">Enter Your Card Details </h6>
                                <div class="payment-card-form">
                                    <div class="form-group w-100">
                                        <label for="card1">Card Number</label>
                                        <input type="text" id="card1" name="card_no" placeholder="16 Digit Number" minlength="14" maxlength="16" value="{{old('card_no')}}" required>
                                        <div class="right-icon">
                                            <i class="flaticon-lock"></i>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="card3">Expiration</label>
                                        <input onkeyup="validate_this(this);" type="text" id="card3" placeholder="MM/YYYY" minlength="7" maxlength="7" name="expiry" value="{{old('expiry')}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="card4">CVV</label>
                                        <input type="text" id="card4" minlength="3" maxlength="4" placeholder="CVV" name="cvv" value="{{old('cvv')}}" required>
                                    </div>
                                    <div class="form-group check-group">
                                        <input id="card5" type="checkbox" checked>
                                        <label for="card5">
                                            <span class="title">QuickPay</span>
                                            <span class="info">Save this card information to my   account and make faster payments.</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="custom-button">make payment</button>
                                    </div>
                                </div>
                            </div>
                            <div id="paypal-payment" class="collapse" data-parent="#accordion">
                                <div>
                                    <button type="submit" class="custom-button back-button">Pay with Paypal</button>
                                </div>
                            </div>
                            <p class="notice">
                                By Clicking "Make Payment" you agree to the <a href="#0">terms and conditions</a>
                            </p>
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
    <!-- ==========Movie-Section========== -->

@endsection

@section('footer_scripts')
    <script>

function validate_this(e)
{
    var date=$(e).val();
     var b = "/";
     var position = 2;
    if(date.length>1)
    {  
        date=date.replace("/", "");
        var output = [date.slice(0, position), b, date.slice(position)].join('');
        $(e).val(output);
        // console.log(output);
    }
};
 // $("#paypal-li").addClass('active')
 //                $("#strip-li").removeClass('active')
 //                $("#payment_method").val('paypal')
 //                $('#strip-payment :input').removeAttr('required')
        var paymentType = function (type) {
            if (type == 'strip') {
                $("#strip-li").addClass('active')
                $("#paypal-li").removeClass('active')
                $("#payment_method").val('strip')

                $('#strip-payment :input').attr('required', true)
            } else {
                $("#paypal-li").addClass('active')
                $("#strip-li").removeClass('active')
                $("#payment_method").val('paypal')
                $('#strip-payment :input').removeAttr('required')
            }
        }


        $("#create_account").on('click', function () {
            console.log('clicked')
            if ($(this).is(':checked') == 1) {
                $(".create_account_divs").show(500);
                $('.create_account_divs :input').attr('required','required');
            } else {
                $(".create_account_divs").hide(500);
                $('.create_account_divs :input').removeAttr('required');
            }
        })
    </script>



    <script>
        function show_price(e)
        {
            var price=$("#package option:selected").attr('price');
            var text=$('#package option:selected').text();
            if(price>0)
            {
                $('#package_title').text(text);
                $('#payable').text("$"+price);
            }
            else
            {
                $('#package_title').text("");
                $('#payable').text("$0.00");
            }
        }

function append_items()
{
   
    $('#package_title').html('');
    var total=0;
    $('.custom_boxes').each(function()
    {
        if($(this).is(':checked'))
        {  
            total=total+parseFloat($(this).attr('price'));
            // alert($(this).text());
            $('#package_title').append('<p> <span>'+$(this).attr('title')+'</span><span class="float-right"><i class="fa fa-gbp"></i> '+$(this).attr('price')+'</span></p>');
        }
    });
    $('#payable').html('<i class="fa fa-gbp"></i> '+total.toFixed(2));
}
function validate_checkobxes()
{
     var checkboxes = document.querySelectorAll('.custom_boxes');
    var checkedOne = Array.prototype.slice.call(checkboxes).some(x => x.checked);
    if(checkedOne)
    {
        $.blockUI({ overlayCSS: { backgroundColor: '#001232' } });
        return true;
    }
    else
    {
        toastr.error("Please choose  atleast one package",'error');
        return false;
    }
}
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.js"></script>
    <script type="text/javascript">
         
    </script>
@endsection
