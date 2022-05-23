@extends('layouts/user')

<!--Start page content-->
@section('content')
<?php
use Carbon\Carbon;
 ?>
<style type="text/css">
    .widget-16 .counter {
    color: #2c304d;
    font-size: 1.6rem;
}
</style>
<div class="container-fluid pt-24">
    <!-- Begin Page Header-->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="widget widget-16 has-shadow">
                <div class="widget-body">
                    <div class="row">
                        <div class="col-xl-12 d-flex flex-column justify-content-center align-items-center">
                            <div class="counter">Admin Dashboard</div>
                            <br>
                            <div class="total-views">

                            </div>
                        </div>
                    </div>
                    <div class="row flex-row">
                            <!-- Begin Facebook -->
                            <div class="col-xl-4 col-md-6 col-sm-6">
                                <div class="widget widget-12 has-shadow">
                                    <div class="widget-body">
                                        <div class="media">
                                            <div class="align-self-center ml-5 mr-5">
                                                <i class="la la-user"></i>
                                            </div>
                                            <div class="media-body align-self-center">
                                                <div class="title text-facebook"> Customers</div>
                                                <div class="number">0</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Facebook -->
                            <!-- Begin Twitter -->
                            <div class="col-xl-4 col-md-6 col-sm-6">
                                <div class="widget widget-12 has-shadow">
                                    <div class="widget-body">
                                        <div class="media">
                                            <div class="align-self-center ml-5 mr-5">
                                                <i class="la la-user"></i>
                                            </div>
                                            <div class="media-body align-self-center">
                                                <div class="title text-twitter">Computers</div>
                                                <div class="number">0</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Twitter -->
                            <!-- Begin Linkedin -->
                            <div class="col-xl-4 col-md-6 col-sm-6">
                                <div class="widget widget-12 has-shadow">
                                    <div class="widget-body">
                                        <div class="media">
                                            <div class="align-self-center ml-5 mr-5">
                                                <i class="la la-star"></i>
                                            </div>
                                            <div class="media-body align-self-center">
                                                <div class="title text-linkedin">Keyboards</div>
                                                <div class="number">0</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Linkedin -->
                    </div>
                </div>
            </div>
        </div>
  </div>
</div>
@stop

