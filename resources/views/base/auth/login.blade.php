<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{config('app.name')}} | Log in</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('base/css/app.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// --><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="{{route('base.login')}}">{{config('app.name')}}</a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="{{route('base.login')}}" method="post">
            @csrf
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Email">
                <span class="fa fa-envelope form-control-feedback"></span> @error('email')
                <p class="help-block text-red text-bold">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="fa fa-lock form-control-feedback"></span> @error('password')
                <p class="help-block text-red text-bold">{{$message}}</p>
                @enderror
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label> <input type="checkbox"> Remember Me </label>
                    </div>
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
            </div>
        </form>

        <a href="#">I forgot my password</a><br>

    </div>
</div>

<script src="{{asset('base/js/app.js')}}"></script>
</body>
</html>
