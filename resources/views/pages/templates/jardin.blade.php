@php
    $preview = $preview ?? false;
    $weddingDate = $event->wedding_date ? \Carbon\Carbon::parse($event->wedding_date)->locale('fr') : null;
    $moments = [
        ['title' => 'Le mariage civil', 'place' => $event->civil_commune, 'address' => null, 'date' => $event->civil_date, 'time' => $event->civil_time],
        ['title' => 'La bénédiction nuptiale', 'place' => $event->church_name, 'address' => $event->church_address, 'date' => $event->church_date, 'time' => $event->church_time],
        ['title' => 'Un soir pour célébrer', 'place' => $event->reception_hall, 'address' => $event->reception_address, 'date' => $event->reception_date, 'time' => $event->reception_time],
    ];
    $moments = array_values(array_filter($moments, fn ($moment) => $moment['place'] || $moment['date'] || $moment['time']));
    $coverPhoto = $event->couple_photo
        ? asset('storage/' . $event->couple_photo)
        : ($preview ? asset('core/images/couple-1.jpg') : (!empty($event->gallery) ? asset('storage/' . $event->gallery[0]) : null));
    $flower = asset('template2/images/slider/invitation-shape-1.png');
@endphp
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <meta name="theme-color" content="#fcf9f2">
    <title>{{ $event->groom_name }} & {{ $event->bride_name }} — Vous êtes invités</title>
    @include('partials.share-meta')
    <meta name="description" content="Une journée d’amour, une vie à deux. Retrouvez votre invitation et le programme de notre mariage.">
    <link rel="icon" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('templates/jardin/style.css') }}">
