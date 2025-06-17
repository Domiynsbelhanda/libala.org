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
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <h2>Nous allons nous marier</h2>
                            <h1>
                                {{$event->groom_name}} & {{$event->bride_name}}
                            </h1>
                            <h3 style="color: white">
                                {{ mb_strtoupper(\Carbon\Carbon::parse($event->wedding_date)->translatedFormat('l d F Y')) }}
                            </h3>
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
                    <h2>Bonjour {{ $invitation->guest->name }}!</h2>
                    <p>
                        Nous vous avons invité à célébrer notre mariage
                    </p>
                    <h3>
                        Table : {{ $invitation->table->name }}
                    </h3>

                    <div>
                        {!! $qrcode !!}
                    </div>
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
                            <img src="{{ asset('storage/' . $event->husband_image) }}" alt="groom"
                                 style="object-fit: cover!important;"
                                 class="img-responsive">
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
                            <img src="{{ asset('storage/' . $event->wife_image) }}" alt="groom"
                                 style="object-fit: cover!important;"
                                 class="img-responsive">
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

    @if(!empty($event->gallery) && count($event->gallery) > 0)
        <div id="fh5co-gallery" class="fh5co-section-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                    <h2>Notre Gallerie</h2>
                </div>
            </div>
            <div class="row row-bottom-padded-md">
                <div class="col-md-12">
                    <ul id="fh5co-gallery-list">

                        @if(isset($event->gallery[0]))
                            <li class="one-third animate-box" data-animate-effect="fadeIn"
                                style="background-image: url({{ asset('storage/' . $event->gallery[0]) }}); ">
                                <a href="{{ asset('storage/' . $event->gallery[0]) }}">
                                </a>
                            </li>
                        @endif

                            @if(isset($event->gallery[1]))
                                <li class="one-third animate-box" data-animate-effect="fadeIn"
                                    style="background-image: url({{ asset('storage/' . $event->gallery[1]) }}); ">
                                    <a href="{{ asset('storage/' . $event->gallery[1]) }}">
                                    </a>
                                </li>
                            @endif

                            @if(isset($event->gallery[2]))
                                <li class="one-third animate-box" data-animate-effect="fadeIn"
                                    style="background-image: url({{ asset('storage/' . $event->gallery[2]) }}); ">
                                    <a href="{{ asset('storage/' . $event->gallery[2]) }}">
                                    </a>
                                </li>
                            @endif

                            @if(isset($event->gallery[3]))
                                <li class="one-third animate-box" data-animate-effect="fadeIn"
                                    style="background-image: url({{ asset('storage/' . $event->gallery[3]) }}); ">
                                    <a href="{{ asset('storage/' . $event->gallery[3]) }}">
                                    </a>
                                </li>
                            @endif

                            @if(isset($event->gallery[4]))
                                <li class="one-third animate-box" data-animate-effect="fadeIn"
                                    style="background-image: url({{ asset('storage/' . $event->gallery[4]) }}); ">
                                    <a href="{{ asset('storage/' . $event->gallery[4]) }}">
                                    </a>
                                </li>
                            @endif

                            @if(isset($event->gallery[5]))
                                <li class="one-third animate-box" data-animate-effect="fadeIn"
                                    style="background-image: url({{ asset('storage/' . $event->gallery[5]) }}); ">
                                    <a href="{{ asset('storage/' . $event->gallery[5]) }}">
                                    </a>
                                </li>
                            @endif

                            @if(isset($event->gallery[6]))
                                <li class="one-third animate-box" data-animate-effect="fadeIn"
                                    style="background-image: url({{ asset('storage/' . $event->gallery[6]) }}); ">
                                    <a href="{{ asset('storage/' . $event->gallery[6]) }}">
                                    </a>
                                </li>
                            @endif

                            @if(isset($event->gallery[7]))
                                <li class="one-third animate-box" data-animate-effect="fadeIn"
                                    style="background-image: url({{ asset('storage/' . $event->gallery[7]) }}); ">
                                    <a href="{{ asset('storage/' . $event->gallery[7]) }}">
                                    </a>
                                </li>
                            @endif

                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div id="fh5co-started" class="fh5co-bg" style="background-image:url({{asset('core/images/img_bg_4.jpg')}});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>
                        Confirmez votre présence
                    </h2>
                </div>
            </div>
            <div class="row animate-box">
                <div class="col-md-10 col-md-offset-1" style="background-color: #000000; padding: 35px!important;">
                    <form class="form-inline" method="POST" action="{{ route('guest.rsvp', [$event->reference, $invitation->code]) }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <p>
                                    <input type="radio" id="attend" name="is_attending" value="1" checked>
                                    <label for="attend">Oui, je serai présent(e)</label>
                                </p>
                                <p>
                                    <input type="radio" id="not" name="is_attending" value="0">
                                    <label for="not">Désolé(e), je ne pourrai pas venir</label>
                                </p>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label for="number_of_people">Nombre total de personnes (vous compris)</label>
                                <select name="number_of_people" class="form-control" required>
                                    @for($i = 1; $i <= 5; $i++)
                                        <option style="color: black" value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div>
                                <label for="additional_info">Autres informations</label>
                                <textarea name="additional_info" class="form-control" rows="4" placeholder="Allergies, remarques, etc."></textarea>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 15px!important;">
                            <div class="">
                                <button type="submit" class="btn btn-default btn-block">Envoyez</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer id="fh5co-footer" role="contentinfo">
        <div class="container">

            <div class="row copyright">
                <div class="col-md-12 text-center">
                    <p>
                        <small class="block">
                            Contact :
                            <a href="tel:+243818045132">+243818045132</a>
                        </small>

                        <small>
                            Email :
                            <a href="mailto:reservation@libala.org">reservation@libala.org</a>
                        </small>
                        <small class="block">
                            &copy; Copyright 2025 | <a href="{{url('www.youne.studio')}}">Youne Studio.</a> | All right
                            reserved.
                        </small>
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
    var weddingDate = new Date("{{ \Carbon\Carbon::parse($event->wedding_date)->format('Y-m-d') }}");

    simplyCountdown('.simply-countdown-one', {
        year: weddingDate.getFullYear(),
        month: weddingDate.getMonth() + 1, // JS months are 0-indexed
        day: weddingDate.getDate()
    });

    $('#simply-countdown-losange').simplyCountdown({
        year: weddingDate.getFullYear(),
        month: weddingDate.getMonth() + 1,
        day: weddingDate.getDate(),
        enableUtc: false
    });
</script>


</body>
</html>

