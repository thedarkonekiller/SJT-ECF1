<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_header.php') ?>
<?php 
    // Si on arrive à se connecter en tant qu'administrateur
    if ($_SESSION && $_SESSION['user']['role'] === "[ROLE_ADMIN]") {
        require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_admin_aside.php');
   
require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/read.php'); ?>

<?php
// Récupération de l'id du pays à modifier et on le stocke dans $id
$id = $_POST['modifyIdCountry'];
// On stocke les informations du pays dont l'id a été recupéré précédemment
$arrayCountry = getByIdCountry($id);
?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_aside.php') ?>
<main>
    <section>
        <h2>Modifier un pays</h2>
        <form action="/webfiles/scripts/admin/update.php" method="POST">
            <input type="hidden" name="updateCountryId" value="<?= $arrayCountry['id'] ?>">
            <label for="countryName">Nom</label>
            <input type="text" name="updateCountryName" id="countryName" value="<?= $arrayCountry['name'] ?>">
            <label for="contryImage">Image</label>
            <input type="url" name="updateCountryImage" id="countryImage" value="<?= $arrayCountry['img'] ?>">
            <button type="submit" name="updateCountry">Modifier</button>
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