</head>
<body>
<img class="ambient ambient-left" src="{{ $flower }}" alt="" aria-hidden="true">
<img class="ambient ambient-right" src="{{ $flower }}" alt="" aria-hidden="true">
<aside class="desktop-note" aria-hidden="true"><span>Une journée d’amour.<br>Une vie à deux.</span>Le début de notre toujours</aside>
<main class="invitation {{ $coverPhoto ? 'invitation--photo' : '' }}">
    @if($preview)<div class="preview-note">Aperçu du modèle · Jardin de promesses</div>@endif
    <header class="hero {{ $coverPhoto ? 'hero--photo' : '' }}">
    @if($coverPhoto)
        <div class="cover-photo">
            <img src="{{ $coverPhoto }}" alt="{{ $event->groom_name }} et {{ $event->bride_name }}" fetchpriority="high" loading="eager">
        </div>
    @endif
        <img class="floral floral-top" src="{{ $flower }}" alt="">
        <p class="eyebrow">Ensemble, pour toujours</p>
        <h1><span>{{ $event->groom_name }}</span><em>&</em><span>{{ $event->bride_name }}</span></h1>
        <p class="script">Nous nous marions ce</p>
        @if($weddingDate)
            <div class="date-line"><span>{{ $weddingDate->translatedFormat('l') }}</span><strong>{{ $weddingDate->format('d') }}</strong><span>{{ $weddingDate->translatedFormat('F') }}</span></div>
            <div class="year">{{ $weddingDate->format('Y') }}</div>
        @endif
        <a class="button" href="#rsvp">Répondre à l’invitation <span aria-hidden="true">↗</span></a>
        <a href="#invitation" class="scroll-hint">DÉCOUVRIR NOTRE JOURNÉE ↓</a>
        <img class="floral floral-bottom" src="{{ $flower }}" alt="">
    </header>
    <section class="section guest-card" id="invitation" aria-labelledby="guest-title">
        <p class="eyebrow">Une attention rien que pour vous</p>
        <h2 class="guest-name" id="guest-title">{{ $invitation->guest?->name ?? 'Chers invités' }}</h2>
        <div class="ornament" aria-hidden="true">❧</div>
        <p>Certains instants sont encore plus beaux lorsqu’ils sont partagés. Votre présence à nos côtés serait notre plus beau cadeau.</p>
    </section>
    @if(count($moments))
        <section class="section" aria-labelledby="programme-title">
            <p class="eyebrow">Le rendez-vous de notre vie</p>
            <h2 id="programme-title">Une journée,<br><em>mille souvenirs</em></h2>
            <div class="ornament" aria-hidden="true">❧</div>
            <div class="timeline">
                @foreach($moments as $moment)
                    <article class="moment">
                        <span class="moment-number" aria-hidden="true">{{ sprintf('%02d', $loop->iteration) }}</span>
                        <div><h3>{{ $moment['title'] }}</h3>
                            <p class="time">@if($moment['date']){{ \Carbon\Carbon::parse($moment['date'])->locale('fr')->translatedFormat('d F Y') }}@endif @if($moment['date'] && $moment['time']) · @endif @if($moment['time']){{ \Carbon\Carbon::parse($moment['time'])->format('H\hi') }}@endif</p>
                            @if($moment['place'])<p><strong>{{ $moment['place'] }}</strong></p>@endif
                            @if($moment['address'])<p>{{ $moment['address'] }}</p>@endif
                            @if($moment['address'])<a class="map-link" href="https://www.google.com/maps/search/?api=1&query={{ rawurlencode($moment['place'] . ', ' . $moment['address']) }}" target="_blank" rel="noopener noreferrer">VOIR L’ITINÉRAIRE ↗</a>@endif
                        </div>
                    </article>
                @endforeach
            </div>
            @if($event->theme)<div class="dress-code"><div class="eyebrow">Une touche d’élégance · Dress code</div><p>{{ $event->theme }}</p></div>@endif
        </section>
    @endif
    @if($event->husband_description || $event->wife_description)
        <section class="section" aria-labelledby="couple-title">
            <p class="eyebrow">Quelques mots pour nous découvrir</p><h2 id="couple-title">Les <em>mariés</em></h2>
            @foreach([['name' => $event->husband_fullname ?: $event->groom_name, 'description' => $event->husband_description, 'image' => $event->husband_image], ['name' => $event->wife_fullname ?: $event->bride_name, 'description' => $event->wife_description, 'image' => $event->wife_image]] as $person)
                @if($person['description'])<article class="couple-detail">@if($person['image'])<img src="{{ asset('storage/' . $person['image']) }}" alt="{{ $person['name'] }}" loading="lazy">@endif<h3>{{ $person['name'] }}</h3><p>{{ $person['description'] }}</p></article>@endif
            @endforeach
        </section>
    @endif
    @if(!empty($event->gallery))
        <section class="section" aria-labelledby="gallery-title"><p class="eyebrow">Quelques éclats de nous</p><h2 id="gallery-title">L’amour, <em>en images</em></h2><div class="gallery">@foreach($event->gallery as $photo)<a href="{{ asset('storage/' . $photo) }}" target="_blank" rel="noopener"><img src="{{ asset('storage/' . $photo) }}" alt="Souvenir du couple {{ $loop->iteration }}" loading="lazy"></a>@endforeach</div></section>
    @endif
    <section class="section rsvp" id="rsvp" aria-labelledby="rsvp-title">
        <p class="eyebrow">Serez-vous de la fête ?</p><h2 id="rsvp-title">Dites-nous <em>oui</em></h2>
        <p class="small">Un petit mot de vous, un grand bonheur pour nous.</p>
        @if(session('success'))<div class="notice" role="status">{{ session('success') }}</div>@endif
        @if($errors->any())<div class="notice error" role="alert"><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
        @if($preview)<p class="notice">Ceci est un aperçu. Les réponses ne sont pas envoyées.</p>@endif
        <form method="POST" @if(!$preview)action="{{ route('guest.rsvp', [$event->reference, $invitation->code]) }}"@endif>
            @csrf
            <fieldset><legend>Votre présence</legend>
                <label class="choice"><input type="radio" name="is_attending" value="1" @checked((int) old('is_attending', $invitation->is_attending ?? 1) === 1) required> Avec joie, je serai là</label>
                <label class="choice"><input type="radio" name="is_attending" value="0" @checked((int) old('is_attending', $invitation->is_attending ?? 1) === 0)> Je ne pourrai malheureusement pas venir</label>
            </fieldset>
            <label class="field"><span>Nombre de personnes, vous compris</span><select name="number_of_people" required>@for($n = 1; $n <= 10; $n++)<option value="{{ $n }}" @selected((int) old('number_of_people', $invitation->number_of_people ?? 1) === $n)>{{ $n }} {{ $n === 1 ? 'personne' : 'personnes' }}</option>@endfor</select></label>
            <label class="field"><span>Un petit mot ou une attention particulière</span><textarea name="additional_info" rows="3" maxlength="1000" placeholder="Vos vœux, une allergie, une précision…">{{ old('additional_info', $invitation->additional_info) }}</textarea></label>
            <button class="button" type="{{ $preview ? 'button' : 'submit' }}" @if($preview)onclick="document.getElementById('demo-status').hidden = false"@endif>Envoyer ma réponse <span aria-hidden="true">↗</span></button>
            @if($preview)<p class="notice" id="demo-status" role="status" hidden>Aperçu uniquement : votre réponse n’a pas été envoyée.</p>@endif
        </form>
    </section>
    <section class="section" aria-labelledby="ticket-title">
        <p class="eyebrow">Gardez ce précieux sésame</p><h2 id="ticket-title">Votre place<br><em>parmi nous</em></h2>
        <div class="ticket"><p class="eyebrow">{{ $invitation->guest?->name ?? 'Votre invitation' }}</p><h3>{{ $invitation->table?->name ? 'Table ' . $invitation->table->name : 'Bienvenue à notre mariage' }}</h3>
            @if(!$preview)<div class="qr" role="img" aria-label="QR code de votre invitation">{!! $qrcode !!}</div><code>{{ $invitation->code }}</code><p class="small">Présentez ce QR code à votre arrivée.<br>Cette invitation vous est personnellement réservée.</p>
            @else<div class="ornament" aria-hidden="true">❧</div><p class="small">Votre QR code personnel apparaîtra ici<br>sur l’invitation définitive.</p>@endif
        </div>
    </section>
    <footer class="closing"><div class="ornament" aria-hidden="true">❧</div><p class="small">Nous avons hâte de vous retrouver.</p><p class="script">{{ $event->groom_name }} & {{ $event->bride_name }}</p><p class="eyebrow">Fait avec amour · <a href="{{ route('home') }}">Libala.org</a></p></footer>
</main>
@if($preview)<script>document.querySelector('.rsvp form').addEventListener('submit', function(event) { event.preventDefault(); document.getElementById('demo-status').hidden = false; });</script>@endif
</body>
</html>
