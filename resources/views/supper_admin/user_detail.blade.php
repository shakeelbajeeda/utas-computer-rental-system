@extends('layouts/supper_admin')

<!--Start page content-->
@section('content')
<?php 
use Carbon\Carbon;
 ?>
<style type="text/css">
p{color:black;font-size:17px;}
.doc_images
{
    height: 600px;
    width: 438px;
    border: 1px solid #2c304d;
    padding: 5px;
    border-radius: 10px;
}
@if($user->is_admin==0)
.is_visible {display: block;}
@else
.is_visible {display: none;}
@endif
</style>
<div class="container-fluid pt-24">
    <!-- Begin Page Header-->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="widget widget-16 has-shadow">
                <div class="widget-body">
                    <div class="row ">
                      
                      <div class="col-md-3 is_visible">
                        <p style="float:right;"><strong>Update User Status</strong></p>
                      </div>
                      <div class="col-md-6 is_visible">
                        <form method="post" enctype="mutltipart/form-data" action="{{route('update_status')}}">
                          @csrf
                          <input type="hidden" name="user_id" value="{{$user->id}}">
                        <select class="form-control" name="is_user_approved" required="">
                        <option value="">Select Status</option>
                        <option value="1" @if($user->is_user_approved==1) selected @endif>Profile Approved</option>
                          <option value="2" @if($user->is_user_approved==2) selected @endif>Disapproved</option>
                          
                        </select>
                        
                      </div>
                      <div class="col-md-3 is_visible">
                        <button class="btn btn-primary" type="submit">Update Status</button>
                        </form>
                      </div>
                      
                        <div class="col-md-12">
                          <br>
                            <center>
                                <img style="height: 100px;
    width: 100px;
    border-radius: 100%;
    padding: 3px;
    border: 3px solid #0fff5f;" src="{{asset('/public/images/user_images')}}/{{ $user->image}}" >
                            </center>
                            <br>
                        </div>
                        <div class="col-md-6">
                            <p ><strong>Name</strong> {{$user->first_name}} {{$user->last_name}} </p>
                        </div>
                        <div class="col-md-6">
                            <p ><strong>Email</strong> {{$user->email}} </p>
                        </div>
                        <div class="col-md-6">
                            <p ><strong>Phone</strong> {{$user->phone}} </p>
                        </div>
                        <div class="col-md-6">
                            <p ><strong>City</strong> {{$user->city}} </p>
                        </div>
                        <div class="col-md-6">
                            <p ><strong>Country</strong> {{@$user->country->nicename}} </p>
                        </div>
                        <div class="col-md-12 is_visible">
                            <p ><strong>Document Delivery Address</strong> {{$user->address}} </p>
                        </div>
                                                <div class="col-md-12 is_visible">

                                <!-- <p>
                                   <strong> Document Delivery Address Proof </strong>
                                   @if(isset($user->address_proofs))
                                   <a class="btn btn-primary" href="{{asset('/public/images/doc_images')}}/{{ $user->address_proofs}}" download>Download Proof</a>
                                   @else
                                   Not Uploaded Yet
                                   @endif
                                </p> -->

                        </div>
                        <div class="col-md-12 is_visible">
                            <p ><strong>Business Address</strong> {{$user->virtual_address}} </p>
                        </div>
                        <div class="col-md-12">
                            <p ><strong>User Signature</strong>
                            @if(isset($user->signature))
                            <img src="{{asset('public/public/images/singature_images')}}/{{ $user->signature}}">
                            @else
                            Not signed terms yet
                            @endif
                            </p>
                        </div>
                        <div class="col-md-6 is_visible">
                             <p>
                                    CNIC Front Image
                                </p>
                            <img class="doc_images"  src="{{asset('/public/images/doc_images')}}/{{ $user->front_cnic_img}}">
                            <br>
                                <a style="margin:5px;" class=" btn btn-primary" href="{{asset('/public/images/doc_images')}}/{{ $user->front_cnic_img}}" download>Download  CNIC Front Image</a>
                               

                        </div>
                        <div class="col-md-6 is_visible">
                             <p>
                                    CNIC Back Image
                                </p>
                            <img class="doc_images"  src="{{asset('/public/images/doc_images')}}/{{ $user->back_cnic_img}}" >
                                <br>
                                <a style="margin:5px;" class=" btn btn-primary" href="{{asset('/public/images/doc_images')}}/{{ $user->back_cnic_img}}" download>Download CNIC Back Image</a>
                               

                        </div>
                        <div class="col-md-6 is_visible">
                            <p>
                                    Passport Front Image
                                </p>
                            <img class="doc_images"  src="{{asset('/public/images/doc_images')}}/{{ $user->front_passport_img}}">

                                
                                <br>
                                <a style="margin:5px;" class=" btn btn-primary" href="{{asset('/public/images/doc_images')}}/{{ $user->front_passport_img}}" download>Download  Passport Front Image</a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
  </div>
</div>
@stop

