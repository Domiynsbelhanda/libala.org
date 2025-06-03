<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultat de l’invitation</title>
</head>
<body>
<h2>Résultat de la vérification</h2>

<div class="alert alert-info">{{ $message }}</div>

<p><strong>Nom :</strong> {{ $invitation->guest->name }}</p>
<p><strong>Téléphone :</strong> {{ $invitation->guest->phone }}</p>
<p><strong>Événement :</strong> {{ $invitation->event->bride_name }} & {{ $invitation->event->groom_name }}</p>
<p><strong>Date :</strong> {{ $invitation->event->wedding_date }}</p>
<p><strong>Table :</strong> {{ $invitation->table->name }}</p>
</body>
</html>
