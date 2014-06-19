<!doctype html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Color Code Personality Test</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="/packages/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/packages/color_code/css/color_code.css" />
</head>
<body>
<!--[if lte IE 8]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div id="content" class="container">
    <h2>Hartman Personality Profile <small>The People Code</small></h2>

    @include('layout.partial.alert')

    @yield('content')

    <p class="copyright text-muted text-center">A little Web app by <a href="http://www.qmcree.com">Quentin McRee</a>. Personality assessment
        <span class="glyphicon glyphicon-copyright-mark"></span> Dr. Taylor Hartman and Robert S. Hartman Institute.</p>
</div>

@section('scripts')
<script src="/packages/script_js/js/script.min.js"></script>
<script src="/packages/color_code/js/color_code.js"></script>
@show

</body>
</html>