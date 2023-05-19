<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/read.php'); ?>

<?php
$id = $_POST['modifyIdLeague'];
$arrayLeague = getByIdLeague($id);
?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_header.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_aside.php') ?>
<?php $countries = getAll('country'); ?>
<main>
    <section>
        <h2>Modifier une ligue</h2>
        <form action="/webfiles/scripts/admin/update.php" method="POST">
            <input type="hidden" name="updateLeagueId" value="<?= $arrayLeague['id'] ?>">
            <label for="leagueName">Nom</label>
            <input type="text" name="updateLeagueName" id="leagueName" value="<?= $arrayLeague['name'] ?>">
            <label for="leagueCountry">Pays</label>
            <select name="addLeagueCountry" id="leagueCountry">
                <option value="<?= $arrayLeague['country_id'] ?>" selected disabled>
                    <?php
                    $countryName = getByIdCountry($arrayLeague['country_id']);
                    echo $countryName['name'];
                    ?>
                </option>
                <?php
                foreach ($countries as $country) : ?>
                    <option value="<?= $country['id'] ?>"><?= $country['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" name="updateLeague">Modifier</button>
        </form>
    </section>
</main>