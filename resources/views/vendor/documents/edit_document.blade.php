@extends('layouts/vendor')
{{-- page level styles --}}
@section('header_styles')
<style type="text/css">/* Chart.js */
@-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}
</style>
<style>
.color_class{color:#2c304d;} 

</style>
<style>

  .avatar-upload{position:relative;max-width:205px;margin:0 auto;}
  .avatar-upload .avatar-edit{position:absolute;right:0px;z-index:1;top:0px;}
  .avatar-upload .avatar-edit input{display:none;}
  .avatar-upload .avatar-edit input + label{display:inline-block;width:20px;height:20px;margin-bottom:0;border-radius:100%;background:#FFFFFF;border:1px solid transparent;box-shadow:0px 2px 4px 0px rgba(0, 0, 0, 0.12);cursor:pointer;font-weight:normal;transition:all 0.2s ease-in-out;}
  .avatar-upload .avatar-edit input + label:hover{background:#f1f1f1;border-color:#d6d6d6;}
  .avatar-upload .avatar-edit input + label:after{content:"\f040";font-family:'FontAwesome';color:#757575;position:absolute;top:0px;left:0;right:0;text-align:center;margin:auto;}
  .avatar-upload .avatar-preview{width:80px;height:80px;position:relative;border-radius:100%;border:6px solid #F8F8F8;box-shadow:0px 2px 4px 0px rgba(0, 0, 0, 0.1);}
  .avatar-upload .avatar-preview > div{width:100%;height:100%;border-radius:100%;background-size:cover;background-repeat:no-repeat;background-position:center;}
  /*! CSS Used fontfaces */
  @font-face{font-family:'FontAwesome';src:url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/fonts/fontawesome-webfont.eot?v=4.7.0');src:url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/fonts/fontawesome-webfont.eot#iefix&v=4.7.0') format('embedded-opentype'),url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/fonts/fontawesome-webfont.woff2?v=4.7.0') format('woff2'),url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/fonts/fontawesome-webfont.woff?v=4.7.0') format('woff'),url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/fonts/fontawesome-webfont.ttf?v=4.7.0') format('truetype'),url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/fonts/fontawesome-webfont.svg?v=4.7.0#fontawesomeregular') format('svg');font-weight:normal;font-style:normal;}
  .cross_btn{position: absolute;
    right: 26px;
    font-size: 18px;
    font-weight: bold;
    color: red;
    cursor: pointer;
    z-index: 10;}
</style>
@stop
@section('content')
<div class="container-fluid">
    <!-- Begin Page Header-->
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title">Edit Document</h2>
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="ti ti-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#">Documents</a></li>
                        <li class="breadcrumb-item active">Edit Document</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Header -->
    <div class="row flex-row">
        <div class="col-xl-12">
            <!-- Form -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4>Edit Document</h4>
                </div>
                <div class="widget-body">

                    <form class="needs-validation" novalidate=""   action="{{route('update_document_vendor',[$document->id])}}" autocomplete="off" method="post" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                           <div class="col-lg-6">
                               <label>Select User</label>
                               <select id="user_select" class="form-control selectpicker"  data-live-search="true" required="" onchange="show_info(this);" name="user_id">
                                 <option value="">Select User</option>
                                 @if(isset($users) and sizeof($users)>0)
                                 @foreach($users as $u)
                                 <option value="{{$u->id}}" user_name="{{$u->first_name}} {{$u->last_name}}" email="{{$u->email}}" phone="{{$u->phone}}" address="{{$u->address}}" v_address="{{$u->virtual_address}}" @if($u->id==$document->user_id) selected @endif>{{$u->first_name}} {{$u->last_name}}</option>
                                 @endforeach
                                 @endif
                               </select>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <p class="color_class"><strong>
                              User Information
                              <hr>
                            </strong>
                            <strong class="color_class">Name</strong> <span class="color_class" id="user_name">{{$document->user->first_name}} {{$document->user->last_name}}</span>
                            <br>
                            <strong class="color_class">Email</strong> <span class="color_class" id="email">{{$document->user->email}}</span>
                            <br>
                            <strong class="color_class">Phone</strong> <span class="color_class" id="phone">{{$document->user->phone}}</span>
                            <br>
                            <strong class="color_class">Document Delivery Address</strong> <span class="color_class" id="address">{{$document->user->address}}</span>
                            <br>
                            <strong class="color_class">Business Address</strong> <span class="color_class" id="v_address">{{$document->user->virtual_address}}</span>
                          </p>
                          </div>
                        </div>
                        <div id="append_docs">
                        <div class="row">
                           <div class="col-lg-6">
                               <label>Document Title</label>
                                <input type="text" name='titles[]' class="form-control" value="{{$document->title}}" required>
                            </div>
                            <div class="col-lg-6">
                               <label>Document File</label>
                                <input type="file" name='files[]' class="form-control">
                            </div>
                        </div>
                        </div>
                        <div class="text-right">
                          <br>
                            <button class="btn btn-gradient-01" type="submit">Update</button>
                            <!-- <button class="btn btn-shadow" type="reset">Reset</button> -->
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Form -->
        </div>
    </div>
    <!-- End Row -->
</div>


<div id="modal-large" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choose the location of vehicle</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">close</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <h4 style="margin-left:15px; font-weight:600;">Address:</h4>  <span id="m_address"></span>

              </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-shadow" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Confirm & Save</button>
            </div>
        </div>
    </div>
</div>

@stop
@section('footer_scripts')
<script>
  function show_info(e)
  {

   if($(e).val()!="")
   {
    $('#user_name').text($('#user_select option:selected').attr('user_name'));
    $('#email').text($('#user_select option:selected').attr('email'));
    $('#phone').text($('#user_select option:selected').attr('phone'));
    $('#address').text($('#user_select option:selected').attr('address'));
    $('#v_address').text($('#user_select option:selected').attr('v_address'));
   }
   else
   {
    $('#user_name').text('');
    $('#email').text('');
    $('#phone').text('');
    $('#address').text('');
    $('#v_address').text('');
   }
  }

  function add_more_documents()
  {
    $('#append_docs').append('<div class="row" style="margin-top:10px;"> <span class="cross_btn" onclick="remove_doc(this);">X</span><div class="col-lg-6"> <label>Document Title</label> <input type="text" name="titles[]"" class="form-control" required></div><div class="col-lg-6"> <label>Document File</label> <input type="file" name="files[]" class="form-control" required></div></div>');
  }
  function remove_doc(e)
  {
    $(e).parent('.row').remove();
  }

  // function show_preloader()
  // {
  //   alert();
  //   $('#preloader').css("display": "block","background": "#92808094");
  // }
</script>


@stop
