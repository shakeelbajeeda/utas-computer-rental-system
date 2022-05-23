
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>Sign In | Dilliwala Express</title>
<!-- Favicon-->
<link rel="icon" href="favicon.ico" type="image/x-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

<!-- Bootstrap Core Css -->
<link href="{{asset('public/login_assets/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

<!-- Waves Effect Css -->
<link href="{{asset('public/login_assets/plugins/node-waves/waves.css')}}" rel="stylesheet" />

<!-- Animation Css -->
<link href="{{asset('public/login_assets/plugins/animate-css/animate.css')}}" rel="stylesheet" />

<!-- Custom Css -->
<link href="{{asset('public/login_assets/css/style.css')}}" rel="stylesheet">
</head>

<body class="login-page">
<div class="login-box">
  <div class="logo"> <a href="javascript:void(0);"><b>Dilliwala Express</b></a> <small></small> </div>
  <div class="card">
    <div class="body">
      <form id="sign_in" method="POST" action="{{route('login')}}">
 @csrf
        <div class="msg">Sign in to start your session</div>
        <div class="input-group"> <span class="input-group-addon"> <i class="material-icons">person</i> </span>
          <div class="form-line">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Username" required autofocus>
            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
          </div>
        </div>
        <div class="input-group"> <span class="input-group-addon"> <i class="material-icons">lock</i> </span>
          <div class="form-line">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <button class="btn btn-block bg-pink waves-effect" name="login" type="submit">SIGN IN</button>
          </div>
           <!-- <div class="col-xs-12"> -->
              <div class="align-center">
                        <a href="{{route('register')}}">Not a member? Sign Up</a>
            <!-- </div> -->
           </div>
             
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Jquery Core Js --> 
<script src="{{asset('public/login_assets/plugins/jquery/jquery.min.js')}}"></script> 

<!-- Bootstrap Core Js --> 
<script src="{{asset('public/login_assets/plugins/bootstrap/js/bootstrap.js')}}"></script> 

<!-- Waves Effect Plugin Js --> 
<script src="{{asset('public/login_assets/plugins/node-waves/waves.js')}}"></script> 

<!-- Validation Plugin Js --> 
<script src="{{asset('public/login_assets/plugins/jquery-validation/jquery.validate.js')}}"></script> 

<!-- Custom Js --> 
<script src="{{asset('public/login_assets/js/admin.js')}}"></script> 
<script src="{{asset('public/login_assets/js/pages/examples/sign-in.js')}}"></script>
</body>
</html>