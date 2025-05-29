<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Gestionnaire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .login-page {
            min-height: 100vh;
            display: flex;
            flex-direction: row;
        }

        .image-section {
            background-image: url('https://images.unsplash.com/photo-1730321885391-74a0c04ef211?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: center;
        }

        @media (max-width: 768px) {
            .image-section {
                display: none;
            }

            body {
                background-image: url('https://images.unsplash.com/photo-1730321885391-74a0c04ef211?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }

            .form-wrapper {
                background-color: rgba(255, 255, 255, 0.95);
                padding: 2rem;
                border-radius: 10px;
                margin: 2rem;
            }
        }

        .powered {
            font-size: 0.9rem;
            color: #666;
            margin-top: 2rem;
        }
    </style>
</head>
<body>

<div class="container-fluid login-page">
    <!-- Image à gauche desktop -->
    <div class="col-md-6 d-none d-md-block image-section"></div>

    <!-- Formulaire -->
    <div class="col-md-6 d-flex align-items-center justify-content-center">
        <div class="form-wrapper w-100 px-4" style="max-width: 400px">
            <h2 class="mb-4 text-center">Connexion au mariage</h2>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('event.login') }}">
                @csrf
                <div class="mb-3">
                    <label for="reference" class="form-label">ID de l'événement</label>
                    <input type="text" name="reference" id="reference" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Se connecter</button>
                </div>
            </form>

            <div class="text-center powered">
                Powered by <a href="https://youne.studio" target="_blank">Youne Studio</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
