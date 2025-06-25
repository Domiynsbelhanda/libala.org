<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>{{ $event->groom_name . ' & ' . $event->bride_name }} - Invitation de {{ $invitation->guest->name }}</title>

    <!-- Polices & Meta -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f2f2f2;
            font-family: 'Poppins', sans-serif;
        }

        .template {
            width: 1000px;
            height: 1000px;
            background-image: url('{{ asset('storage/' . $event->w_image) }}');
            background-size: cover;
            background-position: center;
            position: relative;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .center-wrapper {
            width: 100%;
            height: 100%;
            position: relative;
        }

        .qr-text-wrapper {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: 190px!important;
            transform: translate(-50%, -50%);
        }

        .qrcode-wrapper {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .qr-text {
            font-size: 60px;
            color: #2d1a09;
            font-weight: bold;
            text-align: center;
            white-space: nowrap;
            mix-blend-mode: difference; /* optionnel si image de fond claire */
        }
    </style>
</head>

<body>
<div class="template">
    <div class="center-wrapper">
        <div class="qrcode-wrapper">
            {!! $qrcode !!}
        </div>

        <div class="qr-text-wrapper">
            <div class="qr-text">
                {{ $invitation->guest->name }}
            </div>
        </div>
    </div>
</div>
</body>
</html>
