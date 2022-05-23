@extends('layouts.angvo')
@section('content')
<style>
    .c_title{height: 71px;
    overflow: hidden;}
    .pagination {justify-content: center;}
    /*
*
* ==========================================
* FOR DEMO PURPOSE
* ==========================================
*
*/
.content {text-align: justify!important;}
.shop-collection-area {
  background: #eecda3;
  background: -webkit-linear-gradient(to right, #eecda3, #ef629f);
  background: linear-gradient(to right, #eecda3, #ff5722);
  min-height: 100vh;
}
.custom_btn{    width: 221px;
    float: right;
    background: #ff5722;
    border-color: #ff5722;}
    @media screen and (max-width: 512px) {
      .pl-4, .px-4 {padding: 0px!important;}
            .p-5 {
          padding: 1rem!important;
      }
    }
    
</style>
    <!--====== PAGE TITLE PART START ======-->

    <section class="banner-area page-title bg_cover" style="background-image: url({{asset('public/angvo/assets/images/banners/service_banner.jpg')}})">
        <div class="banner-bg">
            <div class="container">
                <div class="row">
               <!--      <div class="col-lg-12">
                        <div class="page-title-content">
                            <h3 class="title">GENERAL COMPLAINT</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">GENERAL COMPLAINT</li>
                                </ol>
                            </nav>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="banner-shape-1">
        </div>
        <div class="banner-shape-2">
            <img src="{{asset('public/angvo/assets/images/banner-shape-1.png')}}" alt="">
        </div>
        <div class="banner-shape-3">
            <img src="{{asset('public/angvo/assets/images/banner-shape-2.png')}}" alt="">
        </div>
    </section>

    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== SERVICES PRICING PART START ======-->
   
    <section class="shop-collection-area pt-30 pb-130 them_bg_color" style="padding-bottom: 5px!important; min-height:10px!important;">
        <div class="container">
            <div class="px-4 px-lg-0">
  <!-- For demo purpose -->
  <!-- End -->

  <div class="pb-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-sm-12 col-xs-12 p-5 bg-white rounded shadow-sm mb-5">
             <div class="col-md-12">
                @if(session()->has('msg'))
                <div class="col-md-12">
                  <center style="color: #fd612d;font-weight: bold;">
                  {{session()->get('msg')}}
                  </center>
                  <br>
                </div>
                @endif
              <hr>
                <h5>Please fill up the below form to submit your complaint</h5>
                <form method="post" action="{{route('submit_complaint')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <br>
                      <label>Your Name</label>
                      <input type="text" class="form-control" name="name" placeholder="eg. Abrahim" required="">
                    </div>
                    <div class="col-md-6">
                      <br>
                      <label>Your Email</label>
                      <input type="email" class="form-control" name="email" placeholder="eg. admin@gmail.com" required="">
                    </div>
                    <div class="col-md-6">
                      <br>
                      <label>Contact Number</label>
                      <input type="text" class="form-control" name="phone"  required="" placeholder="eg. 0324-4448940">
                    </div>
                    <div class="col-md-6">
                      <br>
                      <label>Select Service</label>
                      <select class="form-control" name="service_id">
                        @foreach($services as $s)
                        <option value="{{$s->id}}">{{$s->title}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-6">
                      <br>
                      <label>Attach Image</label>
                      <input type="file" class="form-control" name="image" required="">
                    </div>
                    <div class="col-md-12">
                      <br>
                      <label>Description Box</label>
                        <textarea class="form-control" cols="12" rows="5" name="description" placeholder="Describe your problem here..."></textarea>
                    </div>
                    <div class="col-md-12">
                      <br>
                        <button type="submit" class="btn btn-dark rounded-pill py-2 btn-block custom_btn">Submit Complaint</button>
                    </div>
                  </div>
                 </form>
             </div>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>

        </div>
    </section> 

    <!--====== SERVICES PRICING PART ENDS ======-->
@endsection
