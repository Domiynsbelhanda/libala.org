<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from html.tf.dreamitsolution.net/lavewell/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 May 2026 23:27:59 GMT -->
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Invitation de {{ $invitation->guest->name }} - {{$event->groom_name . ' & ' . $event->bride_name}}</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" type="image/png" sizes="56x56" href="{{ asset('templates/lavewell/assets/images/fav-icon/icon.png') }}" />
    <link rel="stylesheet" href="{{ asset('templates/lavewell/assets/css/bootstrap.min.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('templates/lavewell/assets/css/animate.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('templates/lavewell/assets/css/all.min.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('templates/lavewell/assets/css/flaticon.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('templates/lavewell/assets/css/theme-default.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('templates/lavewell/assets/css/meanmenu.min.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('templates/lavewell/venobox/venobox.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('templates/lavewell/assets/css/bootstrap-icons.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('templates/lavewell/assets/css/magnific-popup.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('templates/lavewell/assets/css/style.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('templates/lavewell/assets/css/odometer-theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('templates/lavewell/assets/css/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('templates/lavewell/assets/css/responsive.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('templates/lavewell/assets/css/swiper-bundle.css') }}" />
    <script src="{{ asset('templates/lavewell/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>

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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fleur+De+Leah&display=swap" rel="stylesheet">

    <!-- Polices & Meta -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

</head>
<body>
<!-- loder -->
<div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="object" id="object_four"></div>
            <div class="object" id="object_three"></div>
            <div class="object" id="object_two"></div>
            <div class="object" id="object_one"></div>
        </div>
    </div>
</div>

<!-- Curser Pointer -->
<div class="cursor"></div>
<div class="cursor2"></div>

