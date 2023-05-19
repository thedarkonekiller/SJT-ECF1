<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/read.php'); ?>

<?php
// Récupération de l'id du pays à modifier et on le stocke dans $id
$id = $_POST['modifyIdCountry'];
// On stocke les informations du pays dont l'id a été recupéré précédemment
$arrayCountry = getByIdCountry($id);
?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_header.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_aside.php') ?>
<main>
    <section>
        <h2>Modifier un pays</h2>
        <form action="/webfiles/scripts/admin/update.php" method="POST">
            <label for="countryName">Nom</label>
            <input type="text" name="updateNameCountry" id="countryName" value="<?= $arrayCountry['name'] ?>">
            <button type="submit" name="updateCountry">Modifier</button>
        </form>
    </section>
</main>