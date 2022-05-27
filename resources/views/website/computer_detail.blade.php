@extends('layouts.website')
@section('content')
    @include('website.include.errors')


    <!--====== PAGE TITLE PART START ======-->
  <style>
      b{
        color: #223a66
      }
  </style>
    <section class="page-title bg-1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <h1 class="text-capitalize mb-5 text-lg">Computer Details</h1>
                        <h3 class="text-white">{{ $computer->title }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== SERVICES PRICING PART START ======-->
    <section>
        <div>
            <div class="container">
                <div class="row my-5">
                    <div class="col-md-6">
                        <div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b class="pr-5">Brand: </b>{{ $computer->brand }}
                                </li>
                                <li class="list-group-item"><b class="pr-5">Name: </b>{{ $computer->title }}
                                </li>
                                <li class="list-group-item"><b class="pr-5">Rate Per/Hour: </b>
                                    ${{ $computer->per_hour_rate }}</li>
                                <li class="list-group-item"><b class="pr-5">Operating System
                                    </b>{{ $computer->os }}</li>
                                <li class="list-group-item"><b class="pr-5">Display Size:
                                    </b>{{ $computer->display_size }}</li>
                                <li class="list-group-item"><b class="pr-5">Ram: </b>{{ $computer->ram }}</li>
                                <li class="list-group-item"><b class="pr-5">Number of USB Ports:
                                    </b>{{ $computer->no_of_usb_ports }}</li>
                                <li class="list-group-item"><b class="pr-5">Number of HDMI Ports:
                                    </b>{{ $computer->no_of_hdmi_ports }}</li>
                                <li class="list-group-item"><b class="pr-5">Category:
                                    </b>{{ $computer->category }}</li>
                                <li class="list-group-item"><b class="pr-5">Security Deposit:
                                    </b>${{ $computer->security_deposit }}</li>
                                <li class="list-group-item"><b class="pr-5">Insurance Amount:
                                    </b>${{ $computer->insurance_amount }}</li>
                                <div class="text-center">
                                    <a href="{{ route('order_page', [$computer->id]) }}"
                                        class="btn btn-danger px-4 mt-3">Book Now</a>

                                </div>
                            </ul>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            @if ($computer->is_rented == 1)
                                <span class="rent_out">Reserved</span>
                            @endif
                            <img width="100%" height="500px" class="rounded"
                                src="{{asset(env('PUBLIC_URL').'public/images/service_images/')}}/{{ $computer->image}}">
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>

    </section>
@endsection