<div id="smooth-wrapper">
    <div id="smooth-content">


        <section class="py-1 position-relative overflow-hidden" style="min-height: 100vh; background: #f8f5f2;">

            <!-- Background Left -->
            <div class="position-absolute top-0 start-0 w-100 h-100 d-none d-md-block">
                <img
                    src="{{ asset('storage/' . $event->couple_photo) }}"
                    alt="Bride"
                    class="w-100 h-100 object-fit-cover"
                >
            </div>

            <!-- Mobile Background -->
            <div class="position-absolute top-0 start-0 w-100 h-100 d-md-none">
                <img
                    src="{{ asset('storage/' . $event->couple_photo) }}"
                    alt="Wedding"
                    class="w-100 h-100 object-fit-cover"
                >
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>
            </div>

            <!-- Overlay -->
            <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-25 d-none d-md-block"></div>

            <!-- Content -->
            <div class="container position-relative z-2 h-100">
                <div class="row justify-content-center align-items-center min-vh-100">

                    <div class="col-lg-6 text-center">

                        <div class="bg-white bg-opacity-75 backdrop-blur rounded-4 shadow-lg p-4 p-md-5">

                    <span
                        style="font-family: Poppins,serif!important"
                        class="text-uppercase small fw-normal letter-spacing-2 d-block mb-3 text-secondary">
                        Save the Date
                    </span>

                            <p class="lead text-uppercase text-muted fw-bold mb-4" style="font-family: Poppins,serif!important">
                                {{ \Carbon\Carbon::parse($event->wedding_date)->translatedFormat('d F Y') }}
                            </p>

                            <h1 style="font-size: 48px!important;"
                                class="display-3 fw-bold mb-3">
                                {{$event->groom_name}}
                                <span class="text-danger">&nbsp;&&nbsp;</span>
                                {{$event->bride_name}}
                            </h1>

                            <a
                                style="font-family: Fleur De Leah, cursive!important; font-size: 48px!important;"
                               class="btn btn-dark px-4 py-3 rounded-pill">
                                Invitation
                            </a>

                            <span
                                style="font-family: Poppins,serif!important; font-size: 24px!important; color: black"
                                class="text-uppercase letter-spacing-2 d-block mt-3 text-secondary">
                                {{ $invitation->guest->name }}
                            </span>

                            <span
                                style="font-family: Poppins,serif!important; font-size: 16px!important; color: black"
                                class="text-uppercase letter-spacing-2 d-block mt-3 text-secondary">
                                {{ $invitation->table->name }}
                            </span>

                        </div>

                    </div>

                </div>
            </div>

        </section>

        @if (
            !empty($event->husband_fullname) &&
            !empty($event->wife_fullname) &&
            !empty($event->husband_image) &&
            !empty($event->wife_image)
        )
            <div class="service-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="single-service-box" data-aos="fade-up">
                                <div class="service-thumb">
                                    <img src="{{ asset('storage/' . $event->husband_image) }}" alt="thumb" />
                                </div>
                                <div class="service-content">
                                    <h3
                                        style="font-family: 'Poppins', sans-serif!important;"
                                        class="service-title" data-aos="fade-up">
                                        {{ $event->husband_fullname }}
                                    </h3>

                                    <p
                                        style="font-family: 'Poppins', sans-serif!important;"
                                        class="service-desc">
                                        {{ $event->husband_description }}
                                    </p>
                                </div>

                                <div class="service-box-shape">
                                    <img src="{{ asset('templates/lavewell/assets/images/home-1/flower.png')}}" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="single-service-box box-2" data-aos="fade-up">
                                <div class="service-thumb">
                                    <img
                                        src="{{ asset('storage/' . $event->wife_image) }}"
                                        alt="thumb"
                                    />
                                </div>
                                <div class="service-content">
                                    <h3
                                        style="font-family: 'Poppins', sans-serif!important;"
                                        class="service-title" data-aos="fade-up">
                                        {{ $event->wife_fullname }}
                                    </h3>

                                    <p
                                        style="font-family: 'Poppins', sans-serif!important;"
                                        class="service-desc">
                                        {{ $event->wife_description }}
                                    </p>
                                </div>
                                <div class="service-box-shape2">
                                    <img src="{{ asset('templates/lavewell/assets/images/home-1/flower2.png')}}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="service-shape" data-aos="zoom-in">
                        <img src="{{ asset('templates/lavewell/assets/images/home-1/ser-shape.png')}}" alt="shape" />
                    </div>
                    <div class="service-shape2" data-aos="zoom-in">
                        <img src="{{ asset('templates/lavewell/assets/images/home-1/ser-shape2.png')}}" alt="shape" />
                    </div>
                </div>
            </div>
        @endif

        <div class="coutner-area py-5">
            <div class="container">
                <div class="row counter align-items-center justify-content-center text-center">

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="single-counter-misson">
                            <div class="counter-content">
                                <h2 class="counter-title">
                                    Notre mariage est dans :
                                </h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-md-3 col-lg-2 mb-4">
                        <div class="counter-single-box">
                            <div class="counter-box-title">
                                <h1 style="color: white" id="days">0</h1>
                            </div>
                            <div class="counter-desc">
                                <p style="font-family: 'Poppins', sans-serif!important">JOUR (S)</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-md-3 col-lg-2 mb-4">
                        <div class="counter-single-box">
                            <div class="counter-box-title">
                                <h1 style="color: white" id="hours">0</h1>
                            </div>
                            <div class="counter-desc">
                                <p style="font-family: 'Poppins', sans-serif!important">HEURE (S)</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-md-3 col-lg-2">
                        <div class="counter-single-box">
                            <div class="counter-box-title">
                                <h1 style="color: white" id="minutes">0</h1>
                            </div>
                            <div class="counter-desc">
                                <p style="font-family: 'Poppins', sans-serif!important">MINUTE (S)</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-md-3 col-lg-2">
                        <div class="counter-single-box">
                            <div class="counter-box-title">
                                <h1 style="color: white" id="seconds">0</h1>
                            </div>
                            <div class="counter-desc">
                                <p style="font-family: 'Poppins', sans-serif!important">SECONDE (S)</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="blog-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center cursor-scale" data-aos="fade-up">
                            <div class="section-main-title cursor-scale">
                                <h1>Notre Dress Code</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-6 col-md-6">
                            <div class="blog-singele-box" data-aos="fade-down">
                                <div class="blog-thumb">
                                    <img src="{{ asset('templates/lavewell/assets/images/dress1.jpeg') }}" alt="blog" />
                                    <div class="blog-content">
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="blog-singele-box" data-aos="fade-down">
                            <div class="blog-thumb">
                                <img src="{{ asset('templates/lavewell/assets/images/dress2.jpeg') }}" alt="blog" />
                                <div class="blog-content">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        @php
            $eventCount = collect([
                $event->civil_date || $event->civil_time || $event->civil_commune,
                $event->church_name || $event->church_date || $event->church_time,
                $event->reception_date || $event->reception_time || $event->reception_hall,
            ])->filter()->count();
        @endphp

        <div class="blog-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center cursor-scale" data-aos="fade-up">
                            <div class="section-main-title cursor-scale">
                                <h1>Notre Programme</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($event->church_name && $event->church_date && $event->church_time)
            <div class="about-area style-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-7 col-lg-6 pr-0">
                        <div class="about-thumb" data-aos="zoom-in">
                            <img src="{{ isset($event->gallery[1]) && $event->gallery[1]
                                ? asset('storage/' . $event->gallery[1])
                                : asset('templates/lavewell/assets/images/home-1/about-thumb4.jpg') }}"
                                 style="object-fit: cover!important;"
                                 alt="thumb" />
                        </div>
                    </div>

                    <div class="col-xl-5 col-lg-6">
                        <div class="about-content" data-aos="flip-up">
                            <div class="section-title text-left cursor-scale" data-aos="flip-up">
                                <div class="section-main-title cursor-scale">
                                    <h2>Mariage Religieux</h2>
                                </div>

                                <div class="section-sub-title">
                                    <h5 style="font-size: 18px!important; color: black!important; font-family: 'Poppins', sans-serif!important;">
                                        {{ mb_strtoupper(\Carbon\Carbon::parse($event->church_date)->translatedFormat('l d F Y')) ?? '' }}
                                        / {{ $event->church_time ? \Carbon\Carbon::parse($event->church_time)->format('H:i') : '' }}
                                    </h5>
                                </div>

                                <div class="section-title-desc">
                                    <h4 style="font-family: 'Poppins', sans-serif!important;">
                                        {{ $event->church_name }}
                                    </h4>
                                    <p>
                                        {{ $event->church_address }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($event->reception_date && $event->reception_time && $event->reception_hall)
            <div class="about-area style-2">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6">
                            <div class="about-content" data-aos="flip-up">
                                <div class="section-title text-left cursor-scale" data-aos="flip-up">
                                    <div class="section-main-title cursor-scale">
                                        <h2>Soirée Dansante</h2>
                                    </div>

                                    <div class="section-sub-title">
                                        <h5 style="font-size: 18px!important; color: black!important; font-family: 'Poppins', sans-serif!important;">
                                            {{ mb_strtoupper(\Carbon\Carbon::parse($event->reception_date)->translatedFormat('l d F Y')) ?? '' }}
                                            / {{ $event->reception_time ? \Carbon\Carbon::parse($event->reception_time)->format('H:i') : '' }}
                                        </h5>
                                    </div>

                                    <div class="section-title-desc">
                                        <h4 style="font-family: 'Poppins', sans-serif!important;">
                                            {{ $event->reception_hall }}
                                        </h4>
                                        <p>
                                            {{ $event->reception_address }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 pr-0">
                            <div class="about-thumb" data-aos="zoom-in">
                                <img
                                    src="{{ isset($event->gallery[0])
                                    ? asset('storage/' . $event->gallery[0])
                                    : asset('templates/lavewell/assets/images/home-1/about-thumb4.jpg') }}"
                                    style="object-fit: cover!important;"
                                    alt="thumb" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <section class="contact-area py-5" id="rsvp">
            <div class="container">
                <div class="row g-4 align-items-stretch">
                    <div class="col-lg-5">

                        <div
                            class="h-100 rounded-4 shadow-lg p-4 p-md-5 position-relative overflow-hidden text-center"
                            style="background: #111111;"
                        >

                            <!-- Decorative Shapes -->
                            <div class="position-absolute top-0 start-0 opacity-25">
                                <img
                                    src="{{ asset('template2/images/event/shape-1.png') }}"
                                    alt=""
                                >
                            </div>

                            <div class="position-absolute bottom-0 end-0 opacity-25">
                                <img
                                    src="{{ asset('template2/images/event/shape-2.png') }}"
                                    alt=""
                                >
                            </div>

                            <div class="position-relative z-2">

                                <p
                                    class="text-uppercase text-light mb-2"
                                    style="letter-spacing: 2px; font-family: 'Poppins', sans-serif;"
                                >
                                    Invité(e)
                                </p>

                                <h2
                                    class="text-white mb-3"
                                    style="font-size: 42px; font-family: 'Poppins', sans-serif;"
                                >
                                    {{ $invitation->guest->name }}
                                </h2>

                                <p
                                    class="text-light mb-4"
                                    style="font-family: 'Poppins', sans-serif;"
                                >

                                    {{ $invitation->table->name }}
                                </p>

                                <div
                                    class="bg-white rounded-4 p-4 d-inline-flex justify-content-center align-items-center shadow"
                                >
                                    {!! $qrcode !!}
                                </div>

                                <div class="mt-4">

                                    <p
                                        class="text-light mb-0"
                                        style="font-family: 'Poppins', sans-serif;"
                                    >
                                        Présentez ce QR Code à l’entrée de l’événement.
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- RIGHT : RSVP -->
                    <div class="col-lg-7">

                        <div
                            class="bg-white rounded-4 shadow-lg p-4 p-md-5 h-100"
                        >

                            <div class="section-title mb-4 text-center">

                                <div class="section-sub-title">
                                    <h5
                                        style="font-family: 'Poppins', sans-serif; color: black;"
                                    >
                                        CONFIRMATION
                                    </h5>
                                </div>

                                <div class="section-main-title">
                                    <h1 style="color: black;">
                                        Confirmez votre présence
                                    </h1>
                                </div>

                            </div>

                            <form
                                method="POST"
                                action="{{ route('guest.rsvp', [$event->reference, $invitation->code]) }}"
                            >
                                @csrf

                                <!-- Participation -->
                                <div class="mb-4">

                                    <label
                                        class="form-label fw-semibold mb-3"
                                        style="font-family: 'Poppins', sans-serif; color: black;"
                                    >
                                        Participation
                                    </label>

                                    <div class="d-flex flex-column gap-3">

                                        <div class="form-check">

                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                id="attend"
                                                name="is_attending"
                                                value="1"
                                                checked
                                            >

                                            <label
                                                class="form-check-label"
                                                for="attend"
                                                style="color: black;"
                                            >
                                                Oui, je serai présent(e)
                                            </label>

                                        </div>

                                        <div class="form-check">

                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                id="not"
                                                name="is_attending"
                                                value="0"
                                            >

                                            <label
                                                class="form-check-label"
                                                for="not"
                                                style="color: black;"
                                            >
                                                Désolé(e), je ne pourrai pas venir
                                            </label>

                                        </div>

                                    </div>

                                </div>

                                <!-- Number -->
                                <div class="mb-4">

                                    <label
                                        for="number_of_people"
                                        class="form-label fw-semibold"
                                        style="font-family: 'Poppins', sans-serif; color: black;"
                                    >
                                        Nombre total de personnes
                                    </label>

                                    <select
                                        name="number_of_people"
                                        class="form-select"
                                        required
                                    >
                                        @for($i = 1; $i <= 5; $i++)
                                            <option value="{{ $i }}">
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>

                                </div>

                                <!-- Additional Info -->
                                <div class="mb-4">

                                    <label
                                        for="additional_info"
                                        class="form-label fw-semibold"
                                        style="font-family: 'Poppins', sans-serif; color: black;"
                                    >
                                        Autres informations
                                    </label>

                                    <textarea
                                        name="additional_info"
                                        class="form-control"
                                        rows="5"
                                        placeholder="Allergies, remarques, contraintes alimentaires..."
                                    ></textarea>

                                </div>

                                <!-- Submit -->
                                <div class="text-center">

                                    <button
                                        type="submit"
                                        class="btn btn-dark rounded-pill px-5 py-3"
                                        style="font-family: 'Poppins', sans-serif;"
                                    >
                                        Confirmer ma présence
                                    </button>

                                </div>

                            </form>

                            @if(session('success'))
                                <div class="alert alert-success mt-4 mb-0">
                                    {{ session('success') }}
                                </div>
                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </section>


        @if(!empty($event->gallery) && count($event->gallery) > 0)

            <div class="gallery-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title text-center cursor-scale" data-aos="flip-up">
                                <div class="section-sub-title">
                                    <h5>Gallery of Love</h5>
                                </div>
                                <div class="section-main-title cursor-scale">
                                    <h1>Picture Perfect Moments</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gallery__wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            @forelse($event->gallery as $gallery)
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="gallery__thumb-box">
                                        <div class="gallery__thumb">
                                            <a
                                                class="popup-image"
                                                href="{{ asset('storage/' . $gallery) }}"
                                            ><img
                                                    class="w-100"
                                                    src="{{ asset('storage/' . $gallery) }}"
                                                    alt=""
                                                />
                                                <div class="gallery__thumb-icon">
                                                    <img
                                                        src="{{ asset('templates/lavewell/assets/images/home-1/gallery-icon.png') }}"
                                                        alt="icon"
                                                    />
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        @endif


        <div class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="footer-single-item" data-aos="fade-left">

                            <div class="footer-logo" data-aos="zoom-in">
                                <a href="{{url('www.younestudio.com')}}">
                                    <img src="{{asset('logo_d.svg')}}"
                                         style="width: 50%!important;"
                                         alt="logo"
                                    /></a>
                            </div>


                            <div class="footer-content">
                                <div class="footer-info text-left text-md-center">
                                    <p>
                                        <i class="fa-solid fa-phone-flip"></i>+243 996 852 377
                                    </p>
                                    <span><i class="fa-regular fa-envelope"></i>crea@younestudio.com</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-shape" data-aos="zoom-in">
                    <img src="{{ asset('templates/lavewell/assets/images/home-1/footer-shape.png') }}" alt="shape" />
                </div>
                <div class="footer-shape2" data-aos="zoom-in">
                    <img src="{{ asset('templates/lavewell/assets/images/home-1/footer-shape2.png') }}" alt="shape2" />
                </div>
            </div>
        </div>

        <!--==================================================-->
        <!-- end lovebird Footer Area -->
        <!--==================================================-->



    </div>
