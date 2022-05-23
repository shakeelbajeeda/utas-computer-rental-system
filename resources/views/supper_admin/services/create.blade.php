@extends('layouts.supper_admin')
{{-- page level styles --}}

@section('content')
    <link rel="stylesheet" href="{{asset('public/angvo/assets/css/multiselect.css')}}">
    <style>
        .ms-options-wrap > .ms-options > ul input[type="checkbox"] {
            margin-right: 5px;
            position: absolute;
            left: 4px;
            top: 11px;
        }

        #add_sub_service_btn {
            float: right;
            display: none;
        }

        .appended_row {
            background: #2c304d2e;
            border-radius: 10px;
            padding-bottom: 18px;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .remove_btn {
            float: right;
            color: red;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
        }

        @if($service->is_one_time_payment==1)
  .one_time_payment {
            display: block;
        }

        .hideable_div {
            display: none;
        }

        ;
        #add_sub_service_btn {
            display: none;
        }

        #append_div {
            display: none;
        }

        #add_sub_service_btn {
            display: none;
        }

        .is_sub_service {
            display: none;
        }

        @else
  .one_time_payment {
            display: none;
        }

        @if(isset($service->sub_services) and sizeof($service->sub_services))
   .hideable_div {
            display: none;
        }

        ;
        #add_sub_service_btn {
            display: block;
        }

        #append_div {
            display: block;
        }

        #add_sub_service_btn {
            display: block;
        }

        @else
  .hideable_div {
            display: block;
        }

        ;
        #add_sub_service_btn {
            display: none;
        }

        #append_div {
            display: none;
        }

        #add_sub_service_btn {
            display: none;
        }
        @endif
        @endif
    </style>
    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">@if(isset($service->id) and $service->id >0) Edit @else Add New @endif
                        Service</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('supper_admin_dashboard')}}"><i
                                            class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('supper_admin_dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">@if(isset($service->id) and $service->id >0) Edit @else
                                    Add New @endif Service
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row flex-row">

            <div class="col-xl-12">
                <div class="widget has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center">
                        <h4>@if(isset($service->id) and $service->id >0) Edit @else Add New @endif Service
                        </h4>
                    </div>
                    <div class="widget-body">
                        <p style="color: red;">
                            Note: All prices must be in USD
                        </p>
                        @if(isset($service->id) and $service->id >0)
                            <form id="i_form" action="{{route('update_service',[$service->id])}}" method="post">
                                @else
                                    <form id="i_form" action="{{route('services.store')}}" method="post"
                                          enctype='multipart/form-data'>
                                        @endif

                                        @csrf
                                        <div class="form-group row d-flex align-items-center">

                                            <div class="col-lg-6">
                                                <label>Title</label>
                                                <input name="title" type="text" class="form-control custom_required"
                                                       value="{{$service->title}}" required="">
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Icon Link</label>
                                                <input name="icon" type="text" class="form-control"
                                                       value="{{$service->icon}}" required="">
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Order At</label>
                                                <input name="order_at" type="number" class="form-control"
                                                       value="{{$service->order_at}}" required="">
                                            </div>
                                            <div class="col-lg-6">
                                                <br>
                                                <label>Purchase Price (Vendor Price)</label>
                                                <input name="vendor_price" type="text"
                                                       class="form-control custom_required"
                                                       value="{{$service->vendor_price}}">
                                            </div>
                                            <div class="col-lg-6">
                                                <br>
                                                <label>Select Vendor</label>
                                                <select class="form-control" id="multiple_select" multiple
                                                        name="vendor_ids[]">
                                                    @if(isset($vendors) and sizeof($vendors)>0)
                                                        @foreach($vendors as $v)
                                                            <option value="{{$v->id}}"
                                                                    @if($v->is_selected == $v->id) selected @endif>{{$v->first_name.' '. $v->last_name}}</option>
                                                        @endforeach
                                                    @else
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="col-lg-6 one_time_payment">
                                                <br>
                                                <label>Price (For one time payment)</label>
                                                <input name="price" type="text" class="form-control custom_required"
                                                       value="{{$service->price}}">
                                            </div>
                                            <div class="col-md-12">
                                                <br>
                                                <div class="custom-control custom-checkbox styled-checkbox">
                                                    <input class="custom-control-input" type="checkbox"
                                                           name="is_one_time_payment" id="is_one_time_payment" value="1"
                                                           onclick="one_time_payment(this);"
                                                           @if($service->is_one_time_payment==1) checked @endif>
                                                    <label class="custom-control-descfeedback"
                                                           for="is_one_time_payment">Is One Time Payment?</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">

                                                <br>
                                                <div class="custom-control custom-checkbox styled-checkbox is_sub_service">
                                                    <input class="custom-control-input" type="checkbox"
                                                           name="is_sub_service" id="is_sub_service" value="1"
                                                           onclick="show_sub_service(this);"
                                                           @if($service->is_sub_service==1) checked @endif>
                                                    <label class="custom-control-descfeedback" for="is_sub_service">Add
                                                        Sub Services?</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <button id="add_sub_service_btn" class="btn btn-gradient-01"
                                                        type="button" onclick="append_sub_service();"><i
                                                            class="la la-plus"></i> Add Sub Service
                                                </button>
                                            </div>
                                            <!-- for one months -->
                                            <div class="col-lg-12 col-md-12" id="append_div">
                                                @if(isset($service->sub_services) and sizeof($service->sub_services))
                                                    @foreach($service->sub_services as $sub)
                                                        <div class="row appended_row">
                                                            <div class="col-lg-12"><span class="remove_btn"
                                                                                         onclick="remove_sub_service(this);">X</span>
                                                                <br> <label>Sub Service Title</label> <input
                                                                        name="titles[]" type="text" class="form-control"
                                                                        value="{{$sub->title}}" required=""></div>
                                                            <div class="col-lg-4"><br> <label>One Month Price</label>
                                                                <input name="one_month_prices[]"
                                                                       value="{{$sub->one_month_price}}" type="text"
                                                                       class="form-control"></div>
                                                            <div class="col-lg-4"><br> <label>One Month Vendor
                                                                    Price</label> <input
                                                                        name="one_month_vendor_prices[]"
                                                                        value="{{$sub->one_month_vendor_price}}"
                                                                        type="text" class="form-control"></div>
                                                            <div class="col-lg-4"><br> <label>One Month Discount % (Only
                                                                    Numbers)</label> <input name="one_month_discounts[]"
                                                                                            value="{{$sub->one_month_discount}}"
                                                                                            required type="text"
                                                                                            class="form-control"></div>
                                                            <div class="col-lg-4"><br> <label>Six Months Price</label>
                                                                <input name="six_month_prices[]"
                                                                       value="{{$sub->six_month_price}}" type="text"
                                                                       class="form-control"></div>
                                                            <div class="col-lg-4"><br> <label>Six Months Vendor
                                                                    Price</label> <input
                                                                        name="six_month_vendor_prices[]"
                                                                        value="{{$sub->six_month_vendor_price}}"
                                                                        type="text" class="form-control"></div>
                                                            <div class="col-lg-4"><br> <label>Six Months Discount %
                                                                    (Only Numbers)</label> <input
                                                                        name="six_month_discounts[]"
                                                                        value="{{$sub->six_month_discount}}" required
                                                                        type="text" class="form-control"></div>
                                                            <div class="col-lg-4">

                                                                <br> <label>Twelve Months
                                                                    Price</label> <input name="twelve_month_prices[]"
                                                                                         value="{{$sub->twelve_month_price}}"
                                                                                         type="text"
                                                                                         class="form-control"></div>
                                                            <div class="col-lg-4"><br> <label>Twelve Months Vendor
                                                                    Price</label> <input
                                                                        name="twelve_month_vendor_prices[]"
                                                                        value="{{$sub->twelve_month_vendor_price}}"
                                                                        type="text" class="form-control"></div>
                                                            <div class="col-lg-4"><br> <label>Twelve Months Discount %
                                                                    (Only Numbers)</label> <input
                                                                        name="twelve_month_discounts[]"
                                                                        value="{{$sub->twelve_month_discount}}" required
                                                                        type="text" class="form-control"></div>


                                                            <div class="col-lg-4"> <br> <label>Always
                                                                    Price</label> <input name="always_prices[]"
                                                                                         value="{{$sub->always_price}}"
                                                                                         type="text"
                                                                                         class="form-control"></div>
                                                            <div class="col-lg-4"><br> <label>Always Vendor
                                                                    Price</label> <input
                                                                        name="always_vendor_prices[]"
                                                                        value="{{$sub->always_vendor_price}}"
                                                                        type="text" class="form-control"></div>
                                                            <div class="col-lg-4"><br> <label>Always Discount %
                                                                    (Only Numbers)</label> <input
                                                                        name="always_discounts[]"
                                                                        value="{{$sub->always_discount}}" required
                                                                        type="text" class="form-control"></div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <!-- for one months ends -->
                                            <!-- for one months -->
                                            <div class="col-lg-12 col-md-12 hideable_div">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <br>
                                                        <label>One Month Price</label>
                                                        <input name="one_month_price" type="text" class="form-control"
                                                               value="{{$service->one_month_price}}">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <br>
                                                        <label>One Month Vendor Price</label>
                                                        <input name="one_month_vendor_price" type="text"
                                                               class="form-control"
                                                               value="{{$service->one_month_vendor_price}}">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <br>
                                                        <label>One Month Discount % (Only Numbers)</label>
                                                        <input name="one_month_discount" type="text"
                                                               class="form-control"
                                                               value="{{$service->one_month_discount ? $service->one_month_discount : 0}}">
                                                    </div>
                                                    <!-- for one months ends -->
                                                    <!-- for six months -->
                                                    <div class="col-lg-4">
                                                        <br>
                                                        <label>Six Months Price</label>
                                                        <input name="six_month_price" type="text" class="form-control"
                                                               value="{{$service->six_month_price}}">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <br>
                                                        <label>Six Months Vendor Price</label>
                                                        <input name="six_month_vendor_price" type="text"
                                                               class="form-control"
                                                               value="{{$service->six_month_vendor_price}}">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <br>
                                                        <label>Six Months Discount % (Only Numbers)</label>
                                                        <input name="six_month_discount" type="text"
                                                               class="form-control"
                                                               value="{{$service->six_month_discount ? $service->six_month_discount : 0}}">
                                                    </div>
                                                    <!-- for six months ends -->
                                                    <!-- for one months -->
                                                    <div class="col-lg-4">
                                                        <br>
                                                        <label>Twelve Months Price</label>
                                                        <input name="twelve_month_price" type="text"
                                                               class="form-control"
                                                               value="{{$service->twelve_month_price}}">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <br>
                                                        <label>Twelve Months Vendor Price</label>
                                                        <input name="twelve_month_vendor_price" type="text"
                                                               class="form-control"
                                                               value="{{$service->twelve_month_vendor_price}}">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <br>
                                                        <label>Twelve Months Discount % (Only Numbers)</label>
                                                        <input name="twelve_month_discount" type="text"
                                                               class="form-control"
                                                               value="{{$service->twelve_month_discount ? $service->twelve_month_discount : 0}}">
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <br>
                                                        <label>Always</label>
                                                        <input name="always_price" type="text"
                                                               class="form-control"
                                                               value="{{$service->always_price}}">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <br>
                                                        <label>Always Vendor Price</label>
                                                        <input name="always_vendor_price" type="text"
                                                               class="form-control"
                                                               value="{{$service->always_vendor_price}}">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <br>
                                                        <label>Always Discount % (Only Numbers)</label>
                                                        <input name="always_discount" type="text"
                                                               class="form-control"
                                                               value="{{$service->always_discount ? $service->always_discount : 0}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- for one months ends -->
                                            <div class="col-md-12">
                                                <br>
                                                <br>
                                                <div class="custom-control custom-checkbox styled-checkbox">
                                                    <input class="custom-control-input" type="checkbox"
                                                           name="is_show_at_home" id="is_show_at_home" value="1"
                                                           @if($service->is_show_at_home==1) checked @endif>
                                                    <label class="custom-control-descfeedback" for="is_show_at_home">Is
                                                        show at home page?</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <br>
                                                <label>Short Description</label>
                                                <textarea cols="12" rows="5" class="form-control"
                                                          name="short_desc">{!! $service->short_desc  !!}</textarea>
                                            </div>
                                            <div class="col-lg-12">
                                                <br>
                                                <label>Long Description</label>
                                                <textarea cols="12" rows="5" id="editor"
                                                          name="description">{!! $service->description  !!}</textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <br>
                                                <div class="custom-control custom-checkbox styled-checkbox">
                                                    <input class="custom-control-input" type="checkbox"
                                                           name="is_whatsapp" id="is_whatsapp" value="1"
                                                           @if($service->is_whatsapp==1) checked @endif>
                                                    <label class="custom-control-descfeedback" for="is_whatsapp">Buy at
                                                        Whatsapp?</label>
                                                </div>
                                                <div class="custom-control custom-checkbox styled-checkbox">
                                                    <input class="custom-control-input" type="checkbox" name="is_active"
                                                           id="is_active" value="1"
                                                           @if($service->is_active!=2) checked @endif>
                                                    <label class="custom-control-descfeedback" for="is_active">Is
                                                        Active?</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="em-separator separator-dashed"></div>
                                        <div class="text-right">
                                            <button class="btn btn-gradient-01" type="submit">Submit</button>
                                            <!-- <button class="btn btn-shadow" type="reset">Cancel</button> -->
                                        </div>
                                    </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>


@stop

@section('footer_scripts')
    <!-- page level scripts -->
    <script src="{{asset('public/angvo/assets/js//multiselect.js')}}"></script>
    <script src="{{ asset('public/public/assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        $('select[multiple]').multiselect();

        function toggle_expire_after(argument) {
            if ($(argument).val() == 1) {
                $('#expire_after').show();
            }
            else {
                $('#expire_after').hide();
            }
        }

        $(document).ready(function () {
            var editor = CKEDITOR.replace('editor', {
                startupFocus: true
            });
            editor.on('change', function () {
                $(s).change();
                editor.updateElement();
            });
        });

        $('#i_form').submit(function () {
            var options = $('#multiple_select > option:selected');
            if (options.length == 0) {
                toastr.error("Please select at least one Vendor!", 'Error');
                return false;
            }
        });

        function show_sub_service(e) {
            if ($(e).is(':checked')) {
                $('.hideable_div').hide();
                $('#append_div').show();
                $('#add_sub_service_btn').show();
            } else {

                $('#add_sub_service_btn').hide();
                $('#append_div').hide();
                $('.hideable_div').show();
            }
        }

        function one_time_payment(e) {
            if ($(e).is(':checked')) {
                $('.one_time_payment').show();
                $('.hideable_div').hide();
                $('#append_div').hide();
                $('#add_sub_service_btn').hide();
                $('.is_sub_service').hide();
            } else {

                $('.one_time_payment').hide();
                // $('.hideable_div').show();
                $('#append_div').show();
                $('#add_sub_service_btn').show();
                $('.is_sub_service').show();
            }
        }

        function append_sub_service() {


            var Html ='<div class="col-lg-4"> <br>  <label>Always Price</label>';
            Html +='<input name="always_prices[]" value="0" type="text" class="form-control"></div>';

            Html +='<div class="col-lg-4"><br> <label>Always Vendor Price</label>';
            Html +='<input  name="always_vendor_prices[]" value="0" type="text" class="form-control"></div>';

            Html +='<div class="col-lg-4"><br> <label>Always Discount % (Only Numbers)</label>';
            Html +='<input name="always_discounts[]" value="0" required type="text" class="form-control"></div>';

            $('#append_div').append('<div class="row appended_row"><div class="col-lg-12"> <span class="remove_btn" onclick="remove_sub_service(this);">X</span> <br> <label>Sub Service Title</label> <input name="titles[]" type="text" class="form-control" required=""></div><div class="col-lg-4"> <br> <label>One Month Price</label> <input name="one_month_prices[]" type="text" class="form-control"></div><div class="col-lg-4"> <br> <label>One Month Vendor Price</label> <input name="one_month_vendor_prices[]" type="text" class="form-control"></div><div class="col-lg-4"> <br> <label>One Month Discount % (Only Numbers)</label> <input name="one_month_discounts[]" required value="0" type="text" class="form-control"></div><div class="col-lg-4"> <br> <label>Six Months Price</label> <input name="six_month_prices[]" type="text" class="form-control"></div><div class="col-lg-4"> <br> <label>Six Months Vendor Price</label> <input name="six_month_vendor_prices[]" type="text" class="form-control"></div><div class="col-lg-4"> <br> <label>Six Months Discount % (Only Numbers)</label> <input name="six_month_discounts[]" required value="0" type="text" class="form-control"></div><div class="col-lg-4"> <br> <label>Twelve Months Price</label> <input name="twelve_month_prices[]" type="text" class="form-control"></div><div class="col-lg-4"> <br> <label>Twelve Months Vendor Price</label> <input name="twelve_month_vendor_prices[]" type="text" class="form-control"></div><div class="col-lg-4"> <br> <label>Twelve Months Discount % (Only Numbers)</label> <input name="twelve_month_discounts[]" required value="0" type="text" class="form-control"></div>'+Html+'</div>');
        }

        function remove_sub_service(e) {
            $(e).parent().parent('.appended_row').remove();
        }
    </script>
@stop
