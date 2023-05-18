<?php
// Vérifie si une session est déjà active
if (session_status() === PHP_SESSION_NONE) {
    // Aucune session active, démarrer une nouvelle session
    session_start();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Football Club est un site d'informations sur les clubs de foot mondiaux, vous y trouverez l'historique des clubs, leurs effectifs et des renseignements sur les joueurs">
    <link rel="stylesheet" href="/webfiles/styles/css/index.css">
    <title>Football Club</title>
    <script src="https://kit.fontawesome.com/b94fcc4ff9.js" crossorigin="anonymous"></script>
</head>

<body>
    <header class="flex">
        <img src="/assets/img/balloncuir.svg" alt="Image du ballon sur le header">
        <div class="flex flex-col">
            <div class="flex usermenu">
                <?php if ($_SESSION && $_SESSION["user"] == TRUE) : ?>
                    <p>Bonjour <?= $_SESSION['user']['pseudo'] ?></p>
                    <?php if ($_SESSION['user']['role'] === "[ROLE_ADMIN]") : ?>
                        <a href="/webfiles/views/admin/index.php">Administration</a>
                    <?php endif; ?>
                    <a href="/webfiles/views/user/profil.php">Profil</a>
                    <a href="/webfiles/views/user/deconnexion.php">Déconnexion</a>
                <?php else : ?>
                    <div class="flex usermenu">
                        <a href="/webfiles/views/user/connexion.php">Connexion</a>
                        <a href="/webfiles/views/user/signup.php">Inscription</a>
                    </div>
                <?php endif; ?>
            </div>
            <nav class="flex">
                <ul class="flex">
                    <li><a href="/index.php">Accueil</a></li>
                    <li><a href="/webfiles/views/country/pagePays.php">Pays</a></li>
                    <li><a href="/webfiles/views/league/pageLigue.php">Ligues</a></li>
                    <li><a href="/webfiles/views/club/pageClub.php">Clubs</a></li>
                    <li><a href="/webfiles/views/player/pageJoueur.php">Joueurs</a></li>
                </ul>
            </nav>
        </div>
    </header>