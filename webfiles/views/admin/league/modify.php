<?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/read.php'); ?>

<?php
$id = $_POST['modifyIdLeague'];
$arrayLeague = getByIdLeague($id);
?>

<section>
    <h2>Modifier une ligue</h2>
    <form action="/webfiles/scripts/admin/update.php" method="POST">
        <label for="leagueName">Nom</label>
        <input type="text" name="updateNameLeague" id="leagueName" value="<?= $arrayLeague['name'] ?>">
        <button type="submit" name="updateLeague">Modifier</button>
    </form>
</section>