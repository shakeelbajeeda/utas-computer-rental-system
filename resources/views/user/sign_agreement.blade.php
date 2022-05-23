@extends('layouts.user_dashboard')
{{-- page level styles --}}
@section('header_styles')

@stop
<!--Start page content-->
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('public/css/e_signatures/jquery.signaturepad.css')}}">

<style type="text/css">
.sigWrapper {
    clear: both;
    height: 60px;
    border: 1px solid #ccc;
}
.terms {
    text-align: justify;
    color: black;
    font-size: 20px;
    line-height: 35px;
    font-family: 'Noto Sans';
    font-style: inherit;
}
</style>
    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">Sign Terms & Conditions</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Sign Terms & Conditions</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row flex-row">

            <div class="col-xl-12">
                <div class="widget has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center">
                        <!-- <h4>Sign Terms & Conditions</h4> -->
                    </div>
                    <div class="widget-body">
                         @include('terms') 
@if(isset($user->signature) and $user->signature !="")
<div class="row">
<div class="col-md-12">
    <div style="float:right;">
    <b>Your Signatures</b>
    <br>
<img src="{{asset('public/public/images/singature_images')}}/{{$user->signature}}">
</div>
</div>
</div>
                        @else
                        <div class="row">
                            <div class="col-md-6">
                                <form id="s_form"  method="post" action="{{route('save_signature')}}">
                                    @csrf
                                     <input type="hidden" name="image" id="image" >
                                </form>
                            <center>
                                    <strong style="color:black;">Signature Preview</strong>
                                             <div id="img2"></div>
                                             <div id="img"></div> 
                                             <br>
                                    <button class="btn btn-primary" onclick="submit_form();">Update Signature</button>
                                </center>
                            </div>
                            <div class="col-xl-6 col-md-6">
<form id="s_form2" method="get" action="" class="sigPad" style="float:right;">
    <label for="name">Please draw your signature here</label>
    <input  type="text" name="singature" id="name" class="name" placeholder="Enter Signature here"  style="margin-bottom:5px;display: none;">
   
    <!-- <p class="typeItDesc">Review your signature</p> -->
    <!-- <p class="drawItDesc">Draw your signature</p> -->
    <ul class="sigNav">
      <li class="typeIt" onclick="type_it();"><a id="typeIt" href="#type-it">Type It</a></li>
      <li class="drawIt" onclick="draw_it();"><a class="current" id="drawIt" href="#draw-it" >Draw It</a></li>
      <li class="clearButton"><a  href="#clear">Clear</a></li>
    </ul>
    <div class="sig sigWrapper">
      <div class="typed" id="text_sign"></div>
      <canvas   class="pad" id="sign_pad" width="198" height="55"></canvas>
      <input type="hidden" name="output" class="output">
    </div>
  
    <button type="button" onclick="get_img();">Click To Preview</button>
  </form>

                            </div>
                        </div>
                       
                        
                        @endif
                    </div>
            </div>
        </div>
        <!-- End Row -->
    </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
@stop

@section('footer_scripts')
<script src="{{ asset('public/js/e_signatures/jquery.signaturepad.js') }}"></script>
<script src="{{ asset('public/js/e_signatures/json2.min.js') }}"></script>
    <!-- page level scripts -->



     <script>
        var s_behivior="drawIt";
    $(document).ready(function() {
      // $('.sigPad').signaturePad({drawOnly:true,drawBezierCurve3:true,lineTop:90});

      $('.sigPad').signaturePad({lineTop:90});

      $('#drawIt').click();
    });

    $('#btn1').click(function()
    {
        html2canvas([document.getElementById('sign_pad')],
             {
                onrendered:function(convas)
                {
                    var convas_img_data=convas.toDataURL('image/png');
                    var img_data=convas_img_data.replace(/^data:image\/(png | jpg) ;base64,/,"");
                    console.log(img_data);
                }
             }
            );
    });
    var element = $("#text_sign"); // global variable
    var getCanvas; // global variable

    function get_img()
    {
        
    $("html, body").animate({ scrollTop: $(document).height()-$(window).height() });
        if(s_behivior=="typeIt")
        {
            html2canvas(element, {
             onrendered: function (canvas) {
                    $("#img").html(canvas);
                    getCanvas = canvas;
                    var canvas = $("#img").children();
                    var context = canvas.get(0).getContext("2d");
                    var dataURL = canvas.get(0).toDataURL();
                    var img_data_64=dataURL.replace(/^data:image\/(png | jpg) ;base64,/,"");
                    $('#image').val(img_data_64);
                 }
                });
            
        }
        else
        {
              
            html2canvas([document.getElementById('sign_pad')],
             {
                onrendered:function(convas)
                {
                    var convas_img_data=convas.toDataURL('image/png');
                    var img_data=convas_img_data.replace(/^data:image\/(png | jpg) ;base64,/,"");
                    var img = $("<img></img>");
                        img.attr("src", img_data);
                        $('#img').html(img);
                    $('#image').val(img_data);
                }
             }
            );
            
        }
    }

    // function get_img2()
    // {
    //     var canvas = $("#img").children();
    //     var context = canvas.get(0).getContext("2d");
    //     var dataURL = canvas.get(0).toDataURL();
    //     var img = $("<img></img>");
    //     img.attr("src", dataURL);

    //     // canvas.replaceWith(img);
    //     $('#img2').html(img);

    // }
    function draw_it()
    {
        $('#name').hide();
        s_behivior="drawIt";

    }
    function type_it()
    {
        $('#name').show();
        s_behivior="typeIt";

    }
   function submit_form()
   {
    var image=$('#image').val();
    if(image!="")
    {
        $('#s_form').submit();
    }
    else
    {
        toastr.error('Please draw signature & click preview button first');
    }
   }
  </script>
@stop
