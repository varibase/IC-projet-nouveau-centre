<!doctype html>
<html lang="{{ App::getLocale() }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="manifest" href="{{url('/manifest.json')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/app.css">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript" src="/js/vanillaTextMask.js"></script>
<script type="text/javascript" src="/js/jquery.matchHeight-min.js"></script>
<script>
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', function() {
            navigator.serviceWorker.register('/service-worker.js').then(function(registration) {
                // Registration was successful
                console.log('ServiceWorker registration successful with scope: ', registration.scope);
            }, function(err) {
                // registration failed :(
                console.log('ServiceWorker registration failed: ', err);
            });
        });
    }
</script>
</body>
</html>