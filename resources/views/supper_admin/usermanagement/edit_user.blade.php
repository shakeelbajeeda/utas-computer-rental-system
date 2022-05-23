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
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }

        /* Optional: Makes the sample page fill the window. */
        html, body {
            height:  100%;
            margin:  0;
            padding: 0;
        }

        #description {
            font-family: Roboto;
            font-size:   15px;
            font-weight: 300;
        }

        #infowindow-content .title {
            font-weight: bold;
        }

        #infowindow-content {
            display: none;
        }

        #map #infowindow-content {
            display: inline;
        }

        .pac-card {
            margin:           10px 10px 0 0;
            border-radius:    2px 0 0 2px;
            box-sizing:       border-box;
            -moz-box-sizing:  border-box;
            outline:          none;
            box-shadow:       0 2px 6px rgba(0, 0, 0, 0.3);
            background-color: #fff;
            font-family:      Roboto;
        }

        .display {
            display: none;
        }

        #pac-container {
            padding-bottom: 12px;
            margin-right:   12px;
        }

        .pac-controls {
            display: inline-block;
            padding: 5px 11px;
        }

        .pac-controls label {
            font-family: Roboto;
            font-size:   13px;
            font-weight: 300;
        }

        #pac-input {
            background-color: #fff;
            font-family:      Roboto;
            font-size:        15px;
            font-weight:      300;
            margin-left:      12px;
            padding:          0 11px 0 13px;
            text-overflow:    ellipsis;
            width:            400px;
        }

        .pac-container {
            z-index: 5051 !important;
        }

        #pac-input:focus {
            border-color: #4d90fe;
        }

        #title {
            color:            #fff;
            background-color: #4d90fe;
            font-size:        25px;
            font-weight:      500;
            padding:          6px 12px;
        }

        #target {
            width: 345px;
        }
    </style>
    <style>

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
@section('content')
    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">Edit User</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">User management</a></li>
                            <li class="breadcrumb-item active">Edit User</li>
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
                    <div class="widget-header bordered no-actions d-flex align-items-center">
                        <h4>Edit User</h4>
                    </div>
                    <div class="widget-body">

                        <form class="needs-validation" novalidate="" action="{{route('update_user')}}/{{$user->id}}" autocomplete="off" method="post" role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Select Role</label>
                                <div class="col-lg-5">
                                    <select name="role" class=" form-control selectpicker show-menu-arrow" data-live-search="true">

                                        <?php if(isset($roles) and sizeof($roles) > 0):?>
                                        <?php foreach($roles as $v):?>
                                        <option value="<?=$v->slug?>" @if($v->slug==$user->role) selected @endif><?=$v->title?></option>
                                        <?php endforeach;
                                        else: ?>
                                        <option value="">No Role Found</option>
                                        <?php endif ?>

                                    </select>
                                </div>

                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">First Name</label>
                                <div class="col-lg-5">
                                    <input type="text" name='first_name' class="form-control" value="{{$user->first_name}}" required>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Last Name</label>
                                <div class="col-lg-5">
                                    <input type="text" name='last_name' class="form-control" value="{{$user->last_name}}" required>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Email</label>
                                <div class="col-lg-5">
                                    <input type="email" name='email' class="form-control" placeholder="" required value="{{$user->email}}">
                                    @if($errors->has('email'))
                                        <span class="invalid-feedback" role="alert" style="color:red;position:absolute;display: block;">
                                          {{$errors->first('email')}}
                                      </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Password</label>
                                <div class="col-lg-5">
                                    <input type="text" value="" name='password' class="form-control" >
                                    <small class="text-muted">Please Empty if dont wanna change</small>
                                </div>
                            </div>

                            <div class="text-right">
                                <button class="btn btn-gradient-01" type="submit">Add</button>
                                <!-- <button class="btn btn-shadow" type="reset">Reset</button> -->
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Form -->
            </div>
        </div>
        <!-- End Row -->
    </div>


    <div id="modal-large" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Choose the location of vehicle</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <h4 style="margin-left:15px; font-weight:600;">Address:</h4>  <span id="m_address"></span>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                            <div id="map" style="height: 373px;width: 778px;"></div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-shadow" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Confirm & Save</button>
                </div>
            </div>
        </div>
    </div>

