<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/read.php'); ?>

<?php
$id = $_POST['modifyIdLeague'];
$arrayLeague = getByIdLeague($id);
?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_header.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_aside.php') ?>
<main>
    <section>
        <h2>Modifier une ligue</h2>
        <form action="/webfiles/scripts/admin/update.php" method="POST">
            <input type="hidden" name="updateLeagueId" value="<?= $arrayLeague['id'] ?>">
            <label for="leagueName">Nom</label>
            <input type="text" name="updateLeagueName" id="leagueName" value="<?= $arrayLeague['name'] ?>">
            <button type="submit" name="updateLeague">Modifier</button>
        </form>
    </section>
</main>