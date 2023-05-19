<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/read.php'); ?>

<?php
$id = $_POST['modifyIdUser'];
$arrayUser = getByIdUser($id);
?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_header.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_aside.php') ?>
<main>
    <section>
        <h2>Modifier un utilisateur</h2>
        <form class="flex flex-col" action="/webfiles/scripts/admin/update.php" method="POST">
            <input type="hidden" name="updateUserId" value="<?= $arrayUser['id'] ?>">
            <label for="userName">Pseudonyme</label>
            <input type="text" name="updateUserName" id="userName" value="<?= $arrayUser['username'] ?>">
            <label for="userEmail">Email</label>
            <input type="date" name="updateUserEmail" id="userEmail" value="<?= $arrayUser['email'] ?>">
            <label for="userLastName">Nom de famille</label>
            <input type="date" name="updateUserLastName" id="userLastName" value="<?= $arrayUser['lastName'] ?>">
            <label for="userFirstName">Prénom</label>
            <input type="date" name="updateUserFirstName" id="userFirstName" value="<?= $arrayUser['firstName'] ?>">
                <option value="" selected disabled>
                <?php 
                // On stocke les informations de l'utilisateur dont l'id a été recupéré précédemment
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
            <button type="submit" name="updateUser">Modifier</button>
        </form>
    </section>
</main>