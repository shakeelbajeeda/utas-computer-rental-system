<!Doctype html>
<html lang="en">

<head>
    <title>Login | URC</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('login_assets/css/style.css') }}">

</head>

<body>
    <section>
        <div class="container">
            <div class="row justify-content-center" style="height:100vh;">
                <div class="col-md-7 col-lg-5 m-auto">
                    <div class="wrap">
                        <div class="d-flex" style="align-items: center;display:flex;">
                            <a class="m-auto" href="{{ route('home_page') }}">
                                <img src="{{ asset('website/images/logo.png') }}" alt="">

                            </a>
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <form method="POST" action="{{ route('register') }}" class="signin-form">
                                @csrf
                                <div class="form-group mt-3">
                                    <label for="fname">First Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('fname') }}" required>
                                </div>
                                @error('name')
                                    <span style="display: block;" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="form-group mt-3">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        name="phone" value="{{ old('phone') }}" required>
                                </div>
                                @error('lname')
                                    <span style="display: block;" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="form-group mt-3">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required>
                                </div>
                                @error('email')
                                    <span style="display: block;" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password-field" type="password" name="password" class="form-control"
                                        required>
                                </div>
                                @error('password')
                                    <span style="display: block;" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="form-group">
                                    <label for="password">Password Confimation</label>
                                    <input id="password-field" type="password" name="password_confirmation"
                                        class="form-control" required>
                                </div>
                                @error('password_confirmation')
                                    <span style="display: block;" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="form-group">
                                    <select class="form-control" name="city" aria-label="Default select example">
                                        <option value="Hobart">Hobart</option>
                                        <option value="Launceston">Launceston</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        name="address" value="{{ old('address') }}" required>
                                </div>
                                @error('address')
                                    <span style="display: block;" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="form-group">
                                    <div class="form-check ml-5">
                                        <input class="form-check-input" type="checkbox" name="is_student" value="1"
                                            id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Is Student
                                        </label>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <button type="submit"
                                        class="form-control btn btn-primary rounded submit px-3">Register</button>
                                </div>
                            </form>
                            <p class="text-center">Already have account? <a data-toggle="tab"
                                    href="{{ route('login') }}">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
