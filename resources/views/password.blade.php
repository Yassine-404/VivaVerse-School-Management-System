<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - VivaVerse</title>
</head>
<body>
    <H1>Bienvenue sur VivaVerse,</H1>

    <p>Cher {{ $user->name }},<br> Votre inscription dans notre école pour l'année académique 2023/2024 est effective.<br>Votre matricule est le <b>{{ $etudiants->matriculeE }}</b><br>Vos informations d'inscription sont:</p>

    <ul>
        <li><strong>Nom :</strong> {{ $user->name }}</li>
        <li><strong>Prénom :</strong> {{ $user->first_name }}</li>
        <li><strong>Email :</strong> {{ $user->email }}</li>
        <li><strong>Niveau :</strong> {{ $etudiants->niveau->intitule }}</li>
        <li><strong>Filière :</strong> {{ $etudiants->filliere->intitule }}</li>
        <li><strong>Classe :</strong> {{ $etudiants->salle->intitule }}</li>
        <!-- Ajoutez d'autres informations de l'utilisateur ici -->
    </ul>

    <p>Votre mot de passe est : <strong>{{ $password }}</strong></p>

    <p>Assurez-vous de ne pas le partager avec d'autres personnes.</p>

    <p>Merci de nous rejoindre !</p>
</body>
</html>
