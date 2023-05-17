<?php session_start(); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/read.php'); ?>

<?php
$id = $_POST['modifyIdCountry'];
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