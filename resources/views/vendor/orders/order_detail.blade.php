@extends('layouts/vendor')
{{-- page level styles --}}
@section('header_styles')
    <style type="text/css">/* Chart.js */
        @-webkit-keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }
            to {
                opacity: 1
            }
        }

        @keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }
            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            -webkit-animation: chartjs-render-animation 0.001s;
            animation:         chartjs-render-animation 0.001s;
        }
    </style>

    <!-- Add Page Styles here -->
@stop
<!--Start page content-->
@section('content')

    <style type="text/css">
        .count_design {
            width:         32px;
            height:        32px;
            background:    #2ca8ff;
            background:    2 ca8ff;
            color:         white;
            /* background: #a7800cb3; */
            border-radius: 100%;
            text-align:    center;
            padding:       6px;
        }
    </style>


    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">Orders</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('vendor/dashboard')}}"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">View Order Detail</a></li>
                            <!-- <li class="breadcrumb-item active">Pending</li> -->
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
                    <div class="widget-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="active_packages">
                            <h4>
                               <strong>  Order ID  </strong>{{$order->ref_no}}
                            </h4>
                                <div class="table-responsive">
                                    <table id="" class="export-table table table-bordered mb-0">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>Service Title</th>
                                             <th>Subscription</th>
                                            <th>Expiry</th>
                                            <th>Vendor</th>
                                            <th>Purchase Price</th>
                                            <th>Retail Price</th>
                                            <th>Date</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php if(isset($order_items) and sizeof($order_items) > 0):?>
                                        <?php foreach ($order_items as $key => $p):?>
                                        <tr>
                                            <td>{{$p->title}}</td>
                                            <td>{{$p->package}}</td>
                                             <td>{{$p->expire_at}}</td>
                                            <td>{{@$p->vendor->first_name}} {{@$p->vendor->last_name}}</td>
                                            <td>{{$p->vendor_price}} PKR</td>
                                            <td>{{$p->price}} PKR</td>
                                            <td>{{date('M-d-Y',strtotime($p->created_at))}}</td>
                                        </tr>
                                        <?php endforeach ?>
                                        @else
                                        <tr>
                                        <td style="text-align: center;" colspan="5">No record found</td>
                                        </tr>
                                        <?php endif ?>
                                        
                                        </tbody>
                                        
                                    </table>
                                    <center>
                                        {{$order_items->links()}}
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Row -->
            </div>
        </div>
    </div>

@stop

