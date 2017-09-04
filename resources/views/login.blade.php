<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Page title -->
    <title>HOMER | WebApp admin theme</title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->

    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{ URL::asset('vendor/css/font-awesome.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('vendor/css/metisMenu.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('vendor/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('vendor/css/bootstrap.css') }}" />

    <!-- App styles -->
    <link rel="stylesheet" href="{{ URL::asset('vendor/css/pe-icon-7-stroke.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('vendor/css/helper.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('vendor/css/style.css') }}">

</head>
<body class="blank">
<!--[if lt IE 7]>
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="color-line"></div>

<div class="login-container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md">
                <h3>PLEASE LOGIN </h3>
            </div>
            <div class="hpanel">
                <div class="panel-body">
                        <form action="{{ action('LoginController@login') }}" method="post" id="loginForm">
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="username" title="Please enter you username" required name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="password" required="" name="password" id="password" class="form-control">
                            </div>

                            {{ csrf_field() }}
                            <p style="color:red">{{ $error or '' }}</p>

                            <button class="btn btn-success btn-block">Login</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Vendor scripts -->
<script src="{{ URL::asset('vendor/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('vendor/js/jquery-ui.min.js') }}"></script>
<script src="{{ URL::asset('vendor/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ URL::asset('vendor/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('vendor/js/metisMenu.min.js') }}"></script>
<script src="{{ URL::asset('vendor/js/icheck.min.js') }}"></script>
<script src="{{ URL::asset('vendor/js/index.js') }}"></script>

<!-- App scripts -->
<script src="{{ URL::asset('vendor/js/homer.js') }}"></script>

</body>
</html>