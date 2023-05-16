<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/read.php'); ?>

<?php
$id = $_POST['modifyIdClub'];
$arrayClub = getByIdClub($id);
?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_header.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_aside.php') ?>
<main>
    <section>
        <h2>Modifier un club</h2>
        <form class="flex flex-col" action="/webfiles/scripts/admin/update.php" method="POST">
            <input type="hidden" name="updateClubId" value="<?= $arrayClub['id'] ?>">
            <label for="clubName">Nom</label>
            <input type="text" name="updateNameClub" id="clubName" value="<?= $arrayClub['name'] ?>">
            <label for="clubCreatedDate">Date de création</label>
            <input type="date" name="updateClubCreatedDate" id="clubCreatedDate" value="<?= $arrayClub['createDate'] ?>">
            <label for="clubDesc">Description</label>
            <textarea name="updateClubDescription" id="clubDesc" cols="10"><?= $arrayClub['descrip'] ?></textarea>
            <label for="clubImg">Logo</label>
            <input type="url" name="updateClubImage" id="clubImg" value="<?= $arrayClub['logo'] ?>">
            <label for="clubStadium">Stade</label>
            <input type="text" name="updateClubStadium" id="clubStadium" value="<?= $arrayClub['stadiumName'] ?>">
            <button type="submit" name="updateClub">Modifier</button>
        </form>
    </section>
</main>