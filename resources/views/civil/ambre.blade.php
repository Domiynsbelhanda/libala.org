@php
    $preview = $preview ?? false;
    $images = app(\App\Services\CivilInvitationImage::class);
    $hasPhoto = $images->photoSource($wedding) !== null;
    $photoUrl = $preview ? route('civil.preview.photo', ['v' => $images->photoVersion($wedding)]) : route('civil.photo', ['reference' => $wedding->reference, 'code' => $guest->code, 'v' => $images->photoVersion($wedding)]);
    $date = $wedding->date->locale('fr');
    $couple = $wedding->event->groom_name . ' & ' . $wedding->event->bride_name;
    $imageUrl = $preview ? route('civil.preview.image') : route('civil.image', ['reference' => $wedding->reference, 'code' => $guest->code, 'v' => app(\App\Services\CivilInvitationImage::class)->version($wedding, $guest)]);
@endphp
<!DOCTYPE html>
<html lang="fr" class="civil-scroll-document">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#421d0e">
    <meta name="robots" content="noindex, nofollow">
    <title>{{ $couple }} · Mariage civil · {{ $guest->name }}</title>
    <meta name="description" content="Votre invitation au mariage civil de {{ $couple }}.">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $couple }} — Mariage civil">
    <meta property="og:description" content="Invitation de {{ $guest->name }} · {{ $date->translatedFormat('d F Y') }} à {{ substr($wedding->time, 0, 5) }} · {{ $wedding->venue }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ $imageUrl }}">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="1000">
    <meta property="og:image:height" content="1500">
    <meta property="og:image:alt" content="Invitation de {{ $guest->name }} au mariage civil de {{ $couple }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="{{ $imageUrl }}">
    <link rel="stylesheet" href="{{ asset('templates/civil-ambre/style.css') . '?v=' . filemtime(public_path('templates/civil-ambre/style.css')) }}">
    <link rel="preload" as="image" href="{{ $hasPhoto ? $photoUrl : asset('templates/civil-ambre/background.png') }}">
</head>
<body class="civil-scroll-page">
    <aside class="ambient-caption" aria-hidden="true"><span>Un oui.<br>Pour toute une vie.</span><small>JARDIN D’AMBRE · LIBALA</small></aside>
    <main class="civil-page">
    <header class="civil-card {{ $hasPhoto ? 'civil-card--photo' : '' }}" aria-label="Invitation au mariage civil">
        @if($hasPhoto)<img class="civil-photo" src="{{ $photoUrl }}" alt="{{ $couple }}, entourés de fleurs et de drapés" fetchpriority="high">
        <div class="civil-photo-veil" aria-hidden="true"></div>
        <img class="civil-frame" src="{{ asset('templates/civil-ambre/frame.png') }}" alt="" aria-hidden="true">@endif
        <div class="civil-safe-area">
            <div class="civil-content">
                <h1>Invitation Mariage Civil</h1>
                <p class="couple"><span>{{ $couple }}</span></p>
                <div class="ornament" aria-hidden="true">✧</div>
                <div class="schedule civil-cover-schedule">
                    <p class="day">{{ $date->translatedFormat('l') }}</p>
                    <p class="date">{{ $date->translatedFormat('d F Y') }}</p>
                    <p class="time">À {{ str_replace(':', 'h', substr($wedding->time, 0, 5)) }}</p>
                </div>
            </div>
        </div>
    </header>
    <section class="civil-guest-section" aria-labelledby="guest-name">
        <p class="eyebrow">Une attention rien que pour vous</p>
        <p class="invitation-label">Invitation de :</p>
        <h2 id="guest-name">{{ $guest->name }}</h2>
        <div class="ornament" aria-hidden="true">✧</div>

        <div class="place">
            <p class="venue">
                {{ $wedding->venue }}
            </p>
            @if($wedding->address)
                <p class="address">
                    {{ $wedding->address }}
                </p>
            @endif
        </div>

        <div class="schedule">
            <p class="day">{{ $date->translatedFormat('l') }}</p>
            <p class="date">{{ $date->translatedFormat('d F Y') }}</p>
            <p class="time">À {{ str_replace(':', 'h', substr($wedding->time, 0, 5)) }}</p>
        </div>

        <div class="ornament" aria-hidden="true">✧</div>

        <p class="civil-welcome">Nous serions heureux de vous avoir à nos côtés.</p>
    </section>
    @if($wedding->theme_image)
    <section class="civil-theme-section" aria-labelledby="theme-title">
        <h2 id="theme-title">{{ $wedding->theme_title ?: 'Notre thème' }}</h2>
        <img src="{{ route('civil.theme-image', ['reference' => $wedding->reference, 'code' => $guest->code], false) }}" alt="{{ $wedding->theme_title ?: 'Notre thème' }}" loading="lazy">
    </section>
    @endif
    <footer class="civil-page-footer">{{ $preview ? 'APERÇU · JARDIN D’AMBRE' : 'LIBALA.ORG' }}</footer>
    </main>
    <script src="{{ asset('templates/civil-ambre/fit.js') }}" defer></script>
</body>
</html>
