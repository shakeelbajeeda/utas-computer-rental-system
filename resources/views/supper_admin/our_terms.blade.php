@extends('layouts.supper_admin')
{{-- page level styles --}}
@section('header_styles')

@stop
<!--Start page content-->
@section('content')

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
                    <h2 class="page-header-title">Our Terms & Conditions</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Sign Terms & Conditions</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        @include('terms') 

</div>

@stop
