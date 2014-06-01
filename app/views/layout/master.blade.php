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

    <!-- <script src="//modernizr.com/downloads/modernizr-latest.js"></script> --> <!-- @todo Build production version. -->
</head>
<body>
<!--[if lte IE 8]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div id="content" class="container">
    <h2>Hartman Personality Profile <small>The People Code</small></h2>

    <p>The following information and self-assessment instrument come from Dr. Taylor Hartman’s <em>The People Code: It’s All About Your Innate Motive</em>.
        Tests will enable you to learn about yourself, your driving core motive and any secondary motives,
        and about all the core motives and how this knowledge can help you grow and develop your relationships, personally and professionally.</p>

    <h4>Ensure accurate results</h4>
    <ul>
        <li>Unless instructed otherwise, answer every question from your <strong>earliest recollections of how you were as a child</strong>.</li>
        <li>If you're unsure, <strong>ask others for feedback</strong>.</li>
        <li>Choose answers that reflect most of your <strong>thoughts and/or actions</strong>.</li>
        <li><strong>Be honest and don't skew your answers.</strong> The test has been used by millions for years to produce reliable insights.</li>
    </ul>

    @include('layout.partial.alert')

    @yield('content')
</div>

<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
<script src="/packages/jquery/js/jquery.min.js"></script>
<script src="/packages/bootstrap/js/bootstrap.min.js"></script>
<script src="/packages/color_code/js/color_code.js"></script>
</body>
</html>