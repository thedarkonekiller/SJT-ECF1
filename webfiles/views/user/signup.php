<?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_header.php'); ?>
<main class="flex flex-col">
    <form class="flex flex-col signup" action="/webfiles/scripts/admin/create.php" method="POST">
        <h2 class="flex">S'inscrire</h2>
        <input type="text" name="addUserName" placeholder="Nom d'utilisateur" required />
        <input type="text" name="addFirstName" placeholder="Prénom" required />
        <input type="text" name="addLastName" placeholder="Nom de famille" required />
        <input type="text" name="addEmail" placeholder="Email" required />
        <input type="password" name="addPassword" placeholder="Mot de passe" required />
        <button type="submit" name="addUser">S'inscrire</button>
        <p>Déjà inscrit?<a href="/webfiles/views/user/connexion.php"> Connectez-vous ici</a></p>
    </form>
</main>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_footer.php'); ?>