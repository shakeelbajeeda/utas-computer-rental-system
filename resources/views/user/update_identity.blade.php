@extends('layouts.user_dashboard')
{{-- page level styles --}}
@section('header_styles')
    <!-- Add Page Styles here -->
    <style>
        /*! CSS Used from: https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css */
        /*div,label{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline;}*/
        /*! CSS Used from: Embedded */
        .avatar-upload {
            position: relative;
            max-width: 205px;
            margin: 0 auto;
        }

        .avatar-upload .avatar-edit {
            position: absolute;
            right: 0px;
            z-index: 1;
            top: 0px;
        }

        .avatar-upload .avatar-edit input {
            display: none;
        }

        .avatar-upload .avatar-edit input + label {
            display: inline-block;
            width: 20px;
            height: 20px;
            margin-bottom: 0;
            border-radius: 100%;
            background: #FFFFFF;
            border: 1px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all 0.2s ease-in-out;
        }

        .avatar-upload .avatar-edit input + label:hover {
            background: #f1f1f1;
            border-color: #d6d6d6;
        }

        .avatar-upload .avatar-edit input + label:after {
            content: "\f040";
            font-family: 'FontAwesome';
            color: #757575;
            position: absolute;
            top: 0px;
            left: 0;
            right: 0;
            text-align: center;
            margin: auto;
        }

        .avatar-upload .avatar-preview {
            width: 80px;
            height: 80px;
            position: relative;
            border-radius: 100%;
            border: 6px solid #F8F8F8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }

        .avatar-upload .avatar-preview > div {
            width: 100%;
            height: 100%;
            border-radius: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        /*! CSS Used fontfaces */
        @font-face {
            font-family: 'FontAwesome';
            src: url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/fonts/fontawesome-webfont.eot?v=4.7.0');
            src: url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/fonts/fontawesome-webfont.eot#iefix&v=4.7.0') format('embedded-opentype'), url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/fonts/fontawesome-webfont.woff2?v=4.7.0') format('woff2'), url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/fonts/fontawesome-webfont.woff?v=4.7.0') format('woff'), url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/fonts/fontawesome-webfont.ttf?v=4.7.0') format('truetype'), url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/fonts/fontawesome-webfont.svg?v=4.7.0#fontawesomeregular') format('svg');
            font-weight: normal;
            font-style: normal;
        }
    </style>
@stop
<!--Start page content-->
@section('content')
    <?php
    $countries = \App\Country::all();
    ?>


    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">Update Identity</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="ti ti-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Update Identity</li>
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
                        <h4>Update Identity</h4>
                    </div>
                    <div class="widget-body">

                        <form id="i_form" novalidate="" action="{{route('save_identity')}}" method="post"
                              enctype='multipart/form-data'>
                            <!-- Form::model($user, ['route' => 'save.profile', 'method' => 'post','files'=>true,'autocomplete'=>'off','novalidate','class' => 'needs-validation']) } -->

                            @csrf
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Select
                                    Image</label>
                                <div class="col-lg-5">
                                    <div class="input-group">
                                        <div class="avatar-upload">
                                            <div class="avatar-edit">
                                                <input type="file" img="1" class="form-control"
                                                       onchange="changeAvatar(this)" name="image" id="imageUpload1"
                                                       accept=".png, .jpg, .jpeg">
                                                <label for="imageUpload1"></label>
                                            </div>
                                            <div class="avatar-preview">
                                                @if(isset($user->image))
                                                    <div id="imagePreview1">
                                                        <img id="imageEditPreview1"
                                                             style="height: 69px;width: 69px;border-radius: 100%;"
                                                             src="{{asset('/public/images/user_images')}}/{{ $user->image}}">
                                                    </div>
                                                @else
                                                    <div id="imagePreview1"
                                                         style="background-image: url({{asset('assets/img/default.png')}});">

                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center">

                                <div class="col-lg-6">
                                    <label>First Name</label>
                                    <input name="first_name" type="text" class="form-control custom_required"
                                           value="{{$user->first_name}}">
                                </div>

                                <div class="col-lg-6">
                                    <label>Last Name</label>
                                    <input name="last_name" type="text" class="form-control custom_required"
                                           value="{{$user->last_name}}">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center">

                                <div class="col-lg-6">
                                    <label>Email</label>
                                    <input type="Email" class="form-control" value="{{$user->email}}" readonly>
                                </div>

                                <div class="col-lg-6">
                                    <label>Phone Number</label>
                                    <input name="phone" type="text" class="form-control custom_required"
                                           value="{{$user->phone}}">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center">

                                <div class="col-lg-6">
                                    <label>City</label>
                                    <input name="city" type="text" class="form-control custom_required"
                                           value="{{$user->city}}">
                                </div>

                                <div class="col-lg-6">
                                    <label>Pakistan Document Delivery Address</label>
                                    <input name="address" type="text" class="form-control custom_required"
                                           value="{{$user->address}}">
                                </div>
                                <div class="col-lg-6">
                                    <br>
                                    <label>Select Country</label>
                                    @if(isset($countries) and sizeof($countries))
                                        <select class=" form-control selectpicker show-menu-arrow" name="country_id"
                                                data-live-search="true" required="">
                                            @foreach($countries as $c)
                                                <option value="{{$c->id}}"
                                                        @if($c->id ==$user->country_id) selected @endif>{{$c->nicename}}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                            </div>
                            @if(auth()->user()->is_address_assign or auth()->user()->is_vps_order)
                                <div class="form-group row d-flex align-items-center">

                                    @if(auth()->user()->is_address_assign ==1 and auth()->user()->is_vps_order==0)
                                        <div class="col-lg-3">

                                            <div class="input-group">

                                                <div class="avatar-upload">

                                                    <div class="avatar-edit">
                                                        <input type="file" img="11"
                                                               class="form-control @if(!isset($user->front_passport_img)) custom_required @endif"
                                                               onchange="changeAvatar(this)" name="front_passport_img"
                                                               id="imageUpload11" accept=".png, .jpg, .jpeg">
                                                        <label for="imageUpload11"></label>
                                                    </div>
                                                    <div class="avatar-preview">
                                                        @if(isset($user->front_passport_img))
                                                            <div id="imagePreview11">
                                                                <img id="imageEditPreview11"
                                                                     style="height: 69px;width: 69px;border-radius: 100%;"
                                                                     src="{{asset('/public/images/doc_images')}}/{{ $user->front_passport_img}}">
                                                            </div>
                                                        @else
                                                            <div id="imagePreview11"
                                                                 style="background-image: url({{asset('assets/img/default.png')}});">

                                                            </div>
                                                        @endif
                                                    </div>

                                                </div>

                                            </div>
                                            <center>
                                                <label>Passport Front Side</label>
                                            </center>
                                        </div>
                                    @endif
                                    <div class="col-lg-3">

                                        <div class="input-group">

                                            <div class="avatar-upload">

                                                <div class="avatar-edit">
                                                    <input type="file" img="1111"
                                                           class="form-control @if(!isset($user->front_cnic_img)) custom_required @endif"
                                                           onchange="clientavatar(this)" name="front_cnic_img"
                                                           id="imageUpload1111" accept=".png, .jpg, .jpeg">
                                                    <label for="imageUpload1111"></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    @if(isset($user->front_cnic_img))
                                                        <div id="imagePreview1111">
                                                            <img id="imageEditPreview1111"
                                                                 style="height: 69px;width: 69px;border-radius: 100%;"
                                                                 src="{{asset('/public/images/doc_images')}}/{{ $user->front_cnic_img}}">
                                                        </div>
                                                    @else
                                                        <div id="imagePreview1111"
                                                             style="background-image: url({{asset('assets/img/default.png')}});">

                                                        </div>
                                                    @endif
                                                </div>

                                            </div>

                                        </div>
                                        <center>
                                            <label>CNIC Front Side</label>
                                        </center>
                                    </div>
                                    <div class="col-lg-3">

                                        <div class="input-group">

                                            <div class="avatar-upload">

                                                <div class="avatar-edit">
                                                    <input type="file" img="11111"
                                                           class="form-control @if(!isset($user->back_cnic_img)) custom_required @endif"
                                                           onchange="clientavatar(this)" name="back_cnic_img"
                                                           id="imageUpload11111" accept=".png, .jpg, .jpeg">
                                                    <label for="imageUpload11111"></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    @if(isset($user->back_cnic_img))
                                                        <div id="imagePreview11111">
                                                            <img id="imageEditPreview11111"
                                                                 style="height: 69px;width: 69px;border-radius: 100%;"
                                                                 src="{{asset('/public/images/doc_images')}}/{{ $user->back_cnic_img}}">
                                                        </div>
                                                    @else
                                                        <div id="imagePreview11111"
                                                             style="background-image: url({{asset('assets/img/default.png')}});">

                                                        </div>
                                                    @endif
                                                </div>

                                            </div>

                                        </div>
                                        <center>
                                            <label>CNIC Back Side</label>
                                        </center>
                                    </div>

                                </div>

                            @endif
                            <div class="mb-1">
                                <br>
                                <h4>Change Password (optional)</h4>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">

                                <div class="col-lg-6">
                                    <label>New Password</label>
                                    <input name="password" type="password" class="form-control" value="">
                                </div>

                                <div class="col-lg-6">
                                    <label>Confirm Password</label>
                                    <input name="confirm_password" type="password" class="form-control" value="">
                                </div>
                            </div>
                            <div class="em-separator separator-dashed"></div>
                            <div class="text-right">
                                <button class="btn btn-gradient-01" type="button"
                                        onclick="form_validation('.custom_required');">Save Changes
                                </button>
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
    <script>
        function changeAvatar(input) {
            console.log(input)
            if (input.files && input.files[0]) {
                let id = $(input).attr('img');
                var reader = new FileReader();
// var img = $(input).attr('img');
// alert(img);
                console.log(id)
                reader.onload = function (e) {
                    $('#imagePreview' + id).css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview' + id).hide();
                    $('#imageEditPreview' + id).hide();
                    $('#imagePreview' + id).fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }


        function form_validation(class_name = ".custom_required") {

            var couter12 = 1;
            $(class_name).each(function (index, value) {


                if ($(this).val() != "") {
                    $(this).css('border-color', '');

                    if ($(this).attr('type') == 'file') {

                        $(this).parents('.avatar-upload').css('border', '');
                        $(this).parents('.avatar-upload').css('border-radius', '0px');
                    }
                }
                else {

                    if ($(this).attr('type') == 'file') {

                        $(this).parents('.avatar-upload').css('border', '1px solid red');
                        $(this).parents('.avatar-upload').css('border-radius', '100%');
                        couter12 = 2;
                    }
                    else {
                        $(this).css('border', '1px solid red');
                        couter12 = 2;
                    }
                    $(this).css('border', '1px solid red');

                }

            });
            if (couter12 == 2) {
                return false;
            }
            else {
                $('#i_form').submit();
                return true;
            }
        };
    </script>
@stop
