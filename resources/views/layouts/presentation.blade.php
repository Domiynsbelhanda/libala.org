<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Bienvenue sur Libala.org</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">

    <meta name="description"
          content="Organisez votre mariage avec élégance. Invitations, placement des invités, planification – tout en ligne.">
    <meta name="keywords" content="mariage, invitation mariage, gestion invités, libala, Congo, digital wedding">
    <meta name="author" content="Wedding Manager">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph (Facebook, WhatsApp, LinkedIn) -->
    <meta property="og:title" content="Wedding Manager – Invitations de mariage digitales">
    <meta property="og:description"
          content="Créez et gérez vos invitations de mariage en ligne. Simple, rapide et élégant.">
    <meta property="og:image" content="{{ asset('images/wedding-cover.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Wedding Manager">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Wedding Manager – Invitations de mariage digitales">
    <meta name="twitter:description"
          content="Organisez le plus beau jour de votre vie avec des invitations modernes et personnalisées.">
    <meta name="twitter:image" content="{{ asset('images/wedding-cover.jpg') }}">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('presentation/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Bootstrap Icon CSS -->
    <link href="{{ asset('presentation/css/bootstrap-icons.css') }}" rel="stylesheet">
    <!-- Swiper slider CSS -->
    <link rel="stylesheet" href="{{ asset('presentation/css/swiper-bundle.min.css') }}">
    <!--Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('presentation/css/nice-select.css') }}">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('presentation/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('presentation/css/jquery.fancybox.min.css') }}">
    <!-- BoxIcon  CSS -->
    <link href="{{ asset('presentation/css/boxicons.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('presentation/css/style.css') }}">
    <!-- Title -->
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/gif" sizes="20x20">

    <link rel="shortcut icon" href="{{asset('favicon.png')}}" type="image/x-icon">

    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>


</head>

<body id="body" class="tt-magic-cursor">

<div id="magic-cursor">
    <div id="ball"></div>
</div>

