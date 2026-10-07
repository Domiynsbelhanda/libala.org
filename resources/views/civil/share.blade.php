@php
    $imageUrl = route('civil.image', ['reference' => $wedding->reference, 'code' => $guest->code, 'v' => app(\App\Services\CivilInvitationImage::class)->version($wedding, $guest)]);
@endphp
<!DOCTYPE html>
<html lang="fr" class="share-document">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="robots" content="noindex, nofollow"><title>Partager l’invitation de {{ $guest->name }}</title><link rel="stylesheet" href="{{ asset('templates/civil-ambre/style.css') }}"></head>
<body class="share-page">
<main class="share-panel">
    <h1>L’invitation de {{ $guest->name }}</h1>
    <img src="{{ $imageUrl }}" alt="Invitation personnalisée de {{ $guest->name }}">
    <a id="share-whatsapp" href="{{ $guest->whatsappUrl() }}" target="_blank" rel="noopener">Partager sur WhatsApp — message complet + lien</a>
    <button id="share-image" class="secondary" type="button">Partager aussi le fichier image</button>
    <p>Le bouton WhatsApp prépare le message complet ci-dessous avec le lien de votre invitation. Pour joindre le fichier image, utilisez le partage du téléphone ou téléchargez-le. Si WhatsApp omet la légende du fichier, collez le message avec « Copier le message ».</p>
    <a href="{{ $imageUrl }}" download="invitation-mariage-civil.jpg" class="secondary">Télécharger l’image</a>
    <label for="share-text">Message à partager</label>
    <textarea id="share-text" readonly>{{ $guest->shareText() }}</textarea>
    <button id="copy-text" class="secondary" type="button">Copier le message</button>
    <p id="status" class="status" role="status" aria-live="polite"></p>
    <a href="{{ $guest->invitationUrl() }}" class="secondary">Voir l’invitation</a>
</main>
<script>
(() => {
    const status = document.getElementById('status');
    const field = document.getElementById('share-text');
    const button = document.getElementById('share-image');
    let imageFile;
    const imageReady = fetch(@json($imageUrl)).then(response => {
        if (!response.ok) throw new Error('image');
        return response.blob();
    }).then(blob => {
        imageFile = new File([blob], 'invitation-mariage-civil.jpg', {type: 'image/jpeg'});
    }).catch(() => { status.textContent = 'L’image n’a pas pu être préparée. Vous pouvez la télécharger avec le lien ci-dessus.'; });
    button.addEventListener('click', async () => {
        if (!imageFile) { status.textContent = 'La préparation de l’image est en cours. Réessayez dans un instant.'; return; }
        if (!navigator.canShare?.({files: [imageFile]})) {
            status.textContent = 'Le partage direct de fichiers n’est pas disponible ici. Téléchargez l’image puis joignez-la dans WhatsApp avec le message.';
            return;
        }
        try {
            await navigator.share({files: [imageFile], text: field.value, title: 'Invitation au mariage civil'});
        } catch (error) {
            if (error.name !== 'AbortError') status.textContent = 'Utilisez le téléchargement de l’image et le bouton WhatsApp.';
        }
    });
    document.getElementById('copy-text').addEventListener('click', async () => {
        try { await navigator.clipboard.writeText(field.value); status.textContent = 'Message copié.'; }
        catch { field.focus(); field.select(); status.textContent = 'Sélectionnez et copiez le message ci-dessus.'; }
    });
})();
</script>
</body>
</html>
