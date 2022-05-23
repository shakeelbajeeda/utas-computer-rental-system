@extends('layouts/supper_admin')
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
                                    <h2 class="page-header-title">User Management</h2>
                                    <div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{route('supper_admin_dashboard')}}"><i class="ti ti-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="{{route('supper_admin_dashboard')}}">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Profile</li>
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
                                        <h4>{{$title}}</h4>
                                    </div>
                                    <div class="widget-body">
                                        @if(isset($user->id))
                                        <form class="form-horizontal" action="{{route('users.update',[$user])}}" method="post" enctype='multipart/form-data'>
                                            @method('put')
                                        @else
                                        <form class="form-horizontal" action="{{route('users.store')}}" method="post" enctype='multipart/form-data'>
                                        @endif
                                        

                                         @csrf

                                          <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">First Name</label>
                                                <div class="col-lg-6">
                                                    <input name="first_name" type="text" class="form-control" value="{{$user->first_name}}" required="">
                                                </div>
                                            </div>
                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Last Name</label>
                                                <div class="col-lg-6">
                                                    <input name="last_name" type="text" class="form-control" value="{{$user->last_name}}" required="">
                                                </div>
                                            </div>
                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">User Type</label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" name="is_admin">
    <option value="1" @if($user->is_admin==1) selected @endif>Admin</option>
    <option value="9" @if($user->is_admin==1 and $user->is_user_approved == 9) selected @endif>Admin (Data Entry User)</option>
    <option value="2" @if($user->is_admin==2) selected @endif>Vendor</option>
    <option value="0" @if($user->is_admin==0) selected @endif>Customer</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Email</label>
                                                <div class="col-lg-6">
                                                    <input name="email" type="Email" class="form-control" value="{{$user->email}}" required="">
                                                </div>
                                            </div>
                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">  Password </label>
                                                <div class="col-lg-6">
                                                    <input name="password" type="Password" class="form-control" value=""  @if(!isset($user->id)) required="" @endif>
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

@stop
