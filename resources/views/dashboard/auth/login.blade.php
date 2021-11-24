<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/css/main.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - Graduation Project</title>
</head>
<body>
<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    <div class="logo">
        <h1> Graduation Project </h1>
    </div>
    <div class="login-box">
        <form class="login-form" method="POST" action="{{route('login')}}">
            @csrf
            @method('POST')
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
            <div class="form-group">
                <label class="control-label">Email</label>
                <input name="email" class="form-control" type="text" placeholder="Email" autofocus>
            </div>
            <div class="form-group">
                <label class="control-label">Password</label>
                <input class="form-control" name="password" type="password" placeholder="Password">
            </div>
            <div class="form-group">
                <div class="utility">
                    <div class="animated-checkbox">
                        <label>
                            <input type="checkbox" name="remember_token"><span class="label-text">Stay Signed in</span>
                        </label>
                    </div>
                    <div class="toggle-flip">
                        <label>
                            <input name="role" type="checkbox"><span class="flip-indecator" data-toggle-on="Doctor" data-toggle-off="Admin"></span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
            </div>
        </form>

    </div>
</section>
<!-- Essential javascripts for application to work-->
<script src="{{ asset('dashboard_files/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('dashboard_files/js/popper.min.js') }}"></script>
<script src="{{ asset('dashboard_files/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('dashboard_files/js/main.js') }}"></script>
</body>
</html>
