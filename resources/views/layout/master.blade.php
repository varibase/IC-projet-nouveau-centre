<!doctype html>
<html lang="{{ App::getLocale() }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-136825518-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-136825518-1');
    </script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#f1ede9">
    <link rel="manifest" href="{{url('/manifest.json')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/app.css?v=2">
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
<script src="/js/app.js?v=2"></script>
<script type="text/javascript" src="/js/markerclusterer/markerclusterer.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript" src="/js/vanillaTextMask.js"></script>
<script type="text/javascript" src="/js/jquery.matchHeight-min.js"></script>
<script>
    $(document).keypress(function(e) {
        if(e.which == 13) {
            e.preventDefault();
            if($('#call2action').length){
                $('#call2action').click();
            }
        }
    });
    $('#actionModal').on('shown.bs.modal', function (e) {
        $('html').addClass('freezePage');
        $('body').addClass('freezePage');
    });
    $('#actionModal').on('hidden.bs.modal', function (e) {
        $('html').removeClass('freezePage');
        $('body').removeClass('freezePage');
    });
</script>
<script type="text/javascript">
    // Initialize the service worker
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/sw.js', {
            scope: '.'
        }).then(function (registration) {
            // Registration was successful
            console.log('Laravel PWA: ServiceWorker registration successful with scope: ', registration.scope);
        }, function (err) {
            // registration failed :(
            console.log('Laravel PWA: ServiceWorker registration failed: ', err);
        });
    }
</script>
</body>
</html>