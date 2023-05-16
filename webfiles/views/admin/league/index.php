<?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/create.php'); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/read.php'); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/delete.php'); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/update.php'); ?>
<?php
        if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['addLeagueName']){
            $name = $_POST['addLeagueName'];
            createLeague($name);
            header('Location: /webfiles/views/admin/league');
        }
        elseif($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['deleteIdLeague']){
            $id = $_POST['deleteIdLeague'];
            deleteLeague($id);
            header('Location: /webfiles/views/admin/league');
        }
?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_header.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_aside.php') ?>
<main>
    <section class="add">
        <h2>Ajouter une ligue</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="flex flex-col">
            <label for="leagueName">Nom</label>
            <input type="text" name="addLeagueName" id="leagueName">
            <button type="submit" name="addLeague">Ajouter</button>
        </form>
    </section>
    <section class="admArray">
        <h2>Liste des ligues</h2>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $results = getAll('league');
                foreach ($results as $result) { ?>
                    <tr>
                        <td><?= $result['name']; ?></td>
                        <td class="flex">
                            <form action="/webfiles/views/admin/league/modify.php" method="POST">
                                <input type="hidden" name="modifyIdLeague" value="<?php echo $result["id"]; ?>">
                                <button class="faw" type="submit" name="modifyLeague"><i class="fa-solid fa-pen-to-square"></i></button>
                            </form>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                <input type="hidden" name="deleteIdLeague" value="<?php echo $result["id"]; ?>">
                                <button class="faw" type="submit" name="deleteLeague"><i class="fa-solid fa-trash-can-arrow-up"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </section>
</main>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_footer.php') ?>