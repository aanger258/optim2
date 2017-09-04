<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Page title -->
    <title>HOMER | WebApp admin theme</title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->

    <!-- Vendor styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::asset('vendor/css/metisMenu.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('vendor/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('vendor/css/bootstrap.css') }}" />

    <!-- App styles -->
    <link rel="stylesheet" href="{{ URL::asset('fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('vendor/css/helper.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('vendor/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('vendor/css/custom.css') }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>

</head>
<body class="fixed-navbar fixed-sidebar">

<!-- Simple splash screen-->
<div class="splash"> <div class="color-line"></div><div class="splash-title"><h1>Homer - Responsive Admin Theme</h1><p>Special Admin Theme for small and medium webapp with very clean and aesthetic style and feel. </p><div class="spinner"> <div class="rect1"></div> <div class="rect2"></div> <div class="rect3"></div> <div class="rect4"></div> <div class="rect5"></div> </div> </div> </div>
<!--[if lt IE 7]>
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

@include('partials.topbar')

@include('partials.sidebar')

@yield('content')

@include('partials.footer')

</div>

<!-- Vendor scripts -->
<script src="{{ URL::asset('vendor/js/jquery.min.js') }}" ></script>
<script src="{{ URL::asset('vendor/js/jquery-ui.min.js') }}"></script>
<script src="{{ URL::asset('vendor/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ URL::asset('vendor/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('vendor/js/jquery.flot.js') }}"></script>
<script src="{{ URL::asset('vendor/js/jquery.flot.resize.js') }}"></script>
<script src="{{ URL::asset('vendor/js/jquery.flot.pie.js') }}"></script>
<script src="{{ URL::asset('vendor/js/curvedLines.js') }}"></script>
<script src="{{ URL::asset('vendor/js/spline.js') }}"></script>
<script src="{{ URL::asset('vendor/js/metisMenu.min.js') }}"></script>
<script src="{{ URL::asset('vendor/js/icheck.min.js') }}"></script>
<script src="{{ URL::asset('vendor/js/jquery.peity.min.js') }}"></script>
<script src="{{ URL::asset('vendor/js/index.js') }}"></script>

<!-- App scripts -->
<script src="{{ URL::asset('vendor/js/homer.js') }}"></script>
<script src="{{ URL::asset('vendor/js/charts.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>



@yield('scripts')

</body>
</html>