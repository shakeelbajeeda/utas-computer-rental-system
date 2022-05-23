@extends('layouts/vendor')
{{-- page level styles --}}
@section('header_styles')

@stop
<!--Start page content-->
@section('content')



<div class="container-fluid">
                        <!-- Begin Page Header-->
                        <div class="row">
                            <div class="page-header">
                                <div class="d-flex align-items-center">
                                    <h2 class="page-header-title">Order</h2>
                                    <div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{url('vendor/dashboard')}}"><i class="ti ti-home"></i></a></li>
                                            <li class="breadcrumb-item active">Send custom email to this customer</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Page Header -->
                        <div class="row flex-row">
                            <div class="col-lg-12 col-md-12">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            </div>
                            <div class="col-xl-12">
                                <div class="widget has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>Send Customer Email</h4>
                                    </div>
                                    <div class="widget-body">
                                        <form class="form-horizontal" action="{{route('post_email_to_customer')}}" method="post" enctype='multipart/form-data'>

                                         @csrf
                                         <input type="hidden" name="user_id" value="{{$user->id}}">
                                          <div class="form-group row d-flex align-items-center mb-5">
                            
                                                <div class="col-lg-6">
                                                    <label class="">Subject</label>
                                                    <input name="subject" type="text" class="form-control"required="">
                                                </div>
                                                <div class="col-lg-12">
                                                  <br>
                                                <label>Email Content</label>
                                                <textarea cols="12" rows="5" id="editor" name="description" required></textarea>
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
