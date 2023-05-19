<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_header.php') ?>
<?php 
    // Si on arrive à se connecter en tant qu'administrateur
    if ($_SESSION && $_SESSION['user']['role'] === "[ROLE_ADMIN]") {
require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/read.php'); ?>

<?php
// Récupération de l'id de l'utilisateur à modifier et on le stocke dans $id
$id = $_POST['modifyIdUser'];
// On stocke les informations de l'utilisateur dont l'id a été recupéré précédemment
$arrayUser = getByIdUser($id);
?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_aside.php') ?>
<main>
    <section>
        <h2>Modifier un utilisateur</h2>
        <form class="flex flex-col" action="/webfiles/scripts/admin/update.php" method="POST">
            <input type="hidden" name="updateUserId" value="<?= $arrayUser['id'] ?>">
            <label for="userName">Pseudo</label>
            <input type="text" name="updateUserName" id="userName" value="<?= $arrayUser['username'] ?>">
            <label for="userEmail">Email</label>
            <input type="email" name="updateUserEmail" id="userEmail" value="<?= $arrayUser['email'] ?>">
            <label for="userLastName">Nom de famille</label>
            <input type="text" name="updateUserLastName" id="userLastName" value="<?= $arrayUser['lastName'] ?>">
            <label for="userFirstName">Prénom</label>
            <input type="text" name="updateUserFirstName" id="userFirstName" value="<?= $arrayUser['firstName'] ?>">
            <button type="submit" name="updateUser">Modifier</button>
        </form>
    </section>
</main>

<?php } 
    // Si on arrive pas à se connecter en tant qu'administrateur
    else { ?>
        <?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_admin_header.php') ?>
        <p class="danger">Vous n'avez pas accès à cette page</p>
        <?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_admin_footer.php') ?>
    <?php }
?>