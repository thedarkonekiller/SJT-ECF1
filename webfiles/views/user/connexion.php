<?php
require_once('/webfiles/scripts/user/connexion.php');
?>

<form action="home.php" method="POST">
 
    <div class="mailForm">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="passForm">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="sendForm">Envoyer</button>
</form>


