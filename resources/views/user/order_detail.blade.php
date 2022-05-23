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
                    <h2 class="page-header-title">My Orders</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">View Order Detail</a></li>
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
                                        @if(isset($order_items) and sizeof($order_items)>0)
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="custom_card">
                                                    <p><strong>Order ID: </strong> {{$order->ref_no}}</p>
                                                      <p><strong>Subtotal: </strong>{{$order->subtotal}}</p>
                                                       <p><strong>Coupon Discount: </strong>{{$order->coupon_discount}}</p>
                                                      <p><strong>Total Order Price: </strong>{{$order->total}} PKR</p>
                                                </div>
                                            </div>
                                            <p><strong> Order Items </strong></p>
                                            @foreach($order_items as $p)
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="custom_card">
                                                    <p><strong>Service: </strong> {{$p->title}}  @if(isset($p->sub_service_title) and $p->sub_service_title != "") ({{$p->sub_service_title}}) @endif</p>
                                                      <p><strong>Subscription: </strong>{{$p->package}}</p>
                                                       <p><strong>Expiry: </strong>{{$p->expire_at}}</p>
                                                      <p><strong>Price: </strong>{{$p->price}} PKR</p>
                                                 <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a  class="dropdown-item" href="{{route('order_detail_admin',[$p->id])}}">View Service Renewals</a>
                                                <a  class="dropdown-item" href="{{route('view_payment_proofs',[$p->id])}}">Send Renewl Request</a>
                                                <a id="{{$p->id}}" status="Paid" status_2="mark as paid"  class="dropdown-item" href="javascript:" onclick="update_status(this);">Upload Renewal Payment Proofs</a>
                                            </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            <div class="col-sm-12 col-xs-12">
                                                <center>
                                                {{$order_items->links()}}
                                            </center>
                                            </div>
                                            @else
                                            <p>No Order Found</p>
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
                                <h4>Order ID <strong> {{$order->ref_no}} </strong></h4>
                                <div class="table-responsive">
                                    <table id="" class="export-table table table-bordered mb-0">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>Service Title</th>
                                            <th>Subscription</th>
                                            <th>Expiry</th>
                                            <th>Order Date</th>
                                            <th>Price</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(isset($order_items) and sizeof($order_items) > 0):?>
                                        <?php foreach ($order_items as $key => $p):?>
                                        <tr>
                                            <td>{{$p->title}}</td>
                                            <td>{{$p->package}}</td>
                                             <td>{{$p->expire_at}}</td>
                                            
                                            <td>{{date('M-d-Y',strtotime($p->created_at))}}</td>
                                            <td>{{$p->price}} PKR</td>
                                            <td>
                                                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a id="{{$p->id}}"  class="dropdown-item" href="{{route('view_service_renwals',[$p->id])}}">View Service Renewals</a>
                                                <a id="{{$p->id}}"   class="dropdown-item" href="javascript:" onclick="send_renewal_request(this);">Send Renewal Request</a>
                                                <a id="{{$p->id}}" status="Paid" status_2="mark as paid"  class="dropdown-item" href="{{route('upload_renewal_documents',[$p->id])}}">Upload Renewal Payment Proofs</a>
                                            </div>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
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
@section('footer_scripts')
    <!-- page level scripts -->

    <script type="text/javascript">

        function send_renewal_request(e) {
            var data =
                {
                    'id': $(e).attr('id'),
                    '_token': '{{csrf_token()}}'
                }
            swal({
                title: "Are you sure?",
                text: "Are you really want to send renewal request to Admin?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                confirmButtonClass: 'btn btn-success',
                cancel: true,
                buttonsStyling: false
            }).then((result) => {
                if (result) {
                    generalAjax(data, '{{route("send_renewal_request")}}', function (res) {
                        if (res.status) {
                            swal({
                                title: 'Congrats!',
                                icon: "success",
                                text: res.response,
                                type: 'confirm',
                                confirmButtonClass: "btn btn-success",
                                buttonsStyling: true
                            }).then((result) => {
                                if (result) {
                                    // window.location.reload();
                                }
                            });
                        } else {
                            swal({
                                title: 'Error!',
                                text: res.response,
                                type: 'error',
                                confirmButtonClass: "btn btn-danger",
                                buttonsStyling: false
                            })
                        }

                    });

                }
            }).catch(swal.noop);


        }

    </script>


@stop


