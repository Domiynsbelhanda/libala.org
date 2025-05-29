<!DOCTYPE html>
<html>
<head>
    <title>Connexion Gestionnaire</title>
</head>
<body>
<h2>Connexion au mariage</h2>
<form method="POST" action="{{ route('event.login') }}">
    @csrf
    <input type="text" name="reference" placeholder="ID de l'événement">
    <input type="password" name="password" placeholder="Mot de passe">
    <button type="submit">Se connecter</button>
</form>
</body>
</html>
