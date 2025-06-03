<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Vérification Invitation</title>
</head>
<body>
<h2>Vérifiez votre invitation</h2>
@if(session('error'))
    <p style="color:red;">{{ session('error') }}</p>
@endif
<form method="POST" action="{{ route('invitation.check.verify') }}">
    @csrf
    <input type="text" name="code" placeholder="Code d'invitation" required>
    <button type="submit">Vérifier</button>
</form>
</body>
</html>
