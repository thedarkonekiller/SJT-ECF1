<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_header.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/user/signupuser.php');
?>
<form class="flex flexColumn" action="" method="POST">
    <h2 class="flex carbon-text">S'inscrire</h2>
    <input type="text" name="userName" placeholder="Nom d'utilisateur" required />
    <input type="text" name="firstName" placeholder="Prénom" required />
    <input type="text" name="lastName" placeholder="Nom de famille" required />
    <input type="text" name="email" placeholder="Email" required />
    <input type="password" name="password" placeholder="Mot de passe" required />
    <input type="submit" name="submit" value="S'inscrire" />
    <p>Déjà inscrit?<a href="./login.php"> Connectez-vous ici</a></p>
</form>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_footer.php'); ?>