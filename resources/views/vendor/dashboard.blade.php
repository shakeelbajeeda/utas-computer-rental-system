@extends('layouts/vendor')

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
                            <div class="counter">Vendor Dashboard</div>
                            <br>
                            <div class="total-views">
                                
                            </div>
                        </div>
                    </div>
                    <div class="row flex-row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                <div class="widget widget-16 has-shadow">
                                    <div class="widget-body">
                                        <div class="row">
                                            <div class="col-xl-12 d-flex flex-column justify-content-center align-items-center">
                                                <br>
                                                <div class="counter">{{number_format($refunded_orders)}}</div>
                                                <div class="total-views">Total Order Refunded</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                <div class="widget widget-16 has-shadow">
                                    <div class="widget-body">
                                        <div class="row">
                                            <div class="col-xl-12 d-flex flex-column justify-content-center align-items-center">
                                                <br>
                                                <div class="counter">{{number_format($total_orders)}}</div>
                                                <div class="total-views">Total Order Served</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Begin Widget 16 -->
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                <div class="widget widget-16 has-shadow">
                                    <div class="widget-body">
                                        <div class="row">
                                            <div class="col-xl-12 d-flex flex-column justify-content-center align-items-center">
                                                <br>
                                                <div class="counter">{{number_format($pending_amount)}} PKR</div>
                                                <div class="total-views">Pending Amount</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Begin Widget 16 -->
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                <div class="widget widget-16 has-shadow">
                                    <div class="widget-body">
                                        <div class="row">
                                            <div class="col-xl-12 d-flex flex-column justify-content-center align-items-center">
                                                <br>
                                                <div class="counter">{{number_format($total_earnings)}} PKR</div>
                                                <div class="total-views">Total Sales</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Widget 16 -->
                        </div>
                </div>
            </div>
        </div>
  </div>
</div>
@stop

