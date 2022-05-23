@extends('layouts.supper_admin')
{{-- page level styles --}}

@section('content')

<div class="container-fluid">
<!-- Begin Page Header-->
<div class="row">
<div class="page-header">
<div class="d-flex align-items-center">
<h2 class="page-header-title">Send payment to vendor</h2>
<div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="{{route('supper_admin_dashboard')}}"><i class="ti ti-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{route('supper_admin_dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item active">Send payment to vendor</li>
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
<h4>Send payment to vendor</h4>
</div>
<div class="widget-body">
<form id="i_form" action="{{route('vendors-payments.store')}}" method="post" enctype='multipart/form-data'>

@csrf
<div class="form-group row d-flex align-items-center">

<div class="col-xl-6 col-lg-6 col-md-6">
<label class="form-control-label">Select Vendor<span class="text-danger ml-2">*</span></label>
<select class=" form-control selectpicker show-menu-arrow" name="vendor_id"  data-live-search="true" required="">
<option value="">Select Vendor</option>
<?php if(isset($vendors) and sizeof($vendors)>0):?>
<?php foreach($vendors as $v):?>
<option value="<?=$v->id?>"><?=$v->first_name?> {{$v->last_name}} | {{$v->email}}   | {{$v->vendor_amount}} PKR</option>
<?php endforeach;
else: ?>
<option value="">No Vendor Found</option>
<?php endif ?>

</select>
</div>
<div class="col-xl-6 col-lg-6 col-md-6">
<label class="form-control-label">Select Account<span class="text-danger ml-2">*</span></label>
<select class=" form-control show-menu-arrow" name="account_id" required="">
<option value="">Select Account</option>
<?php if(isset($banks) and sizeof($banks)>0):?>
<?php foreach($banks as $v):?>
<option value="<?=$v->id?>">{{$v->account_title}}</option>
<?php endforeach;
else: ?>
<option value="">No Account Found</option>
<?php endif ?>

</select>
</div>
<div class="col-lg-6">
<label>Amount <span class="text-danger ml-2">*</span></label>
<input name="amount"  type="text" class="form-control" required="">
</div>
<div class="col-lg-6">
  <br>
<label>Payment Receipt Image (Optional)</label>
<input name="file" type="file" class="form-control custom_required">
</div>

<div class="col-lg-12">
  <br>
<label>Note<span class="text-danger ml-2">*</span></label>
<textarea cols="12" rows="5" class="form-control" name="note" required=""></textarea>
</div>

</div>
<div class="em-separator separator-dashed"></div>
<div class="text-right">
<button class="btn btn-gradient-01" type="submit">Send</button>
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
