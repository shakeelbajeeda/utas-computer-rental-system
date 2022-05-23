@extends('layouts/supper_admin')
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
                    <h2 class="page-header-title">Payment Proof</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">View Order Payment Proof</a></li>
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
                                <h4>Order ID <strong> {{$order->ref_no}} </strong></h4>
                                <div class="table-responsive">
                                    <table id="" class="export-table table table-bordered mb-0">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>Depositor </th>
                                            <th>Price</th>
                                            <th>Bank Receipt</th>
                                            <th>Transaction Date</th>
                                            <th>Proof Uploaded Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(isset($payment_proofs) and sizeof($payment_proofs) > 0):?>
                                        <?php foreach ($payment_proofs as $key => $p):?>
                                        <tr>
                                            <td>{{$p->name}}</td>
                                            <td>{{$p->amount}} PKR</td>
                                            <td><a href="{{asset('public/images/payment_proofs')}}/{{$p->file}}" download>Download Receipt</a></td>
                                            <td>{{date('d-M-Y',strtotime($p->date))}}</td>
                                            <td>{{date('d-M-Y',strtotime($p->created_at))}}</td>
                                        </tr>
                                        <?php endforeach ?>
                                        @else
                                        <tr>
                                        <td style="text-align: center;" colspan="5">No record found</td>
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
    </div>

@stop

