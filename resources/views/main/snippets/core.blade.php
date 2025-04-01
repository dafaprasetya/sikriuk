<!DOCTYPE html>
<html lang="en">
    <!--<< Header Area >>-->
    <head>
        <!-- ========== Meta Tags ========== -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="modinatheme">
        <meta name="description" content="{{ $about->deskripsi }}">
        <!-- ======== Page title ============ -->
        <title>{{ $about->nama }}</title>
        <!--<< Favcion >>-->
        <link rel="shortcut icon" href="{{ asset('img/logo/Favicon.png') }}">
        <!--<< Bootstrap min.css >>-->
        <link rel="stylesheet" href="{{ asset('foodking/assets/css/bootstrap.min.css') }}">
        <!--<< Font Awesome.css >>-->
        <link rel="stylesheet" href="{{ asset('foodking/assets/css/font-awesome.css') }}">
        <!--<< Animate.css >>-->
        <link rel="stylesheet" href="{{ asset('foodking/assets/css/animate.css') }}">
        <!--<< Magnific Popup.css >>-->
        <link rel="stylesheet" href="{{ asset('foodking/assets/css/magnific-popup.css') }}">
        <!--<< MeanMenu.css >>-->
        <link rel="stylesheet" href="{{ asset('foodking/assets/css/meanmenu.css') }}">
        <!--<< Swiper Bundle.css >>-->
        <link rel="stylesheet" href="{{ asset('foodking/assets/css/swiper-bundle.min.css') }}">
        <!--<< Nice Select.css >>-->
        <link rel="stylesheet" href="{{ asset('foodking/assets/css/nice-select.css') }}">
        <!--<< Main.css >>-->
        <link rel="stylesheet" href="{{ asset('foodking/assets/css/main.css') }}">
        <!--<< Style.css >>-->
        <link rel="stylesheet" href="{{ asset('foodking/style.css') }}">
    </head>
    <body>
        @yield('content')
        <!--<< All JS Plugins >>-->
        <script src="{{ asset('foodking/assets/js/jquery-3.7.1.min.js') }}"></script>
        <!--<< Viewport Js >>-->
        <script src="{{ asset('foodking/assets/js/viewport.jquery.js') }}"></script>
        <!--<< Bootstrap Js >>-->
        <script src="{{ asset('foodking/assets/js/bootstrap.bundle.min.js') }}"></script>
        <!--<< Nice Select Js >>-->
        <script src="{{ asset('foodking/assets/js/jquery.nice-select.min.js') }}"></script>
        <!--<< Waypoints Js >>-->
        <script src="{{ asset('foodking/assets/js/jquery.waypoints.js') }}"></script>
        <!--<< Counterup Js >>-->
        <script src="{{ asset('foodking/assets/js/jquery.counterup.min.js') }}"></script>
        <!--<< Swiper Slider Js >>-->
        <script src="{{ asset('foodking/assets/js/swiper-bundle.min.js') }}"></script>
        <!--<< MeanMenu Js >>-->
        <script src="{{ asset('foodking/assets/js/jquery.meanmenu.min.js') }}"></script>
        <!--<< CountDown Js >>-->
        <script src="{{ asset('foodking/assets/js/countdowncustom.js') }}"></script>
        <!--<< Magnific Popup Js >>-->
        <script src="{{ asset('foodking/assets/js/jquery.magnific-popup.min.js') }}"></script>
        <!--<< GSAP Animation Js >>-->
        <script src="{{ asset('foodking/assets/js/animation.js') }}"></script>
        <!--<< Wow Animation Js >>-->
        <script src="{{ asset('foodking/assets/js/wow.min.js') }}"></script>
        <!--<< Main.js >>-->
        <script src="{{ asset('foodking/assets/js/main.js') }}"></script>
    </body>
</html>
