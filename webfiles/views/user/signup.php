<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_header.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/user/signupuser.php');
?>
<main class="flex flex-col">
    <form class="flex flex-col signup" action="/webfiles/scripts/user/signupuser.php" method="POST">
        <h2 class="flex">S'inscrire</h2>
        <input type="text" name="userName" placeholder="Nom d'utilisateur" required />
        <input type="text" name="firstName" placeholder="Prénom" required />
        <input type="text" name="lastName" placeholder="Nom de famille" required />
        <input type="text" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Mot de passe" required />
        <button type="submit" name="submit">S'inscrire</button>
        <p>Déjà inscrit?<a href="./login.php"> Connectez-vous ici</a></p>
    </form>
</main>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_footer.php'); ?>