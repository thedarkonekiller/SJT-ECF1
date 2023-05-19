<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_header.php') ?>
<?php 
    // Si on arrive à se connecter en tant qu'administrateur
    if ($_SESSION && $_SESSION['user']['role'] === "[ROLE_ADMIN]") {
require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/read.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_aside.php') ?>
<main>
    <section class="add">
        <h2>Ajouter un utilisateur</h2>
        <form action="/webfiles/scripts/admin/create.php" method="POST" class="flex flex-col">
            <label for="userName">Pseudo</label>
            <input type="text" name="addUserName" id="userName">
            <label for="userEmail">Email</label>
            <input type="email" name="addEmail" id="userEmail">
            <label for="userPassword">Mot de passe</label>
            <input type="password" name="addPassword" id="userPassword">
            <label for="userFirstName">Prénom</label>
            <input type="text" name="addFirstName" id="userFirstName">
            <label for="userLastName">Nom de famille</label>
            <input type="text" name="addLastName" id="userLastName">
            <button type="submit" name="addUserBo">Ajouter</button>
        </form>
    </section>
    <section class="admArray">
        <h2>Liste des utilisateurs</h2>
        <table>
            <thead>
                <tr>
                    <th>Pseudo</th>
                    <th>Email</th>
                    <th>Prénom</th>
                    <th>Nom de famille</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $results = getAll('user');
                foreach ($results as $result) { ?>
                    <tr>
                        <td><?= $result['username']; ?></td>
                        <td><?= $result['email']; ?></td>
                        <td><?= $result['firstName']; ?></td>
                        <td><?= $result['lastName']; ?></td>
                        <td><?= $result['role']; ?></td>
                        <td class="flex">
                            <form action="/webfiles/views/admin/user/modify.php" method="POST">
                                <input type="hidden" name="modifyIdUser" value="<?php echo $result["id"]; ?>">
                                <button class="faw" type="submit" name="modifyUser"><i class="fa-solid fa-pen-to-square"></i></button>
                            </form>
                            <form action="/webfiles/scripts/admin/delete.php" method="POST">
                                <input type="hidden" name="deleteIdUser" value="<?php echo $result["id"]; ?>">
                                <button class="faw" type="submit" name="deleteUser"><i class="fa-solid fa-trash-can-arrow-up"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </section>
</main>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_footer.php');

} 
// Si on arrive pas à se connecter en tant qu'administrateur
else { ?>
    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_admin_header.php') ?>
    <p class="danger">Vous n'avez pas accès à cette page</p>
    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_admin_footer.php') ?>
<?php }
?>