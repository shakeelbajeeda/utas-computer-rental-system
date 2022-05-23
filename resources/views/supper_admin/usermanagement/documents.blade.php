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
                    <h2 class="page-header-title">Documents</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">View All Documents</a></li>
                            <!-- <li class="breadcrumb-item active">Pending</li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row flex-row">
            <div class="col-xl-12">

                <div class="card">

                    <div class="card-header" {{Route::currentRouteName() }}>

                        <form action="{{Route(Route::currentRouteName())}}" method="post">

                            @csrf
                            <div class="row">


                                {{--<div class="col-md-3">--}}
                                {{--<select name="payment_status" class="form-control" id="payment_status">--}}

                                {{--<option value="1">All</option>--}}
                                {{--<option value="2">Paid</option>--}}
                                {{--<option value="3">UnPaid</option>--}}
                                {{--</select>--}}
                                {{--</div>--}}


                                {{--<div class="col-md-3">--}}
                                    {{--<input type="text" class="form-control" name="CustomerID"--}}
                                           {{--placeholder="Customer ID"--}}
                                           {{--@if(isset($_POST['CustomerID'])) value="{{$_POST['CustomerID']}}" @endif>--}}
                                {{--</div>--}}


                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="CustomerName"
                                           placeholder="Customer Name"
                                           @if(isset($_POST['CustomerName'])) value="{{$_POST['CustomerName']}}" @endif>
                                </div>

                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="DocumentTitle"
                                           placeholder="DocumentTitle"
                                           @if(isset($_POST['DocumentTitle'])) value="{{$_POST['DocumentTitle']}}" @endif>
                                </div>

                                <button type="submit" class="btn btn-primary"> Search</button>

                                <a href="{{Route('view_documents')}}" class="btn btn-danger"> Reset </a>



                            </div>

                        </form>


                    </div>

                </div>



                <!-- Form -->
                <div class="widget has-shadow">
                    <div class="widget-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="active_packages">
                                <div class="table-responsive">
                                    <table id="" class="export-table table table-bordered mb-0">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>Customer</th>
                                            <th>Document Title</th>
                                            <th>Date</th>
                                            <th>Download Document</th>
                                            <th>Created By</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(isset($documents) and sizeof($documents) > 0):?>
                                        <?php foreach ($documents as $key => $p):?>
                                        <tr>
                                            <td>{{$p->user->first_name}} {{$p->user->last_name}} ({{
                                            $p->user->ref_no
                                            }})</td>
                                            <td>{{$p->title}}</td>
                                            <td>{{date('M-d-Y',strtotime($p->created_at))}}</td>
                                            <td>
                                                <a href="{{asset('public/images/document_files')}}/{{$p->file}}" download>
                                                    <button class="btn btn-primary">
                                                   Download
                                               </button>
                                                </a>
                                            </td>
                                            <td>{{$p->createdBy->first_name}} {{$p->createdBy->last_name}} ({{$p->createdBy->ref_no}})</td>
                                            <td>
                                                <a href="{{route('edit_document',[$p->id])}}"><i class="la la-edit edit" title="Edit Document"></i></a>
                                               <a href="javascript:void(0);" id="{{$p->id}}" onclick="delete_item(this);"><i class="la la-close delete" title="Delete Document"></i></a>
                                            </td>
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
                                        {{$documents->links()}}
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
        function add_class_active(e) {
            $('.remove_active').removeClass('active');
            if($(e).attr('id')=="active")
            {
                $('#expired_packages').hide();
                $('#active_packages').show();
            }
            else
            {
                $('#active_packages').hide();
                $('#expired_packages').show();
                
            }
            $(e).addClass('active');
        }

        function delete_item(e) {
            var data =
                {
                    'table': 'documents',
                    'id': $(e).attr('id'),
                    '_token': '{{csrf_token()}}'
                }
            swal({
                title: "Are you sure?",
                text: "Are you really want to remove this Document?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                confirmButtonClass: 'btn btn-success',
                cancel: true,
                buttonsStyling: false
            }).then((result) => {
                if (result) {
                    generalAjax(data, '{{route("general_delete")}}', function (res) {
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
                                    window.location.reload();
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

    <!-- <script src="{{asset('public/assets/vendors/js/datatables/datatables.min.js') }}"></script> -->
    <!-- <script src="{{asset('public/assets/vendors/js/datatables/dataTables.buttons.min.js') }}"></script> -->
    <!-- <script src="{{asset('public/assets/vendors/js/datatables/jszip.min.js') }}"></script> -->
    <!-- <script src="{{asset('public/assets/vendors/js/datatables/buttons.html5.min.js') }}"></script> -->
    <!-- <script src="{{asset('public/assets/vendors/js/datatables/pdfmake.min.js') }}"></script> -->
    <!-- <script src="{{asset('public/assets/vendors/js/datatables/vfs_fonts.js') }}"></script> -->
    <!-- <script src="{{asset('public/assets/vendors/js/datatables/buttons.print.min.js') }}"></script> -->
    <!-- <script src="{{asset('public/assets/js/components/tables/tables.js') }}"></script> -->
    <!-- <script src="{{ asset('public/assets/vendors/js/datepicker/daterangepicker.js') }}"></script> -->
    <!-- <script src="{{ asset('public/assets/js/components/datepicker/datepicker.js') }}"></script> -->

@stop