@stop
@section('footer_scripts')

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCLZOWnjcU-l5PEeT_6EYmiLauD0tyxhpY&libraries=places&callback=initAutocomplete"
        async defer></script>
    <script type="text/javascript">
        function initAutocomplete() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 31.5203696, lng: 74.3587473},
                zoom: 13,
                mapTypeId: 'roadmap'
            });
            var markers = [];
            infoWindow = new google.maps.InfoWindow;
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    $('#lat').val(pos.lat);
                    $('#long').val(pos.lng);
                    google.maps.event.addListener(map, 'click', function (event) {
//Get the location that the user clicked.
                        var geocoder = new google.maps.Geocoder;
                        var infowindow = new google.maps.InfoWindow;
                        var clickedLocation = event.latLng;
                        geocoder.geocode({'location': clickedLocation}, function (results, status) {
                            if (status === 'OK') {
                                if (results[0]) {

                                    var address = results[0].formatted_address;
                                    $("#m_address").text(address);
                                    $('#address').val(address);
// infowindow.open(map, marker);
                                } else {
                                    window.alert('No results found');
                                }
                            } else {
                                window.alert('Geocoder failed due to: ' + status);
                            }
                        });
// console.log(clickedLocation);

//If the marker hasn't been added.
                        if (marker === false) {
//Create the marker.
                            marker = new google.maps.Marker({
                                position: clickedLocation,
                                map: map,
                                draggable: true //make it draggable
                            });
// console.log(marker);
//Listen for drag events!
                            google.maps.event.addListener(marker, 'dragend', function (event) {
                                markerLocation();
                            });
                        } else {
//Marker has already been added, so just change its location.
                            marker.setPosition(clickedLocation);
// console.log(clickedLocation);
// console.log(clickedLocation);

                        }
//Get the marker's location.
                        markerLocation();
                    });

                    infoWindow.setPosition(pos);
                    infoWindow.setContent('Location found.');
                    infoWindow.open(map);
                    map.setCenter(pos);
                }, function () {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
// Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
// Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);

            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

// Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function () {
                searchBox.setBounds(map.getBounds());
            });


// Listen for the event fired when the user selects a prediction and retrieve
// more details for that place.
            searchBox.addListener('places_changed', function () {
                var places = searchBox.getPlaces();
// alert(JSON.stringify(place));
                console.log(places);
                var lat = places[0].geometry.location.lat();
                var long = places[0].geometry.location.lng();
                $('#lat').val(lat);
                $('#long').val(long);
                $('#address').val($('#pac-input').val());
                $('#m_address').text($('#pac-input').val());

// var newdd =  places.geometry;
// console.log(newdd);
                if (places.length == 0) {
                    return;
                }

// Clear out the old markers.
                markers.forEach(function (marker) {
                    marker.setMap(null);
                });
                markers = [];

// For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
// console.log(JSON.stringify(bounds));
// alert(JSON.stringify(bounds));
//  console.log(bounds[0].geometry.viewport.ga.j);
                places.forEach(function (place) {
                    if (!place.geometry) {
// console.log(place.geometry);
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };

// Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    }));

                    if (place.geometry.viewport) {
// Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
                var geocoder = new google.maps.Geocoder;
                var infowindow = new google.maps.InfoWindow;
                var clickedLocation = event.latLng;
                geocoder.geocode({'location': clickedLocation}, function (results, status) {
                    if (status === 'OK') {
                        if (results[0]) {

                            var address = results[0].formatted_address;
                            $("#m_address").text(address);
                            $('#address').val(address);
// infowindow.open(map, marker);
                        } else {
                            window.alert('No results found');
                        }
                    } else {
                        window.alert('Geocoder failed due to: ' + status);
                    }
                });

            });
        }
    </script>



@stop
