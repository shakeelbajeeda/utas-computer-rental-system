@extends('layouts.'.$layout)
{{-- page level styles --}}
@section('header_styles')
    <!-- Add Page Styles here -->
    <style>
        /*! CSS Used from: https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css */
        /*div,label{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline;}*/
        /*! CSS Used from: Embedded */
        .avatar-upload {
            position:  relative;
            max-width: 205px;
            margin:    0 auto;
        }

        .avatar-upload .avatar-edit {
            position: absolute;
            right:    0px;
            z-index:  1;
            top:      0px;
        }

        .avatar-upload .avatar-edit input {
            display: none;
        }

        .avatar-upload .avatar-edit input + label {
            display:       inline-block;
            width:         20px;
            height:        20px;
            margin-bottom: 0;
            border-radius: 100%;
            background:    #FFFFFF;
            border:        1px solid transparent;
            box-shadow:    0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor:        pointer;
            font-weight:   normal;
            transition:    all 0.2s ease-in-out;
        }

        .avatar-upload .avatar-edit input + label:hover {
            background:   #f1f1f1;
            border-color: #d6d6d6;
        }

        .avatar-upload .avatar-edit input + label:after {
            content:     "\f040";
            font-family: 'FontAwesome';
            color:       #757575;
            position:    absolute;
            top:         0px;
            left:        0;
            right:       0;
            text-align:  center;
            margin:      auto;
        }

        .avatar-upload .avatar-preview {
            width:         80px;
            height:        80px;
            position:      relative;
            border-radius: 100%;
            border:        6px solid #F8F8F8;
            box-shadow:    0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }

        .avatar-upload .avatar-preview > div {
            width:               100%;
            height:              100%;
            border-radius:       100%;
            background-size:     cover;
            background-repeat:   no-repeat;
            background-position: center;
        }

        /*! CSS Used fontfaces */
        @font-face {
            font-family: 'FontAwesome';
            src:         url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/fonts/fontawesome-webfont.eot?v=4.7.0');
            src:         url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/fonts/fontawesome-webfont.eot#iefix&v=4.7.0') format('embedded-opentype'), url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/fonts/fontawesome-webfont.woff2?v=4.7.0') format('woff2'), url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/fonts/fontawesome-webfont.woff?v=4.7.0') format('woff'), url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/fonts/fontawesome-webfont.ttf?v=4.7.0') format('truetype'), url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/fonts/fontawesome-webfont.svg?v=4.7.0#fontawesomeregular') format('svg');
            font-weight: normal;
            font-style:  normal;
        }
    </style>
@stop
<!--Start page content-->
@section('content')
<?php 
$countries= \App\Country::all();
 ?>

    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">Profile</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Profile</li>
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
                        <h4>Update Profile</h4>
                    </div>
                    <div class="widget-body">

                        <form class="form-horizontal" action="" method="post" enctype='multipart/form-data'>
                            <!-- Form::model($user, ['route' => 'save.profile', 'method' => 'post','files'=>true,'autocomplete'=>'off','novalidate','class' => 'needs-validation']) } -->

                            @csrf
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Select Image</label>
                                <div class="col-lg-5">
                                    <div class="input-group">
                                        <div class="avatar-upload">
                                            <div class="avatar-edit">
                                                <input type="file" img="1" class="form-control" onchange="changeAvatar(this)" name="image" id="imageUpload1" accept=".png, .jpg, .jpeg">
                                                <label for="imageUpload1"></label>
                                            </div>
                                            <div class="avatar-preview">
                                                @if(isset($user->image))
                                                    <div id="imagePreview1">
                                                        <img id="imageEditPreview1" style="height: 69px;width: 69px;border-radius: 100%;" src="{{asset('/public/images/user_images')}}/{{ $user->image}}">
                                                    </div>
                                                @else
                                                    <div id="imagePreview1" style="background-image: url({{asset('assets/img/default.png')}});">

                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($layout=='food_court')

                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Logo Image</label>
                                    <div class="col-lg-5">
                                        <div class="input-group">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type="file" img="2" class="form-control" onchange="changeAvatar(this)" name="logo" id="imageUpload2" accept=".png, .jpg, .jpeg">
                                                    <label for="imageUpload2"></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    @if(isset($user->logo))
                                                        <div id="imagePreview2" style="background-image: url('{{asset('/public/images/user_images')}}/{{ $user->image}}');">
                                                            <img id="imageEditPreview2" style="height: 69px;width: 69px;border-radius: 100%;" src="{{asset('/public/images/user_images')}}/{{ $user->logo}}">
                                                        </div>
                                                    @else
                                                        <div id="imagePreview2" style="background-image: url('{{asset('assets/img/default.png')}}');">

                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Restaurant Name</label>
                                    <div class="col-lg-6">
                                        <input name="restaurant_name" type="text" class="form-control" value="{{$user->restaurant_name}}">
                                    </div>
                                </div>
                            @endif

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">First Name</label>
                                <div class="col-lg-6">
                                    <input name="first_name" type="text" class="form-control" value="{{$user->first_name}}">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Last Name</label>
                                <div class="col-lg-6">
                                    <input name="last_name" type="text" class="form-control" value="{{$user->last_name}}">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Email</label>
                                <div class="col-lg-6">
                                    <input name="email" type="Email" class="form-control" value="{{$user->email}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Phone Number</label>
                                <div class="col-lg-6">
                                    <input name="phone" type="text" class="form-control" value="{{$user->phone}}">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">City</label>
                                <div class="col-lg-6">
                                    <input name="city" type="text" class="form-control" value="{{$user->city}}">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Address</label>
                                <div class="col-lg-6">
                                    <input name="address" type="text" class="form-control" value="{{$user->address}}">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Select Country</label>
                                <div class="col-lg-6">
                                    @if(isset($countries) and sizeof($countries))
                                     <select class=" form-control selectpicker show-menu-arrow" name="country_id"  data-live-search="true" required="">
                                         @foreach($countries as $c)
                                           <option value="{{$c->id}}" @if($c->id ==$user->country_id) selected @endif>{{$c->nicename}}</option>
                                         @endforeach
                                     </select>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-5">
                                <h4>Change Password (optional)</h4>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">New Password</label>
                                <div class="col-lg-6">
                                    <input name="password" type="password" class="form-control" value="">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Confirm Password</label>
                                <div class="col-lg-6">
                                    <input name="confirm_password" type="password" class="form-control" value="">
                                </div>
                            </div>
                            <div class="em-separator separator-dashed"></div>
                            <div class="text-right">
                                <button class="btn btn-gradient-01" type="submit">Save Changes</button>
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
    </script>
@stop
