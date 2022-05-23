@extends('layouts.supper_admin')
{{-- page level styles --}}

@section('content')

<div class="container-fluid">
<!-- Begin Page Header-->
<div class="row">
<div class="page-header">
<div class="d-flex align-items-center">
<h2 class="page-header-title">Settings</h2>
<div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="{{route('supper_admin_dashboard')}}"><i class="ti ti-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{route('supper_admin_dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item active">Settings</li>
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
<h4>Update Settings</h4>
</div>
<div class="widget-body">
 @if(isset($settings) and sizeof($settings)>0)
<form id="i_form" action="{{route('update_settings')}}" method="post" enctype='multipart/form-data'>

@csrf
<div class="form-group row d-flex align-items-center">
@foreach($settings as $s)
<div class="col-lg-6">
  <br>
 <label>{{$s->name}}</label>
<input name="{{$s->type}}" type="text" class="form-control" value="{{$s->value}}" required="">
</div>
@endforeach
</div>
<div class="em-separator separator-dashed"></div>
<div class="text-right">
<button class="btn btn-gradient-01" type="submit">Update Settings</button>
<!-- <button class="btn btn-shadow" type="reset">Cancel</button> -->
</div>
</form>
@else
<h4>No Settings found</h4>
@endif
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
