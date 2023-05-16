<?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/read.php'); ?>

<?php
$id = $_POST['modifyIdClub'];
$arrayClub = getByIdClub($id);
?>

<section>
    <h2>Modifier un club</h2>
    <form action="/webfiles/scripts/admin/update.php" method="POST">
        <label for="clubName">Nom</label>
        <input type="text" name="updateNameClub" id="clubName" value="<?= $arrayClub['name'] ?>">
        <button type="submit" name="updateClub">Modifier</button>
    </form>
</section>