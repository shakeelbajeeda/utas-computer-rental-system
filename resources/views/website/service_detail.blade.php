@extends('layouts.website')
@section('content')
    <style>

    </style>
    <!--====== PAGE TITLE PART START ======-->

    <section class="banner-area page-title bg_cover"
        style="height:400px;background-image: url('{{ asset(env('PUBLIC_URL') . 'website/assets/images/slider_images/slider_2.jpg') }}')">
        <div class="banner-bg">

        </div>
    </section>

    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== SERVICES PRICING PART START ======-->
    <section>
        <div>
            <div class="container">
                <div class="text-center h1 my-3 text-dark">Service Details</div>
                <div class="row my-5">
                    <div class="col-md-6">
                        <div>
                            <img width="100%" height="500px" class="rounded"
                                src="{{ asset(env('PUBLIC_URL') . 'website/assets/images/services_images/laptop.jpg') }}">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b class="pr-5">Brand: </b>Apple</li>
                                <li class="list-group-item"><b class="pr-5">Name: </b>Mac Book Pro</li>
                                <li class="list-group-item"><b class="pr-5">Rate Per/Hour: </b> $10</li>
                                <li class="list-group-item"><b class="pr-5">Operating System </b>Apple</li>
                                <li class="list-group-item"><b class="pr-5">Display Size: </b>15.6 inch</li>
                                <li class="list-group-item"><b class="pr-5">Number of USB Ports: </b>3</li>
                                <li class="list-group-item"><b class="pr-5">Number of HDMI Ports: </b>2</li>
                                <li class="list-group-item"><b class="pr-5">Category: </b>Computer</li>
                                <li class="list-group-item"><b class="pr-5">Security Deposit: </b>$5</li>
                                <li class="list-group-item"><b class="pr-5">Insurance Amount: </b>$3</li>
                                <div class="text-center">
                                    <a href="" class="btn btn-primary px-4 mt-3">Rent it</a>

                                </div>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </section>
