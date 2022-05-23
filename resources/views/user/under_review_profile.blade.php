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
</style>
    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">Profile Under Review</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Profile Under Review</li>
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
                        <h4>Profile Under Review</h4>
                    </div>
                    <div class="widget-body">
                        <p style="text-align:justify;color: black;">
                            Your profile is under review. Admin will update your profile's status within 24 hours.
                        </p>

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