<!-- Header Start -->
<div class="topbar-header-wrap">
    <div class="container">
        <div class="topbar-area">
            <div class="container d-flex align-items-center justify-content-between flex-nowrap">
                <div class="contact-area">
                    <ul>
                        <li>
                            <svg width="18" height="14" viewBox="0 0 18 14" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.666 11.9987H13.9993V4.70703L8.99935 7.83203L3.99935 4.70703V11.9987H2.33268V1.9987H3.33268L8.99935 5.54036L14.666 1.9987H15.666M15.666 0.332031H2.33268C1.40768 0.332031 0.666016 1.0737 0.666016 1.9987V11.9987C0.666016 12.4407 0.84161 12.8646 1.15417 13.1772C1.46673 13.4898 1.89065 13.6654 2.33268 13.6654H15.666C16.108 13.6654 16.532 13.4898 16.8445 13.1772C17.1571 12.8646 17.3327 12.4407 17.3327 11.9987V1.9987C17.3327 1.55667 17.1571 1.13275 16.8445 0.820186C16.532 0.507626 16.108 0.332031 15.666 0.332031Z"/>
                            </svg>
                            <a href="mailito:reservation@libala.org"><span
                                    class="__cf_email__" data-cfemail="89e0e7efe6c9ecf1e8e4f9e5eca7eae6e4">
                                    reservation@libala.org
                                </span>
                            </a>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14.625 15.5C12.8889 15.5 11.1736 15.1214 9.47917 14.3642C7.78472 13.6069 6.24306 12.5342 4.85417 11.1458C3.46528 9.75694 2.3925 8.21528 1.63583 6.52083C0.879167 4.82639 0.500556 3.11111 0.5 1.375C0.5 1.125 0.583333 0.916667 0.75 0.75C0.916667 0.583333 1.125 0.5 1.375 0.5H4.75C4.94444 0.5 5.11806 0.566111 5.27083 0.698333C5.42361 0.830555 5.51389 0.986667 5.54167 1.16667L6.08333 4.08333C6.11111 4.30556 6.10417 4.49306 6.0625 4.64583C6.02083 4.79861 5.94444 4.93056 5.83333 5.04167L3.8125 7.08333C4.09028 7.59722 4.42 8.09361 4.80167 8.5725C5.18333 9.05139 5.60361 9.51333 6.0625 9.95833C6.49306 10.3889 6.94444 10.7883 7.41667 11.1567C7.88889 11.525 8.38889 11.8617 8.91667 12.1667L10.875 10.2083C11 10.0833 11.1633 9.98944 11.365 9.92667C11.5667 9.86389 11.7644 9.84667 11.9583 9.875L14.8333 10.4583C15.0278 10.5139 15.1875 10.6147 15.3125 10.7608C15.4375 10.9069 15.5 11.07 15.5 11.25V14.625C15.5 14.875 15.4167 15.0833 15.25 15.25C15.0833 15.4167 14.875 15.5 14.625 15.5ZM3.02083 5.5L4.39583 4.125L4.04167 2.16667H2.1875C2.25694 2.73611 2.35417 3.29861 2.47917 3.85417C2.60417 4.40972 2.78472 4.95833 3.02083 5.5ZM10.4792 12.9583C11.0208 13.1944 11.5731 13.3819 12.1358 13.5208C12.6986 13.6597 13.2644 13.75 13.8333 13.7917V11.9583L11.875 11.5625L10.4792 12.9583Z"/>
                            </svg>
                            <a href="tel:+243818045132">+243 818 045 132</a>
                        </li>
                    </ul>
                </div>
                <ul class="social-area">
                    <li><a href="#"><i class='bx bxl-facebook'></i></a></li>
                    <li><a href="#"><i class="bi bi-twitter-x"></i></a></li>
                    <li><a href="#"><i class='bx bxl-linkedin'></i></a></li>
                    <li><a href="#"><i class='bx bxl-instagram'></i></a></li>
                </ul>
            </div>
        </div>

        <header class="header-area style-1">
            <div class="container d-flex align-items-center justify-content-between flex-nowrap">
                <div class="header-logo">
                    <a href="{{route('home')}}">
                        <img alt="image" class="img-fluid" src="{{asset('logo.svg')}}"></a>
                </div>
                <div class="nav-right-wrap">
                    <div class="main-menu">
                        <div class="mobile-logo-area d-lg-none d-flex align-items-center justify-content-between">
                            <div class="mobile-logo-wrap">
                                <a href="{{route('home')}}"><img alt="image" src="{{asset('logo.svg')}}"></a>
                            </div>
                            <div class="menu-close-btn">
                                <svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M7.43653 6.14234L11.629 1.94982L10.2148 0.535607L6.02231 4.72813L1.9273 0.633114L0.513085 2.04733L4.6081 6.14234L0.513085 10.2374L1.9273 11.6516L6.02231 7.55656L10.2148 11.7491L11.629 10.3349L7.43653 6.14234Z"/>
                                </svg>
                            </div>
                        </div>
                        <ul class="menu-list">
                            <li>
                                <a href="#accueil" class="drop-down">
                                    Accueil
                                </a>
                            </li>

                            <li>
                                <a href="#fonctionnalite" class="drop-down">
                                    Fonctionnalités
                                </a>
                            </li>

                            <li>
                                <a href="#tarification" class="drop-down">
                                    Tarifs
                                </a>
                            </li>

                            <li>
                                <a href="#models" class="drop-down">
                                    Modèles
                                </a>
                            </li>

                            <li>
                                <a href="{{route('invitation.check.form')}}" class="drop-down">
                                    Vérifier Invitation
                                </a>
                            </li>
                        </ul>
                        <ul class="contact-area d-lg-none d-flex">
                            <li>
                                <svg width="18" height="14" viewBox="0 0 18 14" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.666 11.9987H13.9993V4.70703L8.99935 7.83203L3.99935 4.70703V11.9987H2.33268V1.9987H3.33268L8.99935 5.54036L14.666 1.9987H15.666M15.666 0.332031H2.33268C1.40768 0.332031 0.666016 1.0737 0.666016 1.9987V11.9987C0.666016 12.4407 0.84161 12.8646 1.15417 13.1772C1.46673 13.4898 1.89065 13.6654 2.33268 13.6654H15.666C16.108 13.6654 16.532 13.4898 16.8445 13.1772C17.1571 12.8646 17.3327 12.4407 17.3327 11.9987V1.9987C17.3327 1.55667 17.1571 1.13275 16.8445 0.820186C16.532 0.507626 16.108 0.332031 15.666 0.332031Z"/>
                                </svg>
                                <a href="mailito:reservation@libala.org"><span
                                        class="__cf_email__" data-cfemail="70191e161f301508111d001c155e131f1d">
                                        reservation@libala.org</span></a>
                            </li>
                            <li>
                                <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.625 15.5C12.8889 15.5 11.1736 15.1214 9.47917 14.3642C7.78472 13.6069 6.24306 12.5342 4.85417 11.1458C3.46528 9.75694 2.3925 8.21528 1.63583 6.52083C0.879167 4.82639 0.500556 3.11111 0.5 1.375C0.5 1.125 0.583333 0.916667 0.75 0.75C0.916667 0.583333 1.125 0.5 1.375 0.5H4.75C4.94444 0.5 5.11806 0.566111 5.27083 0.698333C5.42361 0.830555 5.51389 0.986667 5.54167 1.16667L6.08333 4.08333C6.11111 4.30556 6.10417 4.49306 6.0625 4.64583C6.02083 4.79861 5.94444 4.93056 5.83333 5.04167L3.8125 7.08333C4.09028 7.59722 4.42 8.09361 4.80167 8.5725C5.18333 9.05139 5.60361 9.51333 6.0625 9.95833C6.49306 10.3889 6.94444 10.7883 7.41667 11.1567C7.88889 11.525 8.38889 11.8617 8.91667 12.1667L10.875 10.2083C11 10.0833 11.1633 9.98944 11.365 9.92667C11.5667 9.86389 11.7644 9.84667 11.9583 9.875L14.8333 10.4583C15.0278 10.5139 15.1875 10.6147 15.3125 10.7608C15.4375 10.9069 15.5 11.07 15.5 11.25V14.625C15.5 14.875 15.4167 15.0833 15.25 15.25C15.0833 15.4167 14.875 15.5 14.625 15.5ZM3.02083 5.5L4.39583 4.125L4.04167 2.16667H2.1875C2.25694 2.73611 2.35417 3.29861 2.47917 3.85417C2.60417 4.40972 2.78472 4.95833 3.02083 5.5ZM10.4792 12.9583C11.0208 13.1944 11.5731 13.3819 12.1358 13.5208C12.6986 13.6597 13.2644 13.75 13.8333 13.7917V11.9583L11.875 11.5625L10.4792 12.9583Z"/>
                                </svg>
                                <a href="tel:+243818045132">+243 818 045 132</a>
                            </li>
                        </ul>
                        <div class="btn-area d-lg-none d-flex">
                            <a href="{{route('event.login.form')}}" class="primary-btn" data-text="Gerer Votre Mariage"><span>Gerer Votre Mariage</span></a>
                        </div>
                    </div>
                    <div class="nav-right d-flex jsutify-content-end align-items-center">
                        <a href="{{route('event.login.form')}}" class="primary-btn d-lg-flex d-none" data-text="Manage Your Weeding"><span>Gerer Votre Mariage</span></a>
                        <div class="sidebar-button mobile-menu-btn">
                            <svg class="sidebar-toggle-button" width="25" height="25" viewBox="0 0 18 18"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1.29608 0.0658336C0.609639 0.31147 0.139209 0.899069 0.0432028 1.63598C-0.0144009 2.09353 -0.0144009 5.4939 0.0432028 5.95146C0.129608 6.59686 0.489632 7.11703 1.07047 7.42046L1.36329 7.57458H3.83545H6.30761L6.59563 7.42046C6.96525 7.2278 7.25807 6.93401 7.45008 6.56314L7.60369 6.27416V3.79372V1.31328L7.45008 1.02429C7.25807 0.653433 6.96525 0.359633 6.59563 0.166978L6.30761 0.0128531L3.90745 0.00322056C1.83372 -0.00641251 1.4785 0.00322056 1.29608 0.0658336ZM6.2356 0.802741C6.52842 0.956866 6.65803 1.08209 6.79244 1.34699L6.90765 1.57336V3.80817V6.03816L6.74924 6.29824C6.53322 6.66429 6.2068 6.85694 5.74117 6.90029C5.54916 6.91956 4.55549 6.92437 3.52343 6.91474L1.65131 6.90029L1.41129 6.77025C1.12807 6.62094 1.00807 6.49571 0.854455 6.20191L0.739248 5.98518V3.79372V1.60226L0.854455 1.38552C1.05607 0.995397 1.33929 0.778659 1.74731 0.706413C1.85292 0.687148 2.85618 0.677515 3.97946 0.677515L6.01959 0.687148L6.2356 0.802741Z"></path>
                                <path
                                    d="M11.6647 0.0658336C10.9783 0.31147 10.5079 0.899069 10.4119 1.63598C10.3879 1.82863 10.3687 2.80154 10.3687 3.79372C10.3687 4.7859 10.3879 5.75881 10.4119 5.95146C10.4983 6.59686 10.8583 7.11703 11.4391 7.42046L11.7319 7.57458H14.2041H16.6763L16.9643 7.42046C17.3339 7.2278 17.6267 6.93401 17.8187 6.56314L17.9723 6.27416V3.79372V1.31328L17.8187 1.02429C17.6267 0.653433 17.3339 0.359633 16.9643 0.166978L16.6763 0.0128531L14.2761 0.00322056C12.2024 -0.00641251 11.8471 0.00322056 11.6647 0.0658336ZM16.6043 0.802741C16.9019 0.956866 17.0267 1.08209 17.1611 1.35181L17.2811 1.583L17.2763 3.79854C17.2763 5.73472 17.2667 6.03816 17.1995 6.1682C17.0555 6.45237 16.9067 6.61131 16.6475 6.7558L16.3882 6.90029H14.2041H12.02L11.7799 6.77025C11.4967 6.62094 11.3767 6.49571 11.2231 6.20191L11.1079 5.98518V3.79372V1.60226L11.2231 1.38552C11.4247 0.995397 11.7079 0.778659 12.116 0.706413C12.2216 0.687148 13.2248 0.677515 14.3481 0.677515L16.3882 0.687148L16.6043 0.802741Z"></path>
                                <path
                                    d="M1.29608 10.4693C0.609639 10.7149 0.139209 11.3025 0.0432028 12.0394C-0.0144009 12.497 -0.0144009 15.8973 0.0432028 16.3549C0.129608 17.0003 0.489632 17.5205 1.07047 17.8239L1.36329 17.978H3.83545H6.30761L6.59563 17.8239C6.96525 17.6312 7.25807 17.3374 7.45008 16.9666L7.60369 16.6776V14.1972V11.7167L7.45008 11.4277C7.25807 11.0569 6.96525 10.7631 6.59563 10.5704L6.30761 10.4163L3.90745 10.4067C1.83372 10.397 1.4785 10.4067 1.29608 10.4693ZM6.2356 11.2062C6.52842 11.3603 6.65803 11.4855 6.79244 11.7504L6.90765 11.9768V14.2116V16.4416L6.74924 16.7017C6.53322 17.0677 6.2068 17.2604 5.74117 17.3037C5.54916 17.323 4.55549 17.3278 3.52343 17.3182L1.65131 17.3037L1.41129 17.1737C1.12807 17.0244 1.00807 16.8992 0.854455 16.6054L0.739248 16.3886V14.1972V12.0057L0.854455 11.789C1.05607 11.3988 1.33929 11.1821 1.74731 11.1099C1.85292 11.0906 2.85618 11.081 3.97946 11.081L6.01959 11.0906L6.2356 11.2062Z"></path>
                                <path
                                    d="M13.2441 10.4934C11.8856 10.8498 10.8583 11.8853 10.5079 13.2531C10.3735 13.7781 10.3735 14.6162 10.5079 15.1412C10.8343 16.4127 11.732 17.3808 12.9945 17.8239C13.3593 17.9491 13.4937 17.9732 14.0601 17.9925C14.617 18.0117 14.7754 17.9973 15.1162 17.9106C16.5179 17.5542 17.5452 16.5283 17.9052 15.1219C18.0348 14.6162 18.03 13.7685 17.9004 13.2531C17.55 11.8757 16.5179 10.8401 15.145 10.4885C14.6314 10.3585 13.7529 10.3585 13.2441 10.4934ZM15.2314 11.2784C15.7066 11.4518 16.0475 11.6782 16.4363 12.0828C17.0075 12.6848 17.2763 13.3639 17.2763 14.2068C17.2763 15.0882 17.0075 15.7288 16.3691 16.3645C15.721 17.0099 15.0826 17.2796 14.2186 17.2845C13.7001 17.2845 13.3113 17.193 12.8121 16.957C12.5336 16.8221 12.3608 16.692 12.0392 16.3694C11.396 15.724 11.132 15.0882 11.132 14.1972C11.132 13.3495 11.396 12.6896 11.972 12.0828C12.3608 11.6782 12.7017 11.4518 13.1817 11.2736C13.7913 11.0521 14.6218 11.0521 15.2314 11.2784Z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
