<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bienvenue sur Libala.org</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">

    <meta name="description" content="Organisez votre mariage avec élégance. Invitations, placement des invités, planification – tout en ligne.">
    <meta name="keywords" content="mariage, invitation mariage, gestion invités, libala, Congo, digital wedding">
    <meta name="author" content="Wedding Manager">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph (Facebook, WhatsApp, LinkedIn) -->
    <meta property="og:title" content="Wedding Manager – Invitations de mariage digitales">
    <meta property="og:description" content="Créez et gérez vos invitations de mariage en ligne. Simple, rapide et élégant.">
    <meta property="og:image" content="{{ asset('images/wedding-cover.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Wedding Manager">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Wedding Manager – Invitations de mariage digitales">
    <meta name="twitter:description" content="Organisez le plus beau jour de votre vie avec des invitations modernes et personnalisées.">
    <meta name="twitter:image" content="{{ asset('images/wedding-cover.jpg') }}">


    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('https://images.unsplash.com/photo-1730321885391-74a0c04ef211?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') center/cover no-repeat;
            font-family: 'Dancing Script', cursive;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.6);
            background-blend-mode: overlay;
        }

        .container {
            padding: 30px;
        }

        h1 {
            font-size: 4em;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.5em;
            margin-bottom: 30px;
        }

        .btn {
            padding: 12px 25px;
            background: white;
            color: #111;
            font-weight: bold;
            font-size: 1em;
            text-decoration: none;
            border-radius: 6px;
            margin: 10px;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background: #f7c9c9;
            color: #000;
        }
    </style>
</head>
<body>
<div class="container">

    <h1>Bienvenue au portail mariage Libala.org</h1>
    <p>Gérez vos invités, vos tables et le plus beau jour de votre vie ❤️</p>

    <a href="mailto:reservation@libala.org" class="btn">
        <i class="fa-solid fa-envelope"></i> Contactez-nous par mail
    </a>

    <a href="https://wa.me/243996852377?text=Bonjour%2C%20je%20suis%20int%C3%A9ress%C3%A9%20par%20les%20invitations%20en%20ligne." class="btn" target="_blank">
        <i class="fa-brands fa-whatsapp"></i> Contactez-nous par WhatsApp
    </a>

</div>
</body>
</html>
