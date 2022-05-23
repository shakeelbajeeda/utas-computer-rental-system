@extends('layouts.front')
@section('content')
    @include('front.include.errors')

    <style>
        @media (max-width: 514px) {
            #right-summary {
                display: none;
            }
        }

        @media (min-width: 515px) {
            #left-summary {
                display: none;
            }
        }

        .create_account_divs{display: none;}
        @media (min-width: 576px)
        {
h1 {
    font-size: 50px;
    color: black;
}
}
h1 {
    font-size: 50px;
    color: black;
}
.header-section{display: none;}

    </style>

<div class="movie-facility padding-bottom padding-top">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <br>
                             <center>

                        <p style=" 
                            padding-bottom: 20px;
                            font-size:40px;
                            font-weight: bold;
                            line-height:60px;
                            color: red;">
                                Your Account has been blocked by Admin
                                <br>
                                Please contact to admin. Thanks
                            </p>

                        </center>
                </div>
            </div>

    </div>
</div>
@endsection
