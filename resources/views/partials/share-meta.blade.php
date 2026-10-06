@php
    $shareEvent = $event ?? null;
    $shareImage = app(\App\Services\WeddingShareImage::class)->url($shareEvent);
    $shareTitle = $shareEvent ? $shareEvent->groom_name . ' & ' . $shareEvent->bride_name . ' — Notre mariage' : 'Libala.org — Invitations de mariage';
    $shareDescription = 'Nous serions heureux de partager ce moment avec vous.';
@endphp
<meta property="og:type" content="website">
<meta property="og:site_name" content="Libala.org">
<meta property="og:locale" content="fr_FR">
<meta property="og:title" content="{{ $shareTitle }}">
<meta property="og:description" content="{{ $shareDescription }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ $shareImage }}">
@if(str_starts_with($shareImage, 'https://'))
<meta property="og:image:secure_url" content="{{ $shareImage }}">
@endif
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="{{ $shareTitle }}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $shareTitle }}">
<meta name="twitter:description" content="{{ $shareDescription }}">
<meta name="twitter:image" content="{{ $shareImage }}">
<meta name="twitter:image:alt" content="{{ $shareTitle }}">