</div>
<!-- Header End -->
@yield('content')

<!-- Home1 Footer Section Start -->
<footer class="footer-section">
    <div class="container">
        <div class="footer-btm-area">
            <p><a href="https://youne.studio/">Youne Studio.</a> @ 2025. All Rights Reserved.</p>
        </div>
    </div>
</footer>
<!-- Home1 Footer Section End -->

<!--  Main jQuery  -->
<script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{ asset('presentation/js/jquery-3.7.1.min.js') }}"></script>
<!-- Popper and Bootstrap JS -->
<script src="{{ asset('presentation/js/popper.min.js') }}"></script>
<script src="{{ asset('presentation/js/bootstrap.min.js') }}"></script>
<!-- Swiper slider JS -->
<script src="{{ asset('presentation/js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('presentation/js/slick.min.js') }}"></script>
<!-- Waypoints JS -->
<script src="{{ asset('presentation/js/waypoints.min.js') }}"></script>
<!-- Counterup JS -->
<script src="{{ asset('presentation/js/jquery.counterup.min.js') }}"></script>
<!-- Nice Select JS -->
<script src="{{ asset('presentation/js/jquery.nice-select.min.js') }}"></script>
<!-- Fancybox JS -->
<script src="{{ asset('presentation/js/jquery.fancybox.min.js') }}"></script>
<!-- Wow JS -->
<script src="{{ asset('presentation/js/wow.min.js') }}"></script>
<!-- Marquee JS -->
<script src="{{ asset('presentation/js/jquery.marquee.min.js') }}"></script>
<!-- GSAP JS -->
<script src="{{ asset('presentation/js/gsap.min.js') }}"></script>
<script src="{{ asset('presentation/js/ScrollTrigger.min.js') }}"></script>
<script src="{{ asset('presentation/js/simpleParallax.min.js') }}"></script>
<!-- <script src="{{ asset('presentation/js/SmoothScroll.js') }}"></script> -->
<script src="{{ asset('presentation/js/TweenMax.min.js') }}"></script>
<script src="{{ asset('presentation/js/SplitText.min.js') }}"></script>

<script src="{{ asset('presentation/js/main.js') }}"></script>


</body>
</html>