</div>

<!--==================================================-->
<!-- Start scrollup section Area -->
<!--==================================================-->

<div id="progress" class="progress hide">
    <div id="progress-value"></div>
</div>

<script>
    const weddingDate = new Date("{{ \Carbon\Carbon::parse($event->wedding_date)->format('Y-m-d H:i:s') }}").getTime();

    function updateCountdown() {

        const now = new Date().getTime();
        const distance = weddingDate - now;

        if (distance <= 0) {

            document.getElementById("days").innerHTML = 0;
            document.getElementById("hours").innerHTML = 0;
            document.getElementById("minutes").innerHTML = 0;
            document.getElementById("seconds").innerHTML = 0;

            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));

        const hours = Math.floor(
            (distance % (1000 * 60 * 60 * 24)) /
            (1000 * 60 * 60)
        );

        const minutes = Math.floor(
            (distance % (1000 * 60 * 60)) /
            (1000 * 60)
        );

        const seconds = Math.floor(
            (distance % (1000 * 60)) / 1000
        );

        document.getElementById("days").innerHTML = days;
        document.getElementById("hours").innerHTML = hours;
        document.getElementById("minutes").innerHTML = minutes;
        document.getElementById("seconds").innerHTML = seconds;
    }

    updateCountdown();

    setInterval(updateCountdown, 1000);
