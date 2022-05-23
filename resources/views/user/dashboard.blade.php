@extends('layouts/user_dashboard')

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
			        		User Dashboard
			        	</div>
			            <div class="col-xl-12 d-flex flex-column justify-content-center align-items-center">
			            	@if(auth()->user()->is_address_assign)
			                <div class="counter">My Business Address</div>
			                <div class="total-views">
			                	{{auth()->user()->virtual_address}}
			                </div>
			                @endif
			            </div>
			        </div>
			        <div class="row flex-row" style="margin-top:20px;">
                            <!-- Begin Facebook -->
                            <div class="col-xl-4 col-md-6 col-sm-6">
                                <div class="widget widget-12 has-shadow">
                                    <div class="widget-body">
                                        <div class="media">
                                            <div class="align-self-center ml-5 mr-5">
                                                <i class="la la-star"></i>
                                            </div>
                                            <div class="media-body align-self-center">
                                                <div class="title text-facebook"> Unpaid Orders</div>
                                                <div class="number">{{$unpaid_orders}}</div>
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
                                                <i class="la la-star"></i>
                                            </div>
                                            <div class="media-body align-self-center">
                                                <div class="title text-twitter">Paid Orders</div>
                                                <div class="number">{{$paid_orders}}</div>
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
                                                <div class="title text-linkedin">Completed Orders</div>
                                                <div class="number">{{$completed_orders}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Linkedin -->
                    </div>
                    <div class="row flex-row">
                        <!-- Begin Widget 16 -->
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                <div class="widget widget-16 has-shadow">
                                    <div class="widget-body">
                                        <div class="row">
                                            <div class="col-xl-12 d-flex flex-column justify-content-center align-items-center">
                                                <br>
                                                <div class="counter">{{$renewed_orders}}</div>
                                                <div class="total-views">Renewed Orders </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Widget 16 -->
                            <!-- Begin Widget 16 -->
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                                <div class="widget widget-16 has-shadow">
                                    <div class="widget-body">
                                        <div class="row">
                                            <div class="col-xl-12 d-flex flex-column justify-content-center align-items-center">
                                                <br>
                                                <div class="counter">{{number_format($total_spendings)}} PKR</div>
                                                <div class="total-views">Total Spendings</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Widget 16 -->
                            <!-- End Widget 16 -->
                        </div>
			    </div>
			</div>
		</div>
  </div>
</div>
@stop

