<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpOceans">
    <link rel="shortcut icon" type="image/png" href="{{asset('template2/images/favicon.png')}}">
    <title>{{$event->groom_name . ' & ' . $event->bride_name}} - Invitation de {{ $invitation->guest->name }}</title>
    <link href="{{asset('template2/css/themify-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('template2/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template2/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('template2/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template2/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('template2/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('template2/css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('template2/css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('template2/css/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('template2/css/swiper.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template2/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('template2/css/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{ asset('template2/css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('template2/css/jquery.fancybox.css') }}" rel="stylesheet">
    <link href="{{ asset('template2/css/odometer-theme-default.css') }}" rel="stylesheet">
    <link href="{{ asset('template2/css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('template2/sass/style.css') }}" rel="stylesheet">


    <meta name="description" content="Organisez votre mariage avec élégance. Invitations, placement des invités, planification – tout en ligne.">
    <meta name="keywords" content="mariage, invitation mariage, gestion invités, libala, Congo, digital wedding">
    <meta name="author" content="Wedding Manager">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <meta name="description" content="@yield('description', 'Organisez votre mariage avec élégance et simplicité.')">
    <meta name="keywords" content="@yield('keywords', 'mariage, invitations, libala, Congo, digital wedding')">

    <meta property="og:description" content="@yield('og_description', 'Gérez vos invités et événements de mariage en ligne.')">
    <meta property="og:image" content="@yield('og_image', asset('images/wedding-cover.jpg'))">
    <meta property="og:url" content="@yield('og_url', url()->current())">
    <meta property="og:type" content="website">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'Wedding Manager – Invitations digitales')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Invitations de mariage digitales au Congo.')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('images/wedding-cover.jpg'))">
</head>

<body>