</script>

<!--==================================================-->
<!-- Start scrollup section Area -->
<!--==================================================-->
<script src="{{ asset('templates/lavewell/assets/js/vendor/jquery-3.6.2.min.js') }}"></script>
<script src="{{ asset('templates/lavewell/assets/js/gsap.min.js') }}"></script>
<script src="{{ asset('templates/lavewell/assets/js/ScrollSmoother.min.js') }}"></script>
<script src="{{ asset('templates/lavewell/assets/js/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('templates/lavewell/assets/js/ScrollTrigger.min.js') }}"></script>
<script src="{{ asset('templates/lavewell/assets/js/aos.js') }}"></script>
<script src="{{ asset('templates/lavewell/assets/js/odometer.min.js') }}"></script>
<script src="{{ asset('templates/lavewell/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('templates/lavewell/assets/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('templates/lavewell/venobox/venobox.js') }}"></script>
<script src="{{ asset('templates/lavewell/venobox/venobox.min.js') }}"></script>
<script src="{{ asset('templates/lavewell/assets/js/jquery.meanmenu.js') }}"></script>
<script src="{{ asset('templates/lavewell/assets/js/jquery.scrollUp.js') }}"></script>
<script src="{{ asset('templates/lavewell/assets/js/appear.js') }}"></script>
<script src="{{ asset('templates/lavewell/assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('templates/lavewell/assets/js/jquery.barfiller.js') }}"></script>
<script src="{{ asset('templates/lavewell/assets/js/swiper-bundle.js') }}"></script>
<script src="{{ asset('templates/lavewell/assets/js/theme.js') }}"></script>
<script src="{{ asset('templates/lavewell/assets/js/my.js') }}"></script>

</body>

</html>
