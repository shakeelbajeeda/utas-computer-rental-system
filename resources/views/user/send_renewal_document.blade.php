@extends('layouts.user_dashboard')
{{-- page level styles --}}

@section('content')

<div class="container-fluid">
<!-- Begin Page Header-->
<div class="row">
<div class="page-header">
<div class="d-flex align-items-center">
<h2 class="page-header-title">Upload Package Renewal Payment Proofs</h2>
<div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="ti ti-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item active">Upload Package Renewal Payment Proofs</li>
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
<h4>Upload Package Renewal Payment Proofs</h4>
</div>
<div class="widget-body">
<p> <strong>Service Title: </strong>{{$renewal->order_item->title}} @if(isset($renewal->order_item->sub_service_title) and $renewal->order_item->sub_service_title !="") ({{$renewal->order_item->sub_service_title}}) @endif</p>
<p><strong>Price</strong> {{$renewal->price}} PKR</p>
<form id="i_form" action="{{route('save_renewal_docs')}}" method="post" enctype='multipart/form-data'>
    <input type="hidden" name="renewal_id" value="{{$renewal->id}}">
@csrf
<div class="form-group row d-flex align-items-center">
<div class="col-lg-6">
 <label>Enter Your Name</label>
<input name="name" type="text" class="form-control custom_required" placeholder="eg. Yasir Ch" required="">
</div>
<div class="col-lg-6">
 <label>Paid Amount</label>
<input name="amount" type="text" class="form-control custom_required" placeholder="eg. 2500" required="">
</div>
<div class="col-lg-6">
    <br>
<label>Transaction Date</label>
<input name="date"  type="date" class="form-control" value="" required="">
</div>
<div class="col-lg-6">
    <br>
<label>Attach Payment Receipt</label>
<input name="file"  type="file" class="form-control" required="">
</div>
<div class="col-lg-12">
  <br>
<label>Note (Optional)</label>
<textarea cols="12" rows="5" class="form-control" name="note"></textarea>
</div>
</div>
<div class="em-separator separator-dashed"></div>
<div class="text-right">
<button class="btn btn-gradient-01" type="submit">Submit</button>
<!-- <button class="btn btn-shadow" type="reset">Cancel</button> -->
</div>
</form>
</div>
</div>
</div>
</div>
<!-- End Row -->
</div>


@stop

@section('footer_scripts')
<!-- page level scripts -->
<script src="{{ asset('public/public/assets/ckeditor/ckeditor.js') }}"></script>
<script>
function toggle_expire_after(argument) {
 if($(argument).val()==1) {
  $('#expire_after').show();
 }
 else {
  $('#expire_after').hide();
 }
}

 $(document).ready(function () {
            var editor = CKEDITOR.replace( 'editor', {
                startupFocus : true
            });
            editor.on('change',function(){
                $(s).change();
                editor.updateElement();
            });
        });
</script>
@stop