<!-- start page-wrapper -->
<div class="page-wrap">
    <!-- start preloader -->
    <div class="preloader">
        <div class="vertical-centered-box">
            <div class="content">
                <div class="loader-circle"></div>
                <div class="loader-line-mask">
                    <div class="loader-line"></div>
                </div>
                <img src="{{asset('template2/images/preloader.png')}}" alt="">
            </div>
        </div>
    </div>
    <!-- end preloader -->

    <!-- start of hero -->
    <section class="static-hero">
        <div class="static-main-box">
            <div class="static-inner-box">
                <div class="container">
                    <div class="row">
                        <div class="col col-xl-6 col-lg-6 col-12">
                            <div class="static-hero-img">
                                <img class="wow fadeInLeftSlow" data-wow-duration="1500ms"
                                     src="{{ asset('storage/' . $event->couple_photo) }}" alt="">
                                <div class="hero-img-inner-shape">
                                    <svg viewBox="0 0 550 814" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M520 0.804281C529.932 0.270383 539.935 0 550 0V30V784V814H520H30.0002H0.000244141V784V550C0.000244141 256.309 230.195 16.3825 520 0.804281ZM95 298.06C85.7573 314.717 77.4026 331.934 70 349.649V784H95V298.06ZM119 258.979V784H144V225.064C135.224 236.015 126.882 247.329 119 258.979ZM192 784H168V197.185C175.733 188.816 183.738 180.702 192 172.857V784ZM215 784H241V131.725C232.112 138.302 223.441 145.156 215 152.273V784ZM290 784H264V115.645C272.496 110.04 281.166 104.677 290 99.5667V784ZM314 784H338.25V74.9247C330.053 78.5841 321.967 82.4494 314 86.5141V784ZM386.834 784H362.084V64.992C370.236 61.8311 378.488 58.8699 386.834 56.1142V784ZM410.667 784H434.5V42.8728C426.484 44.6909 418.538 46.6941 410.667 48.8779V784ZM481.25 784H458.334V38.0538C465.917 36.7051 473.557 35.5207 481.25 34.5046V784ZM505.084 784H520V30.8509C515.009 31.1348 510.036 31.4892 505.084 31.9129V784ZM30.0002 550C30.0002 504.255 35.9072 459.889 47 417.624V784H30.0002V550Z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="col col-xl-6 col-lg-6 col-12">
                            <div class="wpo-static-hero-text-box">
                                <div>
                                    <h2 class="dancing-script">
                                        Save the Date
                                    </h2>
                                </div>

                                <div class="slide-title">
                                    <h2 class="poort-text poort-in-up">
                                        {{$event->groom_name}} & {{$event->bride_name}}
                                    </h2>
                                </div>
                                <div class="slide-date wow fadeInUp" data-wow-duration="1600ms">
                                    <p style="font-size: 120%!important;">
                                        {{ mb_strtoupper(\Carbon\Carbon::parse($event->wedding_date)->translatedFormat('l d F Y')) }}
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-shape wow fadeInUp" data-wow-duration="1400ms">
                <img src="{{asset('template2/images/slider/bottom-image.png')}}" alt="">
            </div>
        </div>
    </section>
    <!-- end of hero slider -->

    <!-- start wpo-wedding-date -->
    <section class="wpo-wedding-date section-padding">
        <h2 class="d-none">hidden</h2>
        <div class="container">
            <div class="wedding-date-wrap">
                <div class="clock-grids">
                    <div id="clock"></div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end wpo-wedding-date-s3-->

    <!-- start wpo-story-section -->
    <section class="wpo-story-section section-padding pb-0" id="story">
        <div class="container">
            <div class="wpo-section-title">
                <h4 class="poort-text poort-in-right">Notre Programme</h4>
            </div>

            @php
                $eventCount = collect([
                    $event->civil_date || $event->civil_time || $event->civil_commune,
                    $event->church_name || $event->church_date || $event->church_time,
                    $event->reception_date || $event->reception_time || $event->reception_hall,
                ])->filter()->count();
            @endphp

            <div class="wpo-story-wrap">
                @if($event->civil_date && $event->civil_time && $event->civil_commune)
                    <div class="wpo-story-item">
                        <div class="row">
                            <div class="col col-lg-6 col-12">
                                <div class="wpo-story-img">
                                    <img src="{{ asset('images/civile.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col col-lg-6 col-12">
                                <div class="wpo-story-content">
                                    <div class="pin">
                                        <img src="{{ asset('template2/images/story/pin.svg') }}" alt="">
                                    </div>
                                    <i><img src="{{ asset('template2/images/story/f-shape-1.png') }}" alt=""></i>
                                    <h2>Mariage Civile</h2>
                                    <span>{{ mb_strtoupper(\Carbon\Carbon::parse($event->civil_date)->translatedFormat('l d F Y')) ?? '' }}</span>
                                    <p>
                                        <i class="fa-solid fa-clock"></i> {{ $event->civil_time ? \Carbon\Carbon::parse($event->civil_time)->format('H:i') : '' }}
                                        <br>
                                        <li>Commune : {{ $event->civil_commune }}</li>
                                    </p>
                                    <i><img src="{{ asset('template2/images/story/f-shape-2.png') }}" alt=""></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif


                @if($event->church_name && $event->church_date && $event->church_time)
                    <div class="wpo-story-item">
                            <div class="row">
                                <div class="col col-lg-6 col-12">
                                    <div class="wpo-story-img">
                                        <img src="{{ asset('images/eglise.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col col-lg-6 col-12">
                                    <div class="wpo-story-content">
                                        <div class="pin">
                                            <img src="{{ asset('template2/images/story/pin.svg') }}" alt="">
                                        </div>
                                        <i><img src="{{ asset('template2/images/story/f-shape-1.png') }}" alt=""></i>
                                        <h2>Mariage Religieux</h2>
                                        <span>
                                            {{ mb_strtoupper(\Carbon\Carbon::parse($event->church_date)->translatedFormat('l d F Y')) ?? '' }}
                                        </span>
                                        <p>
                                            {{ $event->church_time ? \Carbon\Carbon::parse($event->church_time)->format('H:i') : '' }}
                                            <br>
                                            {{ $event->church_name }}
                                            <br>
                                            {{ $event->church_address }}
                                        </p>
                                        <i><img src="{{ asset('template2/images/story/f-shape-2.png') }}" alt=""></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endif

                @if($event->reception_date && $event->reception_time && $event->reception_hall)
                    <div class="wpo-story-item">
                            <div class="row">
                                <div class="col col-lg-6 col-12">
                                    <div class="wpo-story-img">
                                        <img src="{{ asset('images/soiree.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col col-lg-6 col-12">
                                    <div class="wpo-story-content">
                                        <div class="pin">
                                            <img src="{{ asset('template2/images/story/pin.svg') }}" alt="">
                                        </div>
                                        <i><img src="{{ asset('template2/images/story/f-shape-1.png') }}" alt=""></i>
                                        <h2>Soirée</h2>
                                        <span>
                                            {{ mb_strtoupper(\Carbon\Carbon::parse($event->reception_date)->translatedFormat('l d F Y')) ?? '' }}
                                        </span>
                                        <p>
                                            {{ $event->reception_time ? \Carbon\Carbon::parse($event->reception_time)->format('H:i') : '' }}

                                            <br>

                                            {{ $event->reception_hall }}

                                            <br>

                                            {{ $event->reception_address }}
                                        </p>
                                        <i><img src="{{ asset('template2/images/story/f-shape-2.png') }}" alt=""></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endif

            </div>
        </div> <!-- end container -->
        <div class="flower-shape-1">
            <div class="flower-sticky">
                <img src="{{ asset('template2/images/story/shape1.png') }}" alt="">
            </div>
        </div>
        <div class="flower-shape-2">
            <div class="flower-sticky">
                <img src="{{ asset('template2/images/story/shape2.png') }}" alt="">
            </div>
        </div>
    </section>
    <!-- end story-section -->


    <!-- start of wpo-contact-section -->
    <section class="wpo-contact-section section-padding pt-0" id="rsvp">
        <div class="container-fluid">
            <div class="contact-wrap">
                <div class="row">
                    <div class="col col-xl-8 col-lg-7 col-md-12 col-12">
                        <div class="contact-img-wrap">
                            <div class="contact-img wow fadeInLeftSlow" data-wow-duration="1700ms">
                                <img src="{{asset('template2/images/rsvp/img-1.png')}}" alt="">
                            </div>
                            <div class="back-shape">
                                <svg viewBox="0 0 693 954" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15 346.5C15 163.418 163.418 15 346.5 15C529.582 15 678 163.418 678 346.5V939H15V346.5Z"
                                        stroke="#9F7B59" stroke-width="30" />
                                    <rect x="50" y="168" width="30" height="765" fill="#9F7B59" />
                                    <rect x="100" y="106" width="30" height="827" fill="#9F7B59" />
                                    <rect x="150" y="67" width="30" height="866" fill="#9F7B59" />
                                    <rect x="200" y="45" width="30" height="879" fill="#9F7B59" />
                                    <rect x="250" y="23" width="30" height="910" fill="#9F7B59" />
                                    <rect x="300" y="14" width="30" height="919" fill="#9F7B59" />
                                    <rect x="350" y="14" width="30" height="919" fill="#9F7B59" />
                                    <rect x="400" y="14" width="30" height="919" fill="#9F7B59" />
                                    <rect x="450" y="34" width="30" height="899" fill="#9F7B59" />
                                    <rect x="500" y="67" width="30" height="866" fill="#9F7B59" />
                                    <rect x="550" y="100" width="30" height="833" fill="#9F7B59" />
                                    <rect x="600" y="148" width="30" height="785" fill="#9F7B59" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="col col-xl-4 col-lg-5 col-md-12 col-12">
                        <div class="wpo-contact-section-wrapper wow fadeInRightSlow" data-wow-duration="1700ms">
                            <div class="wpo-contact-form-area">
                                <div class="wpo-section-title">
                                    <h2>Confirmez votre présence</h2>
                                </div>
                                <form method="POST" action="{{ route('guest.rsvp', [$event->reference, $invitation->code]) }}">
                                    @csrf

                                    <div class="radio-buttons mb-3">
                                        <p>
                                            <input type="radio" id="attend" name="is_attending" value="1" checked>
                                            <label for="attend">Oui, je serai présent(e)</label>
                                        </p>
                                        <p>
                                            <input type="radio" id="not" name="is_attending" value="0">
                                            <label for="not">Désolé(e), je ne pourrai pas venir</label>
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <label for="number_of_people">Nombre total de personnes (vous compris)</label>
                                        <select name="number_of_people" class="form-control" required>
                                            @for($i = 1; $i <= 5; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="additional_info">Autres informations</label>
                                        <textarea name="additional_info" class="form-control" rows="4" placeholder="Allergies, remarques, etc."></textarea>
                                    </div>

                                    <div class="submit-area">
                                        <button type="submit" class="theme-btn">Confirmer</button>
                                    </div>
                                </form>
                            </div>

                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="shape-1 wow fadeInLeftSlow" data-wow-duration="2000ms"><img
                        src="{{asset('template2/images/rsvp/left-shape.png')}}" alt=""></div>
                <div class="shape-2 wow fadeInRightSlow" data-wow-duration="2000ms"><img
                        src="{{asset('template2/images/rsvp/right-shape.png')}}" alt=""></div>
            </div>
        </div>
        <div class="bottom-text marquee">
            <h2>Nous vous attendons pour célébrer notre amour.</h2>
        </div>
    </section>
    <!-- end of wpo-contact-section -->

    <!-- start wpo-event-section -->
    <section class="wpo-event-section section-padding pt-0" id="event">
        <div class="container">
            <div class="wpo-section-title">
                <h2 class="poort-text poort-in-right">Invité (es) :</h2>
                <h4 style="font-size: 50px!important;" class="poort-text poort-in-right">{{ $invitation->guest->name }}</h4>
                <br>
                <h5 class="poort-text poort-in-right">Table : {{ $invitation->table->name }}</h5>
            </div>
            <div class="wpo-event-main">
                <div class="wpo-event-wrap">
                    <div class="wpo-event-inner">
                        <div class="wpo-event-item" style="display: flex; justify-content: center; align-items: center;">
                            {!! $qrcode !!}
                        </div>
                    </div>
                    <div class="shape-1"><img src="{{asset('template2/images/event/shape-1.png')}}" alt=""></div>
                    <div class="shape-2"><img src="{{asset('template2/images/event/shape-1.png')}}" alt=""></div>
                    <div class="shape-3"><img src="{{asset('template2/images/event/shape-2.png')}}" alt=""></div>
                </div>
            </div>

        </div> <!-- end container -->
    </section>
    <!-- end wpo-event-section -->

    <!-- end wpo-blog-section -->

    <!-- start of wpo-site-footer-section -->
    <footer class="wpo-site-footer">
        <div class="wpo-upper-footer">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col col-xl-12  col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="widget wpo-service-link-widget">
                            <div class="widget-title">
                                <h3>Contact </h3>
                            </div>
                            <div class="contact-ft">
                                <p><a href="mailto:reservation@libala.org">reservation@libala.org</a></p>
                                <p><a href="tel:+243996852377">+243996852377</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end container -->
        </div>
        <div class="wpo-lower-footer">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <p class="copyright"> &copy; Copyright 2025 | <a href="{{url('www.youne.studio')}}">Youne Studio.</a> | All right
                            reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end of wpo-site-footer-section -->

</div>
<!-- end of page-wrapper -->

<!-- All JavaScript files
================================================== -->
<script src="{{ asset('template2/js/jquery.min.js') }}"></script>
<script src="{{ asset('template2/js/bootstrap.bundle.min.js') }}"></script>
<!-- Plugins for this template -->
<script src="{{ asset('template2/js/modernizr.custom.js') }}"></script>
<script src="{{ asset('template2/js/jquery-plugin-collection.js') }}"></script>
<script src="{{ asset('template2/js/gsap-active.js') }}"></script>
<!-- Custom script for this template -->
<script src="{{ asset('template2/js/script.js') }}"></script>

<script>
    @if ($event && $event->wedding_date)
    const weddingDate = "{{ \Carbon\Carbon::parse($event->wedding_date)->setTime(20, 30, 0)->format('Y-m-d H:i:s') }}";
    @else
    const weddingDate = "2026-07-11 20:30:00"; // fallback
    @endif

    if ($("#clock").length) {
        $('#clock').countdown(weddingDate, function (event) {
            $(this).html(event.strftime(''
                + '<div class="box"><div><div class="time">%D</div> <span>Jours</span> </div></div>'
                + '<div class="box"><div><div class="time">%H</div> <span>Heures</span> </div></div>'
                + '<div class="box"><div><div class="time">%M</div> <span>Mins</span> </div></div>'
                + '<div class="box"><div><div class="time">%S</div> <span>Secs</span> </div></div>'));
        });
    }
</script>

</body>
</html>
