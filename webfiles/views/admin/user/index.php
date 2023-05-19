<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/read.php'); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_header.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_aside.php') ?>
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
            <label for="userLastName">Nom de famille</label>
            <input type="text" name="addLastName" id="userLastName">
            <label for="userFirstName">Prénom</label>
            <input type="text" name="addFirstName" id="userFirstName">
            <button type="submit" name="addUserBO">Ajouter</button>
        </form>
    </section>
    <section class="admArray">
        <h2>Liste des utilisateurs</h2>
        <table>
            <thead>
                <tr>
                    <th>Pseudo</th>
                    <th>Email</th>
                    <th>Nom de famille</th>
                    <th>Prénom</th>
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
                        <td><?= $result['lastName']; ?></td>
                        <td><?= $result['firstName']; ?></td>
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
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_footer.php') ?>