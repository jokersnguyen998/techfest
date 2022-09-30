<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Chợ công nghệ, thiết bị chuyên ngành nông nghiệp và công nghệ sau thu hoạch - TECHMART NÔNG NGHIỆP 2022
    </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <!-- Favicons -->
    <link href="{{ asset('adminlte/img/favicon.ico') }}" rel="icon" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />

    <!-- Google Fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" />

    <!-- Bootstrap CSS File -->
    <link rel="stylesheet" href="{{ asset('frontend/lib/bootstrap/css/bootstrap.min.css') }}" />

    <!-- Libraries CSS Files -->
    <link rel="stylesheet" href="{{ asset('frontend/lib/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/lib/animate/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/lib/ionicons/css/ionicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/lib/lightbox/css/lightbox.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

    <!-- Main Stylesheet File -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/lib/text-run/text-run.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/style1.css') }}" />
    @yield('css')
</head>


<body>
    @include('frontend.components.navbar')

    @yield('content')

    @include('frontend.components.fixed-content')

    @include('frontend.components.google-map')

    @include('frontend.components.back-to-top')

    <!-- JavaScript Libraries -->
    <script src="{{ asset('frontend/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/jquery/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/mobile-nav/mobile-nav.js') }}"></script>
    <script src="{{ asset('frontend/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <!-- Template Main Javascript File -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <!-- Myscript -->
    <script src="{{ asset('frontend/js/myscript.js') }}"></script>
    @yield('js')
</body>

</html>
