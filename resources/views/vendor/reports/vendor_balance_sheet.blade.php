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
           .custom_style {
                border-radius: 10px;
    width: 100%;
    margin-top: 7px;
    height: 45px;
        }
    </style>


    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">Vendors Balance Sheet</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Vendors Balance Sheet</a></li>
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
                            <form id="report_form" action="#" method="get">
                              <div class="row" style="margin-bottom: 20px;">
                                <div class="col-md-4">
                                    <label>Start Date</label>
                                    <input type="date" name="start_date" class="form-control" required="" @if(request()->has('start_date')) value="{{request()->get('start_date')}}" @endif>
                                </div>
                                <div class="col-md-4">
                                    <label>End Date</label>
                                    <input type="date" name="end_date" class="form-control" required="" @if(request()->has('end_date')) value="{{request()->get('end_date')}}" @endif>
                                </div>
                                <div class="col-md-4">
                                    <br>
                                    @csrf
                                    <button type="submit" class="btn btn-primary custom_style" onclick="generate_report();">Generat Report</button>
                                </div>
                                <div class="col-md-8">
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    @if($is_download_able)
                                    <button type="submit" class="btn btn-primary custom_style pull-right" onclick="download_report();"><i class="la la-download"></i> Download Report</button>
                                    @endif
                                </div>
                              </div>
                            </form>
                            <div class="tab-pane active" id="active_packages">
                                <div class="table-responsive">
                                    <table id="" class="export-table table table-bordered mb-0">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>Date</th>
                                            <th>Vendor</th>
                                            <th>Account</th>
                                            <th> Type</th>
                                            <th>Amount</th>
                                            <th>Available Balance</th>
                                            <!-- <th>Reference Type</th> -->
                                            <th>Description</th>
                                            
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(isset($balance_sheets) and sizeof($balance_sheets) > 0):?>
                                        <?php foreach ($balance_sheets as $key => $p):?>
                                        <tr>
                                            <td>{{date('d-M-Y',strtotime($p->created_at))}}</td>
                                            <td>{{@$p->current_vendor->first_name}} {{@$p->current_vendor->last_name}}  ({{@$p->current_vendor->ref_no}})</td>
                                            <td>{{$p->account->account_title}}</td>
                                            <td>{{$p->type}}</td>
                                            <td>{{$p->amount}} PKR</td>
                                            <td>{{$p->total_balance}} PKR</td>
                                            <!-- <td>{{$p->ref_type}}</td> -->
                                            <td>{{$p->note}}</td>
                                            
                                            <td>
                                                @if($p->ref_type == "Bank")
                                                @elseif($p->ref_type=="Expense")
                                                @elseif($p->ref_type=="Order")
                                                <a href="{{route('order_detail_vendor',[$p->ref_id])}}">View Detail</a>
                                                @elseif($p->ref_type=="Package Renewal")
                                                <a href="{{route('renewal_orders')}}?id={{$p->ref_id}}">View Detail</a>
                                                @elseif($p->ref_type=="Vendor Payment")
                                                <a href="{{route('vendor_payments')}}?id={{$p->ref_id}}">View Detail</a>
                                                @endif
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                        @else
                                        <tr>
                                        <td style="text-align: center;" colspan="8">No record found</td>
                                        </tr>
                                        <?php endif ?>
                                        
                                        </tbody>
                                        
                                    </table>
                                    <center>
                                        {{$balance_sheets->links()}}
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
@section('footer_scripts')
    <!-- page level scripts -->

    <script type="text/javascript">

       function generate_report()
       {
        $('#report_form').attr('action','#');
        $('#report_form').attr('method','get');
       }
       function download_report()
       {
        $('#report_form').attr('action','{{route("download_vendors__sheet")}}');
        $('#report_form').attr('method','post');
        $('#report_form').submit();
       }

    </script>


@stop
