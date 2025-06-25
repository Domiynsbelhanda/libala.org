<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Youne Studio.">
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
    <meta name="author" content="Youne Studio.">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <meta name="description" content="@yield('description', 'Organisez votre mariage avec élégance et simplicité.')">
    <meta name="keywords" content="@yield('keywords', 'mariage, invitations, libala, Congo, digital wedding')">

    <meta property="og:description" content="@yield('og_description', 'Gérez vos invités et événements de mariage en ligne.')">
    <meta property="og:url" content="@yield('og_url', url()->current())">
    <meta property="og:type" content="website">

    @php
        $ogImage = asset('storage/' . $event->couple_photo); // ou autre photo de couple selon ton modèle
    @endphp

    <meta property="og:image" content="{{ $ogImage }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta name="twitter:image" content="{{ $ogImage }}">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="@yield('twitter_description', 'Invitations de mariage digitales au Congo.')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('images/wedding-cover.jpg'))">

    <!-- Polices & Meta -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <style>
        .templatesss {
            width: 90vw; /* Valeur par défaut mobile/tablette */
            max-width: 900px; /* ✅ Limite à 900px sur PC */
            aspect-ratio: 1 / 1; /* ✅ Carré parfait */
            background-image: url('{{ asset('storage/' . $event->couple_photo) }}');
            background-size: contain; /* ✅ Affiche toute l’image sans la couper */
            background-repeat: no-repeat;
            background-position: center;
            margin: auto; /* ✅ Centre sur l’écran */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>

<!-- start page-wrapper -->
<div class="page-wrap">

    <section class="templatesss">
    </section>

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


    @if (
        !empty($event->husband_fullname) &&
        !empty($event->wife_fullname) &&
        !empty($event->husband_image) &&
        !empty($event->wife_image)
    )
        <!-- start couple-section -->
        <section class="wpo-couple-section section-padding pt-2" id="couple">
            <div class="container">
                <div class="couple-area clearfix">
                    <div class="couple-wrap">
                        <div class="row align-items-center gx-5">
                            <!-- Mari (Husband) -->
                            <div class="col col-md-6 col-12">
                                <div class="couple-item">
                                    <div class="couple-img">
                                        <img src="{{ asset('storage/' . $event->husband_image) }}" alt="Mari">
                                    </div>
                                    <div class="couple-text">
                                        <i><img src="{{ asset('assets/images/couple/groom.svg') }}" alt=""></i>
                                        <h3>{{ $event->husband_fullname }}</h3>
                                        <p>{{ $event->husband_description }}</p>
                                        <div class="couple-bg">
                                            <svg viewBox="0 0 500 433" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 28.0003C0 28.0003 40 -20.2942 78 11.0001C90.075 20.9443 94.3766 37.833 95.1425 54.6979C95.9162 71.7365 117.555 85.4249 131.164 75.1428C133.036 73.7282 135.17 72.6975 137.441 72.11L142.442 70.8167C168.453 64.0898 194.316 82.2112 196.874 108.956L197.393 114.379C200.295 144.721 230.211 164.837 259.405 156.079L263 155C290.305 139.265 324.668 157.485 326.966 188.914L328.735 213.107C329.843 228.267 342.466 240 357.667 240C359.882 240 362.089 239.747 364.246 239.244L376.055 236.494C404.616 229.843 431.332 253.052 428.738 282.263L427.564 295.484C425.743 315.988 443.286 332.954 463.719 330.449C482.999 328.085 500 343.128 500 362.553V433H0V28.0003Z" fill="white" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Femme (Wife) -->
                            <div class="col col-md-6 col-12">
                                <div class="couple-item">
                                    <div class="couple-img">
                                        <img src="{{ asset('storage/' . $event->wife_image) }}" alt="Femme">
                                    </div>
                                    <div class="couple-text">
                                        <i><img src="{{ asset('assets/images/couple/bride.svg') }}" alt=""></i>
                                        <h3>{{ $event->wife_fullname }}</h3>
                                        <p>{{ $event->wife_description }}</p>
                                        <div class="couple-bg">
                                            <svg viewBox="0 0 500 433" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M500 28.0003C500 28.0003 460 -20.2942 422 11.0001C409.925 20.9443 405.623 37.833 404.858 54.6979C404.084 71.7365 382.445 85.4249 368.836 75.1428C366.964 73.7282 364.83 72.6975 362.559 72.11L357.558 70.8167C331.547 64.0898 305.684 82.2112 303.126 108.956L302.607 114.379C299.705 144.721 269.789 164.837 240.595 156.079L237 155C209.695 139.265 175.332 157.485 173.034 188.914L171.265 213.107C170.157 228.267 157.534 240 142.333 240C140.118 240 137.911 239.747 135.754 239.244L123.945 236.494C95.3837 229.843 68.6684 253.052 71.2621 282.263L72.436 295.484C74.2567 315.988 56.7136 332.954 36.2814 330.449C17.0009 328.085 0 343.128 0 362.553V433H500V28.0003Z" fill="white" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shape-1"><img src="{{ asset('assets/images/couple/flower1.png') }}" alt=""></div>
                        <div class="shape-2"><img src="{{ asset('assets/images/couple/flower2.png') }}" alt=""></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end couple-section -->
    @endif


    <!-- start wpo-story-section -->
    <section class="wpo-story-section section-padding pb-0" id="story">
        <div class="container">

            @php
                $eventCount = collect([
                    $event->civil_date || $event->civil_time || $event->civil_commune,
                    $event->church_name || $event->church_date || $event->church_time,
                    $event->reception_date || $event->reception_time || $event->reception_hall,
                ])->filter()->count();
            @endphp

            <div class="wpo-section-title">
                <h4 class="poort-text poort-in-right">Notre Programme</h4>
            </div>

            <div class="wpo-story-wrap">
                @if($event->civil_date && $event->civil_time && $event->civil_commune)
                    <div class="wpo-story-item">
                        <div class="row">
{{--                            <div class="col col-lg-6 col-12">--}}
{{--                                <div class="wpo-story-img">--}}
{{--                                    <img src="{{ asset('images/civile.jpg') }}" alt="">--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-lg-12 col-12">
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
{{--                                <div class="col col-lg-6 col-12">--}}
{{--                                    <div class="wpo-story-img">--}}
{{--                                        <img src="{{ asset('images/eglise.jpg') }}" alt="">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="col col-lg-12 col-12">
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
{{--                                <div class="col col-lg-6 col-12">--}}
{{--                                    <div class="wpo-story-img">--}}
{{--                                        <img src="{{ asset('images/soiree.jpg') }}" alt="">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="col col-lg-12 col-12">
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

    @if(!empty($event->gallery) && count($event->gallery) > 0)
        <!-- start wpo-portfolio-section -->
        <section class="wpo-portfolio-section section-padding pt-0" id="gallery">
            <div class="container-fluid">
                <div class="wpo-section-title">
                    <h4 class="poort-text poort-in-right">Sweet Memories</h4>
                    <h2 class="poort-text poort-in-right">Notre Gallerie</h2>
                </div>

                <div class="gallery-main-wrap">
                    <div class="row align-items-center">
                        {{-- 1ère image --}}
                        @if(isset($event->gallery[0]))
                            <div class="col-lg-2 col-md-6 order-lg-1 order-2">
                                <div class="gallery-side-img wow fadeInLeftSlow" data-wow-duration="1400ms">
                                    <div class="img-holder">
                                        <a href="{{ asset('storage/' . $event->gallery[0]) }}" class="fancybox" data-fancybox-group="gall-1">
                                            <img src="{{ asset('storage/' . $event->gallery[0]) }}" alt class="img img-responsive">
                                            <div class="hover-content"><i class="ti-plus"></i></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="col-lg-8 order-lg-2 order-3">
                            <div class="sortable-gallery">
                                <div class="row portfolio-grids style-1 clearfix">
                                    {{-- 3 à 8 images dans la grille centrale --}}
                                    @if(isset($event->gallery[2]))
                                        <div class="col-lg-4 col-md-6 col-12 grid">
                                            <div class="img-holder wow fadeInUp" data-wow-duration="1000ms">
                                                <a href="{{ asset('storage/' . $event->gallery[2]) }}" class="fancybox" data-fancybox-group="gall-1">
                                                    <img src="{{ asset('storage/' . $event->gallery[2]) }}" alt class="img img-responsive">
                                                    <div class="hover-content"><i class="ti-plus"></i></div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                    @if(isset($event->gallery[3]))
                                        <div class="col-lg-4 col-md-6 col-12 grid">
                                            <div class="img-holder wow fadeInUp" data-wow-duration="1200ms">
                                                <a href="{{ asset('storage/' . $event->gallery[3]) }}" class="fancybox" data-fancybox-group="gall-1">
                                                    <img src="{{ asset('storage/' . $event->gallery[3]) }}" alt class="img img-responsive">
                                                    <div class="hover-content"><i class="ti-plus"></i></div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                    @if(isset($event->gallery[4]))
                                        <div class="col-lg-4 col-md-6 col-12 grid">
                                            <div class="img-holder wow fadeInUp" data-wow-duration="1400ms">
                                                <a href="{{ asset('storage/' . $event->gallery[4]) }}" class="fancybox" data-fancybox-group="gall-1">
                                                    <img src="{{ asset('storage/' . $event->gallery[4]) }}" alt class="img img-responsive">
                                                    <div class="hover-content"><i class="ti-plus"></i></div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                    @if(isset($event->gallery[5]))
                                        <div class="col-lg-4 col-md-6 col-12 grid">
                                            <div class="img-holder wow fadeInUp" data-wow-duration="1000ms">
                                                <a href="{{ asset('storage/' . $event->gallery[5]) }}" class="fancybox" data-fancybox-group="gall-1">
                                                    <img src="{{ asset('storage/' . $event->gallery[5]) }}" alt class="img img-responsive">
                                                    <div class="hover-content"><i class="ti-plus"></i></div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                    @if(isset($event->gallery[6]))
                                        <div class="col-lg-4 col-md-6 col-12 grid">
                                            <div class="img-holder wow fadeInUp" data-wow-duration="1200ms">
                                                <a href="{{ asset('storage/' . $event->gallery[6]) }}" class="fancybox" data-fancybox-group="gall-1">
                                                    <img src="{{ asset('storage/' . $event->gallery[6]) }}" alt class="img img-responsive">
                                                    <div class="hover-content"><i class="ti-plus"></i></div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                    @if(isset($event->gallery[7]))
                                        <div class="col-lg-4 col-md-6 col-12 grid">
                                            <div class="img-holder wow fadeInUp" data-wow-duration="1400ms">
                                                <a href="{{ asset('storage/' . $event->gallery[7]) }}" class="fancybox" data-fancybox-group="gall-1">
                                                    <img src="{{ asset('storage/' . $event->gallery[7]) }}" alt class="img img-responsive">
                                                    <div class="hover-content"><i class="ti-plus"></i></div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- 2e image (à droite) --}}
                        @if(isset($event->gallery[1]))
                            <div class="col-lg-2 col-md-6 order-lg-3 order-2">
                                <div class="gallery-side-img wow fadeInRightSlow" data-wow-duration="1400ms">
                                    <div class="img-holder">
                                        <a href="{{ asset('storage/' . $event->gallery[1]) }}" class="fancybox" data-fancybox-group="gall-1">
                                            <img src="{{ asset('storage/' . $event->gallery[1]) }}" alt class="img img-responsive">
                                            <div class="hover-content"><i class="ti-plus"></i></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div> <!-- end container -->
        </section>
        <!-- end wpo-portfolio-section -->
    @endif



    <!-- start of wpo-site-footer-section -->
    <footer class="wpo-site-footer">
        <div class="wpo-lower-footer">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <p>
                            Contact :
                            <a href="tel:+243818045132">+243818045132</a>
                        </p>

                        <p>
                            Email :
                            <a href="mailto:reservation@libala.org">reservation@libala.org</a>
                        </p>

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
