@extends('layouts.app')

@section('title', $event->groom_name . ' & ' . $event->bride_name)
@section('description', 'Créez, partagez et gérez vos invitations de mariage en ligne.')
@section('keywords', 'libala, mariage congolais, digital wedding, gestion mariage')

@section('og_title', $event->groom_name . ' & ' . $event->bride_name)
@section('og_description', 'Un portail simple pour organiser votre cérémonie avec style.')
@section('og_image', asset('storage/' . $event->couple_photo))
@section('og_url', url()->current())

@section('twitter_title', $event->groom_name . ' & ' . $event->bride_name)
@section('twitter_description', 'Créez vos invitations digitales avec amour ❤️')
@section('twitter_image', asset('storage/' . $event->couple_photo))

@section('content')
    <section class="static-hero-s2">
        <div class="hero-container">
            <div class="hero-inner">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6 col-12">
                            <div class="wpo-static-hero-inner">
                                <div class="slide-title-sub wow fadeInUp" data-wow-duration="1400ms">
                                    <h3 class="dancing-script">
                                        {{$event->groom_name}} & {{$event->bride_name}}
                                    </h3>
                                </div>
                                <div class="slide-title wow fadeInUp" data-wow-duration="1500ms">
                                    <h2 class="dancing-script">
                                        Save the Date
                                    </h2>
                                </div>
                                <div data-swiper-parallax="400" class="slide-text wow fadeInUp"
                                     data-wow-duration="1600ms">
                                    <p>
                                        {{ mb_strtoupper(\Carbon\Carbon::parse($event->wedding_date)->translatedFormat('l d F Y')) }}
                                    </p>

                                    <p>Invité : {{ $invitation->guest->name }}</p>
                                    <p>Table : {{ $invitation->table->name }}</p>

                                    <br>

                                    <div>{!! $qrcode !!}</div>
                                </div>
                                <div class="shape-2 wow fadeInUp" data-wow-duration="1800ms"><img
                                        src="{{asset('assets/images/slider/shape2.svg')}}" alt=""></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="static-hero-right">
            <div class="static-hero-img scene" id="scene">
                <div class="static-hero-img-inner">

                    <img class="zoom" src="{{ asset('storage/' . $event->couple_photo) }}"
                         alt="Photo du couple"
                    >

                    <div class="hero-img-inner-shape-2">
                        <img src="{{asset('assets/images/slider/shape10.svg')}}" alt="">
                    </div>
                </div>
                <div class="static-hero-shape-1 wow fadeInUp" data-wow-delay=".5s">
                    <img src="{{asset('assets/images/slider/shape7.svg')}}" alt="">
                </div>
                <div class="static-hero-shape-2 wow fadeInDown" data-wow-delay=".5s">
                    <img src="{{asset('assets/images/slider/shape8.svg')}}" alt="">
                </div>
            </div>
        </div>
        <div class="left-shape">
            <div class="left-shape-1">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 177 383" fill="none">
                    <path
                        d="M167.726 404.933C178.762 383.436 180.815 359.362 167.119 341.847C147.887 317.271 96.7324 307.231 84.7796 280.695C77.4608 264.444 87.5548 247.29 95.5965 231.18C105.368 211.617 112.299 191.009 109.447 170.492C106.594 149.975 92.8858 129.419 67.8444 117.214C52.3548 109.662 31.5859 104.223 26.2291 91.9796C23.3377 85.3811 25.8806 78.3444 27.5715 71.5654C31.7795 54.7211 30.6307 37.2969 24.2155 20.7619C22.0211 15.1041 19.0136 9.33044 12.7016 5.2579C6.38957 1.19826 -4.06587 -0.567362 -11.3847 2.68035C-19.4392 6.25026 -20.317 13.738 -20.3944 20.1561C-20.7946 53.4581 -21.1947 86.7472 -21.5949 120.049C-22.8857 227.288 -24.1636 334.514 -23.9828 441.753C-23.9699 445.761 -23.686 450.233 -19.3489 453.017C-15.5798 455.453 -9.86154 455.853 -4.608 456.059C28.0749 457.412 81.8624 461.91 112.583 453.017C135.534 446.393 156.38 427.036 167.726 404.933Z"
                        fill=""/>
                </svg>
            </div>
            <div class="left-shape-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 410 440" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M114.534 36.9236C91.906 7.20447 50.5877 -1.63653 13.232 0.245079C-29.3255 2.38445 -85.488 15.3238 -116.39 47.4916C-140.056 72.1229 -138.743 104.88 -137.465 136.771C-137.445 137.285 -137.424 137.798 -137.404 138.312C-133.87 226.123 -137.18 314.641 -140.48 402.886C-141.808 438.405 -143.135 473.88 -144.013 509.247C-70.5793 518.256 3.70596 516.31 77.6556 514.338L113.717 513.377C128.295 512.988 142.872 512.6 157.453 512.211L158.084 512.194C232.198 510.215 306.4 508.234 380.179 500.896C385.691 500.354 391.5 499.659 395.94 496.346C400.458 492.97 402.768 487.441 404.472 482.067C422.518 425.013 386.362 356.72 328.986 339.464C311.749 334.282 293.715 333.293 275.655 332.303C260.297 331.461 244.92 330.618 229.995 327.195C177.073 315.041 134.167 267.679 127.364 213.885C124.625 192.258 127.225 170.517 129.826 148.773C130.828 140.391 131.831 132.009 132.527 123.632C135.031 93.5267 132.837 60.9722 114.534 36.9236ZM247.708 265.26C235.639 277.593 215.606 280.403 199.638 273.83C141.837 250.039 162.593 158.098 227.675 189.454C241.434 196.091 252.871 208.077 257.273 222.691C261.687 237.293 258.395 254.357 247.708 265.26Z"
                          fill=""/>
                </svg>
            </div>
        </div>
        <div class="right-shapes">
            <div class="right-shape-1">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 182 369" fill="none">
                    <path
                        d="M9.41696 -35.934C-1.61934 -14.4372 -3.67169 9.63712 10.0237 27.1516C29.2565 51.7285 80.4107 61.7681 92.3635 88.304C99.6823 104.555 89.5883 121.709 81.5466 137.819C71.7753 157.382 64.8437 177.99 67.6964 198.507C70.549 219.025 84.2573 239.58 109.299 251.785C124.788 259.337 145.557 264.776 150.914 277.019C153.805 283.618 151.262 290.655 149.572 297.434C145.364 314.278 146.512 331.702 152.928 348.237C155.122 353.895 158.13 359.669 164.442 363.741C170.753 367.801 181.209 369.566 188.528 366.319C196.582 362.749 197.46 355.261 197.538 348.843C197.938 315.541 198.338 282.252 198.738 248.95C200.029 141.711 201.307 34.4847 201.126 -72.7543C201.113 -76.7624 200.829 -81.2344 196.492 -84.0182C192.723 -86.454 187.005 -86.8535 181.751 -87.0597C149.068 -88.4129 95.2807 -92.9107 64.5598 -84.0182C41.6094 -77.3939 20.7631 -58.0365 9.41696 -35.934Z"
                        fill=""/>
                </svg>
            </div>
            <div class="right-shape-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 414 426" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M294.609 389.075C317.237 418.795 358.555 427.636 395.911 425.754C438.469 423.615 494.631 410.675 525.533 378.507C549.199 353.876 547.886 321.119 546.609 289.228C546.588 288.714 546.567 288.201 546.547 287.687C543.013 199.877 546.323 111.358 549.623 23.1129C550.951 -12.4064 552.278 -47.8813 553.156 -83.248C479.722 -92.2566 405.437 -90.3105 331.487 -88.3387L295.426 -87.3777C280.848 -86.9892 266.271 -86.6007 251.69 -86.2122L251.059 -86.1954C176.945 -84.2163 102.743 -82.2348 28.9636 -74.8968C23.4519 -74.3555 17.6434 -73.6595 13.203 -70.3474C8.68524 -66.9708 6.37469 -61.4419 4.67084 -56.0677C-13.3745 0.986389 22.7807 69.2786 80.1566 86.5353C97.3944 91.7174 115.428 92.706 133.488 93.6962C148.846 94.5381 164.223 95.3812 179.148 98.8044C232.07 110.958 274.976 158.32 281.779 212.114C284.518 233.741 281.918 255.482 279.317 277.226C278.315 285.608 277.312 293.99 276.616 302.367C274.112 332.472 276.306 365.027 294.609 389.075ZM161.435 160.739C173.504 148.406 193.537 145.596 209.505 152.169C267.306 175.96 246.55 267.901 181.469 236.545C167.709 229.908 156.272 217.922 151.871 203.308C147.456 188.706 150.748 171.642 161.435 160.739Z"
                          fill=""/>
                </svg>
            </div>
        </div>
    </section>
    <!-- end of hero slider -->

    <!-- start wpo-event-section -->
    <section class="wpo-event-section section-padding" id="event">
        <div class="container">
            <div class="wpo-section-title">
{{--                <span>Our Wedding</span>--}}
                <h2>Programme</h2>
            </div>
            <div class="wpo-event-wrap">
                @php
                    $eventCount = collect([
                        $event->civil_date || $event->civil_time || $event->civil_commune,
                        $event->church_name || $event->church_date || $event->church_time,
                        $event->reception_date || $event->reception_time || $event->reception_hall,
                    ])->filter()->count();
                @endphp


                <div class="row justify-content-center">
                    {{-- Mariage Civil --}}
                    @if($event->civil_date || $event->civil_time || $event->civil_commune)
                        <div class="col {{ $eventCount == 1 ? 'col-lg-6' : ($eventCount == 2 ? 'col-lg-5' : 'col-lg-4') }} col-md-6 col-12">
                            <div class="wpo-event-item wow fadeInUp" data-wow-duration="1000ms">
                                <div class="wpo-event-text">
                                    <div class="title">
                                        <h2>Mariage Civil</h2>
                                    </div>
                                    <ul>
                                        @if($event->civil_date || $event->civil_time)
                                            <li>
                                                {{ mb_strtoupper(\Carbon\Carbon::parse($event->civil_date)->translatedFormat('l d F Y')) ?? '' }}<br>
                                                <i class="fa-solid fa-clock"></i> {{ $event->civil_time ? \Carbon\Carbon::parse($event->civil_time)->format('H:i') : '' }}
                                            </li>
                                        @endif
                                        @if($event->civil_commune)
                                            <li>Commune : {{ $event->civil_commune }}</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Mariage Religieux --}}
                    @if($event->church_name || $event->church_date || $event->church_time)
                        <div class="col {{ $eventCount == 1 ? 'col-lg-6' : ($eventCount == 2 ? 'col-lg-5' : 'col-lg-4') }} col-md-6 col-12">
                            <div class="wpo-event-item wow fadeInUp" data-wow-duration="1200ms">
                                <div class="wpo-event-text">
                                    <div class="title">
                                        <h2>Mariage Religieux</h2>
                                    </div>
                                    <ul>
                                        @if($event->church_date || $event->church_time)
                                            <li>
                                                {{ mb_strtoupper(\Carbon\Carbon::parse($event->church_date)->translatedFormat('l d F Y')) ?? '' }}<br>
                                                {{ $event->church_time ? \Carbon\Carbon::parse($event->church_time)->format('H:i') : '' }}
                                            </li>
                                        @endif
                                        @if($event->church_name)
                                            <li>{{ $event->church_name }}</li>
                                        @endif
                                        @if($event->church_address)
                                            <li>{{ $event->church_address }}</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Soirée --}}
                    @if($event->reception_date || $event->reception_time || $event->reception_hall)
                        <div class="col {{ $eventCount == 1 ? 'col-lg-6' : ($eventCount == 2 ? 'col-lg-5' : 'col-lg-4') }} col-md-6 col-12">
                            <div class="wpo-event-item wow fadeInUp" data-wow-duration="1400ms">
                                <div class="wpo-event-text">
                                    <div class="title">
                                        <h2>Soirée</h2>
                                    </div>
                                    <ul>
                                        @if($event->reception_date || $event->reception_time)
                                            <li>
                                                {{ mb_strtoupper(\Carbon\Carbon::parse($event->reception_date)->translatedFormat('l d F Y')) ?? '' }}<br>
                                                {{ $event->reception_time ? \Carbon\Carbon::parse($event->reception_time)->format('H:i') : '' }}
                                            </li>
                                        @endif
                                        @if($event->reception_hall)
                                            <li>{{ $event->reception_hall }}</li>
                                        @endif
                                        @if($event->reception_address)
                                            <li>{{ $event->reception_address }}</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div> <!-- end container -->
    </section>
    <!-- end wpo-event-section -->
@endsection
