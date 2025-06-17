<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>{{$event->groom_name . ' & ' . $event->bride_name}} - Invitation de {{ $invitation->guest->name }}</title>

    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/gif" sizes="20x20">

    <link rel="shortcut icon" href="{{asset('favicon.png')}}" type="image/x-icon">


    <meta name="viewport" content="width=device-width, initial-scale=1">
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

    <link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{asset('core/css/animate.css')}}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{asset('core/css/icomoon.css')}}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{asset('core/css/bootstrap.css')}}">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{asset('core/css/magnific-popup.css')}}">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{asset('core/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('core/css/owl.theme.default.min.css')}}">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{asset('core/css/style.css')}}">

    <!-- Modernizr JS -->
    <script src="{{asset('core/js/modernizr-2.6.2.min.js')}}"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="{{asset('core/js/respond.min.js')}}"></script>
    <![endif]-->

</head>
<body>

<div class="fh5co-loader"></div>

<div id="page">

    <header id="fh5co-header" class="fh5co-cover" role="banner"
            style="background-image:url({{asset('storage/' . $event->couple_photo)}});"
            data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h2>Nous allons nous marier</h2>
                            <h1>
                                {{$event->groom_name}} & {{$event->bride_name}}
                            </h1>
                            <div class="simply-countdown simply-countdown-one"></div>
                            <p><a class="btn btn-default btn-sm">Save the date</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="fh5co-couple">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                    <h2>Bonjour!</h2>
                    <h3>
                        {{ mb_strtoupper(\Carbon\Carbon::parse($event->wedding_date)->translatedFormat('l d F Y')) }}
                    </h3>
                    <p>
                        Nous vous avons invité à célébrer notre mariage
                    </p>
                </div>
            </div>


            @if (
                !empty($event->husband_fullname) &&
                !empty($event->wife_fullname) &&
                !empty($event->husband_image) &&
                !empty($event->wife_image)
            )

                <div class="couple-wrap animate-box">
                <div class="couple-half">
                    <div class="groom">
                        <img src="{{ asset('storage/' . $event->husband_image) }}" alt="groom" class="img-responsive">
                    </div>
                    <div class="desc-groom">
                        <h3>
                            {{ $event->husband_fullname }}
                        </h3>
                        <p>
                            {{ $event->husband_description }}
                        </p>
                    </div>
                </div>
                <p class="heart text-center"><i class="icon-heart2"></i></p>
                <div class="couple-half">
                    <div class="bride">
                        <img src="{{ asset('storage/' . $event->wife_image) }}" alt="groom" class="img-responsive">
                    </div>
                    <div class="desc-bride">
                        <h3>
                            {{ $event->wife_fullname }}
                        </h3>
                        <p>
                            {{ $event->wife_description }}
                        </p>
                    </div>
                </div>
            </div>

            @endif
        </div>
    </div>

    <div id="fh5co-event" class="fh5co-bg" style="background-image:url({{asset('core/images/img_bg_3.jpg')}});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                    <h2>Notre Programme</h2>
                </div>
            </div>
            <div class="row">
                <div class="display-t">
                    <div class="display-tc">
                        <div class="col-md-10 col-md-offset-1">

                            @if($event->civil_date && $event->civil_time && $event->civil_commune)
                                <div class="col-md-12 col-sm-12 text-center">
                                    <div class="event-wrap animate-box">
                                        <h3>Mariage Civile</h3>
                                        <div class="event-col">
                                            <i class="icon-calendar"></i>
                                            <span>
                                                {{ mb_strtoupper(\Carbon\Carbon::parse($event->civil_date)->translatedFormat('l d F Y')) ?? '' }}
                                            </span>
                                        </div>
                                        <div class="event-col">
                                            <i class="icon-clock"></i>
                                            <span>
                                                {{ $event->civil_time ? \Carbon\Carbon::parse($event->civil_time)->format('H:i') : '' }}
                                            </span>
                                        </div>
                                        <p>
                                            Commune : {{ $event->civil_commune }} <br>
                                        </p>
                                    </div>
                                </div>
                            @endif


                            @if($event->church_name && $event->church_date && $event->church_time)
                                    <div class="col-md-6 col-sm-6 text-center">
                                        <div class="event-wrap animate-box">
                                            <h3>Mariage Religieux</h3>
                                            <div class="event-col">
                                                <i class="icon-calendar"></i>
                                                <span>
                                                {{ mb_strtoupper(\Carbon\Carbon::parse($event->church_date)->translatedFormat('l d F Y')) ?? '' }}
                                            </span>
                                            </div>
                                            <div class="event-col">
                                                <i class="icon-clock"></i>
                                                <span>
                                                    {{ $event->church_time ? \Carbon\Carbon::parse($event->church_time)->format('H:i') : '' }}
                                                </span>
                                            </div>
                                            <p>
                                                {{ $event->church_name }}
                                                <br>
                                                {{ $event->church_address }}
                                            </p>
                                        </div>
                                    </div>
                            @endif


                                @if($event->reception_date && $event->reception_time && $event->reception_hall)
                                    <div class="col-md-6 col-sm-6 text-center">
                                        <div class="event-wrap animate-box">
                                            <h3>Mariage Religieux</h3>
                                            <div class="event-col">
                                                <i class="icon-calendar"></i>
                                                <span>
                                                {{ mb_strtoupper(\Carbon\Carbon::parse($event->reception_date)->translatedFormat('l d F Y')) ?? '' }}
                                            </span>
                                            </div>
                                            <div class="event-col">
                                                <i class="icon-clock"></i>
                                                <span>
                                                {{ $event->reception_time ? \Carbon\Carbon::parse($event->reception_time)->format('H:i') : '' }}
                                            </span>
                                            </div>
                                            <p>
                                                {{ $event->reception_hall }}

                                                <br>

                                                {{ $event->reception_address }}
                                            </p>
                                        </div>
                                    </div>
                                @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="fh5co-started" class="fh5co-bg" style="background-image:url(images/img_bg_4.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Are You Attending?</h2>
                    <p>Please Fill-up the form to notify you that you're attending. Thanks.</p>
                </div>
            </div>
            <div class="row animate-box">
                <div class="col-md-10 col-md-offset-1">
                    <form class="form-inline">
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label for="name" class="sr-only">Name</label>
                                <input type="name" class="form-control" id="name" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <button type="submit" class="btn btn-default btn-block">I am Attending</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div id="fh5co-gallery" class="fh5co-section-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                    <span>Our Memories</span>
                    <h2>Wedding Gallery</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                </div>
            </div>
            <div class="row row-bottom-padded-md">
                <div class="col-md-12">
                    <ul id="fh5co-gallery-list">

                        <li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(images/gallery-1.jpg); ">
                            <a href="images/gallery-1.jpg">
                                <div class="case-studies-summary">
                                    <span>14 Photos</span>
                                    <h2>Two Glas of Juice</h2>
                                </div>
                            </a>
                        </li>
                        <li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(images/gallery-2.jpg); ">
                            <a href="#" class="color-2">
                                <div class="case-studies-summary">
                                    <span>30 Photos</span>
                                    <h2>Timer starts now!</h2>
                                </div>
                            </a>
                        </li>


                        <li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(images/gallery-3.jpg); ">
                            <a href="#" class="color-3">
                                <div class="case-studies-summary">
                                    <span>90 Photos</span>
                                    <h2>Beautiful sunset</h2>
                                </div>
                            </a>
                        </li>
                        <li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(images/gallery-4.jpg); ">
                            <a href="#" class="color-4">
                                <div class="case-studies-summary">
                                    <span>12 Photos</span>
                                    <h2>Company's Conference Room</h2>
                                </div>
                            </a>
                        </li>

                        <li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(images/gallery-5.jpg); ">
                            <a href="#" class="color-3">
                                <div class="case-studies-summary">
                                    <span>50 Photos</span>
                                    <h2>Useful baskets</h2>
                                </div>
                            </a>
                        </li>
                        <li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(images/gallery-6.jpg); ">
                            <a href="#" class="color-4">
                                <div class="case-studies-summary">
                                    <span>45 Photos</span>
                                    <h2>Skater man in the road</h2>
                                </div>
                            </a>
                        </li>

                        <li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(images/gallery-7.jpg); ">
                            <a href="#" class="color-4">
                                <div class="case-studies-summary">
                                    <span>35 Photos</span>
                                    <h2>Two Glas of Juice</h2>
                                </div>
                            </a>
                        </li>

                        <li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(images/gallery-8.jpg); ">
                            <a href="#" class="color-5">
                                <div class="case-studies-summary">
                                    <span>90 Photos</span>
                                    <h2>Timer starts now!</h2>
                                </div>
                            </a>
                        </li>
                        <li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(images/gallery-9.jpg); ">
                            <a href="#" class="color-6">
                                <div class="case-studies-summary">
                                    <span>56 Photos</span>
                                    <h2>Beautiful sunset</h2>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <footer id="fh5co-footer" role="contentinfo">
        <div class="container">

            <div class="row copyright">
                <div class="col-md-12 text-center">
                    <p>
                        <small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small>
                        <small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a> Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a></small>
                    </p>
                    <p>
                    <ul class="fh5co-social-icons">
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-linkedin"></i></a></li>
                        <li><a href="#"><i class="icon-dribbble"></i></a></li>
                    </ul>
                    </p>
                </div>
            </div>

        </div>
    </footer>
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<!-- jQuery -->
<script src="{{ asset('core/js/jquery.min.js') }}"></script>
<!-- jQuery Easing -->
<script src="{{ asset('core/js/jquery.easing.1.3.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('core/js/bootstrap.min.js') }}"></script>
<!-- Waypoints -->
<script src="{{ asset('core/js/jquery.waypoints.min.js') }}"></script>
<!-- Carousel -->
<script src="{{ asset('core/js/owl.carousel.min.js') }}"></script>
<!-- countTo -->
<script src="{{ asset('core/js/jquery.countTo.js') }}"></script>
<!-- Stellar -->
<script src="{{ asset('core/js/jquery.stellar.min.js') }}"></script>
<!-- Magnific Popup -->
<script src="{{ asset('core/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('core/js/magnific-popup-options.js') }}"></script>
<!-- Countdown -->
<script src="{{ asset('core/js/simplyCountdown.js') }}"></script>
<!-- Main -->
<script src="{{ asset('core/js/main.js') }}"></script>

<script>
    var d = new Date(new Date().getTime() + 200 * 120 * 120 * 2000);

    // default example
    simplyCountdown('.simply-countdown-one', {
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate()
    });

    //jQuery example
    $('#simply-countdown-losange').simplyCountdown({
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate(),
        enableUtc: false
    });
</script>

</body>
</html>

