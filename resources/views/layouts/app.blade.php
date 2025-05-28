<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/><!-- /Added by HTTrack -->
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpOceans">
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/favicon.png')}}">

    <title> @yield('title') - Libala.org</title>

    <link href="{{asset('assets/css/themify-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/flaticon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/owl.theme.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/slick.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/slick-theme.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/swiper.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/nice-select.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/owl.transitions.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/jquery.fancybox.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/odometer-theme-default.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/jquery-ui.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/auth-pages.css')}}" rel="stylesheet">
    <link href="{{asset('assets/sass/style.css')}}" rel="stylesheet">


    <meta name="description" content="Organisez votre mariage avec élégance. Invitations, placement des invités, planification – tout en ligne.">
    <meta name="keywords" content="mariage, invitation mariage, gestion invités, libala, Congo, digital wedding">
    <meta name="author" content="Wedding Manager">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <meta name="description" content="@yield('description', 'Organisez votre mariage avec élégance et simplicité.')">
    <meta name="keywords" content="@yield('keywords', 'mariage, invitations, libala, Congo, digital wedding')">

    <!-- Open Graph -->
    <meta property="og:title" content="@yield('og_title', 'Wedding Manager – Invitations digitales')">
    <meta property="og:description" content="@yield('og_description', 'Gérez vos invités et événements de mariage en ligne.')">
    <meta property="og:image" content="@yield('og_image', asset('images/wedding-cover.jpg'))">
    <meta property="og:url" content="@yield('og_url', url()->current())">
    <meta property="og:type" content="website">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'Wedding Manager – Invitations digitales')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Invitations de mariage digitales au Congo.')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('images/wedding-cover.jpg'))">

    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .dancing-script {
            font-family: 'Dancing Script', cursive;
        }
    </style>
</head>
<body>

<!-- start page-wrapper -->
<div class="page-wrapper">
    <!-- start preloader -->
    <div class="preloader">
        <div class="vertical-centered-box">
            <div class="content">
                <div class="loader-circle"></div>
                <div class="loader-line-mask">
                    <div class="loader-line"></div>
                </div>
                <img src="{{asset('assets/images/preloader.gif')}}" alt="">
            </div>
        </div>
    </div>
    <!-- end preloader -->

{{--    @include('partials._header')--}}

    @yield('content')

    @include('partials._footer')

</div>
<!-- end of page-wrapper -->

<!-- All JavaScript files
================================================== -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<!-- Plugins for this template -->
<script src="{{asset('assets/js/modernizr.custom.js')}}"></script>
<script src="{{asset('assets/js/jquery.pointparallax.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-plugin-collection.js')}}"></script>
<script src="{{asset('assets/js/moving-animation.js')}}"></script>
<script src="{{asset('assets/js/tilt.jquery.min.js')}}"></script>
<!-- Custom script for this template -->
<script src="{{asset('assets/js/script.js')}}"></script>
</body>
</html>
