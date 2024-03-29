<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('concept')}}/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="{{asset('concept')}}/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('concept')}}/assets/libs/css/style.css">
    <link rel="stylesheet" href="{{asset('concept')}}/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="{{asset('concept')}}/index.html"><img class="logo-img" src="{{asset('concept')}}/assets/images/logo.png" alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
                <form action="{{route('frontend.user.login')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" type="text" placeholder="email" name="email" autocomplete="on">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" type="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
                @if($errors->count())
                    @foreach ($errors->all() as $error)
                    <ul class="parsley-errors-list filled"><li class="parsley-required">{{$error}}</li></ul>
                    @endforeach
                @endif
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="{{route('frontend.user.registration')}}" class="footer-link">Create An Account</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="{{asset('concept')}}/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="{{asset('concept')}}/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>