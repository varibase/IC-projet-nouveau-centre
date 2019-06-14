<!doctype html> <!-- HTML5 -->

<html lang="{{ App::getLocale() }}" dir="ltr">

<head>
    <!-- Set character encoding for the document -->
    <meta charset="utf-8">

    <!-- Viewport for responsive web design -->
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    <!-- Document Title -->
    <title>{{ config('app.name') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Standard favicon -->
    <link rel="icon" type="image/x-icon" href="https://example.com/favicon.ico">
    <!-- Recommended favicon format (32px*32px) -->
    <link rel="icon" type="image/png" href="https://example.com/favicon.png">

    <!-- To run web application in full-screen -->
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- Status Bar Style (see Supported Meta Tags below for available values) -->
    <!-- Has no effect unless you have the previous meta tag -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css?v=2">
    @stack('styles')

</head>

<body style="overflow-x: hidden;">
<header>
    <div class="row">
        <div class="col">
                <img src="/img/ipad.jpg" alt="" style="width: 100%; height: auto;">
        </div>
    </div>
</header>
    @yield('content')
<footer>

</footer>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="/js/app.js?v=2"></script>
<script type="text/javascript" src="/js/markerclusterer/markerclusterer.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript" src="/js/vanillaTextMask.js"></script>
<script type="text/javascript" src="/js/jquery.matchHeight-min.js"></script>
@stack('scripts')
</body>

</html>