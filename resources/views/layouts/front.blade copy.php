<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Collax - Creative Agency</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets') }}/front/assets/img/logo/favicon.png">

    <link rel="stylesheet" href="{{ asset('assets') }}/front/assets/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/front/assets/css/animate.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/front/assets/css/custom-animation.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/front/assets/css/swiper-bundle.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/front/assets/css/slick.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/front/assets/css/flaticon.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/front/assets/css/meanmenu.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/front/assets/css/font-awesome-pro.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/front/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/front/assets/css/spacing.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/front/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/front/assets/css/rtl.css">

    {{-- <link href="{{ asset('{{ asset('{{ asset('assets') }}/front/assets') }}/front/{{ asset('assets') }}/front/assets') }}/plugins/global/plugins.bundle.rtl.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('{{ asset('{{ asset('assets') }}/front/assets') }}/front/{{ asset('assets') }}/front/assets') }}/css/style.bundle.rtl.css" rel="stylesheet" type="text/css" />

    <script src="https://d3js.org/d3.v7.min.js"></script>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script> --}}

    @yield('styles')
    @yield('headerScripts')
    @livewireStyles
</head>

<body>

    @yield('content')


    <script src="{{ asset('assets') }}/front/assets/js/jquery.js"></script>
    <script src="{{ asset('assets') }}/front/assets/js/waypoints.js"></script>
    <script src="{{ asset('assets') }}/front/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/front/assets/js/swiper-bundle.js"></script>
    <script src="{{ asset('assets') }}/front/assets/js/slick.js"></script>
    <script src="{{ asset('assets') }}/front/assets/js/magnific-popup.js"></script>
    <script src="{{ asset('assets') }}/front/assets/js/counterup.js"></script>
    <script src="{{ asset('assets') }}/front/assets/js/wow.js"></script>
    <script src="{{ asset('assets') }}/front/assets/js/meanmenu.js"></script>
    <script src="{{ asset('assets') }}/front/assets/js/isotope-pkgd.js"></script>
    <script src="{{ asset('assets') }}/front/assets/js/imagesloaded-pkgd.js"></script>
    <script src="{{ asset('assets') }}/front/assets/js/ajax-form.js"></script>
    <script src="{{ asset('assets') }}/front/assets/js/main.js"></script>
    @livewireScripts
    @yield('footerScripts')
</body>

</html>
