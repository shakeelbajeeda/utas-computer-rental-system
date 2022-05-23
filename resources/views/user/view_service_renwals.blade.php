@extends('layouts/user_dashboard')
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
        .custom_card {
            box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
            padding: 10px;
            border-radius: 10px;
            margin-top:10px;
            margin-bottom: 10px;
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
                    <h2 class="page-header-title">View Service Renewals</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">View All Renewals</a></li>
                            <!-- <li class="breadcrumb-item active">Pending</li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        @if($is_mobile)
        <div class="row flex-row">
            <div class="col-xl-12">
                <!-- Form -->
                <div class="widget has-shadow">
                    <div class="widget-body">
                        <div class="tab-content">
                            <div class="row">
                                @if(isset($renewals) and sizeof($renewals)>0)
                                    @foreach($renewals as $p)
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="custom_card">
                                            <p> <strong>Service Title: </strong>{{$p->order_item->title}} @if(isset($p->order_item->sub_service_title) and $p->order_item->sub_service_title !="") ({{$p->order_item->sub_service_title}}) @endif</p>
                                            <p><strong>Price: </strong>{{$p->price}} PKR</p>
                                            <p><strong>Status: </strong>{{$p->status}}</p>
                                            <p><strong>Date: </strong>{{date('M-d-Y',strtotime($p->created_at))}}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="col-sm-12 col-xs-12">
                                    </div>
                                    @else
                                    <p>No Renewal Found</p>
                                @endif
                            </div>
                    </div>
                </div>
                <!-- End Row -->
            </div>
        </div>
    </div>
        @else
        <div class="row flex-row">
            <div class="col-xl-12">
                <!-- Form -->
                <div class="widget has-shadow">
                    <div class="widget-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="active_packages">
                                <div class="table-responsive">
                                    <table id="" class="export-table table table-bordered mb-0">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>Service Title</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(isset($renewals) and sizeof($renewals) > 0):?>
                                        <?php foreach ($renewals as $key => $p):?>
                                        <tr>
                                            <td>{{$p->order_item->title}} @if(isset($p->order_item->sub_service_title) and $p->order_item->sub_service_title !="") ({{$p->order_item->sub_service_title}}) @endif</td>
                                            <td>{{$p->price}} PKR</td>
                                            <td>{{$p->status}}</td>
                                            <td>{{date('M-d-Y',strtotime($p->created_at))}}</td>
                                        </tr>
                                        <?php endforeach ?>
                                        @else
                                        <tr>
                                        <td style="text-align: center;" colspan="8">No record found</td>
                                        </tr>
                                        <?php endif ?>
                                        
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Row -->
            </div>
        </div>
        @endif
    </div>

@stop

