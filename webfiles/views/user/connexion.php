<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_header.php') ?>
<main class="flex flex-col">
    <form class="flex flex-col login" action="/webfiles/scripts/user/connexion.php" method="POST">
        <h2 class="flex">Connexion</h2>
        <input type="email" class="form-control" name="mail" placeholder="Votre Email">
        <input type="password" class="form-control" name="pswrd" placeholder="Votre Mot de passe">
        <button type="submit" name="login">Se connecter</button>
    </form>
</main>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_footer.php') ?>