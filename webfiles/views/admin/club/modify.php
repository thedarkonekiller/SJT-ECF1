<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_header.php') ?>
<?php 
    // Si on arrive à se connecter en tant qu'administrateur
    if ($_SESSION && $_SESSION['user']['role'] === "[ROLE_ADMIN]") {
require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/read.php'); ?>

<?php
$id = $_POST['modifyIdClub'];
$arrayClub = getByIdClub($id);
var_dump($arrayClub['league_id']);
?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_aside.php') ?>
<main>
    <section>
        <h2>Modifier un club</h2>
        <form class="flex flex-col" action="/webfiles/scripts/admin/update.php" method="POST">
            <input type="hidden" name="updateClubId" value="<?= $arrayClub['id'] ?>">
            <label for="clubName">Nom</label>
            <input type="text" name="updateClubName" id="clubName" value="<?= $arrayClub['name'] ?>">
            <label for="clubCreatedDate">Date de création</label>
            <input type="date" name="updateClubCreatedDate" id="clubCreatedDate" value="<?= $arrayClub['createDate'] ?>">
            <label for="clubDesc">Description</label>
            <textarea name="updateClubDescription" id="clubDesc" cols="10"><?= $arrayClub['descrip'] ?></textarea>
            <label for="clubImg">Logo</label>
            <input type="url" name="updateClubImage" id="clubImg" value="<?= $arrayClub['logo'] ?>">
            <label for="clubStadium">Stade</label>
            <input type="text" name="updateClubStadium" id="clubStadium" value="<?= $arrayClub['stadiumName'] ?>">
            <label for="clubLeague">Ligue</label>
            <select name="updateClubLeague" id="clubLeague">
                <option value="<?= $arrayClub['league_id'] ?>" selected>
                <?php 
                // On stocke les informations du club dont l'id a été recupéré précédemment
                $league = getByIdLeague($arrayClub['league_id']);
                echo $league['name'];
                ?></option>
                <?php 
                // On récupére les données de la table club qui vont etre stockés dans la variable $leagues
                $leagues = getAll('league');
                foreach ($leagues as $league): ?>
                    <option value="<?= $league['id'] ?>"><?= $league['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" name="updateClub">Modifier</button>
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