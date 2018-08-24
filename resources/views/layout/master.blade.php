<!doctype html>
<html lang="{{ App::getLocale() }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/app.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Projet Nouveau Centre</title>
</head>
<body>
@include('partials.navbar')

<div class="offcanvas-outside">
    @yield('content')
</div>

@include('partials.footer')

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="/js/app.js"></script>
<script type="text/javascript" src="/js/markerclusterer/markerclusterer.js"></script>
</body>
</html>