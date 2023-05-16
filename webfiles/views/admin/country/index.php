<?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/create.php'); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/read.php'); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/delete.php'); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/update.php'); ?>
<?php
        if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['addCountryName']){
            $name = $_POST['addCountryName'];
            createCountry($name);
            header('Location: /webfiles/views/admin/country');
        }
        elseif($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['deleteIdCountry']){
            $id = $_POST['deleteIdCountry'];
            var_dump($id);
            deleteCountry($id);
            header('Location: /webfiles/views/admin/country');
        }
        elseif($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['updateIdCountry']){
            $id = $_POST['updateIdCountry'];
            var_dump($id);
            updateCountry($id);
            header('Location: /webfiles/views/admin/country');
        }
?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_header.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_aside.php') ?>
<main>
    <section>
        <h2>Ajouter un pays</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <label for="countryName">Nom du pays</label>
            <input type="text" name="addCountryName" id="countryName">
            <button type="submit" name="addCountry">Ajouter</button>
        </form>
    </section>
    <section>
    <h2>Modifier un pays</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <label for="ref">Nom du pays</label>
            <input type="text" name="updateCountryName" id="countryName">
            <button type="submit" name="updateCountry">Modifier</button>
        </form>
    </section>
        <section class="admArray">
            <h2>Liste des pays</h2>
            <table class="flex flex-col">
                <thead>
    <section class="admArray">
        <h2>Liste des pays</h2>
        <table class="flex flex-col">
            <thead>
                <tr class="flex">
                    <th>Nom du Pays</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $results = getAll('country');
                foreach ($results as $result) { ?>
                    <tr class="flex">
                        <td><?= $result['name']; ?></td>
                        <td class="flex">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                <input type="hidden" name="modifyIdCountry" value="<?php echo $result["id"]; ?>">
                                <button type="submit" name="modifyCountry"><i class="fa-solid fa-pen-to-square"></i></button>
                            </form>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                <input type="hidden" name="deleteIdCountry" value="<?php echo $result["id"]; ?>">
                                <button type="submit" name="deleteCountry"><i class="fa-solid fa-trash-can-arrow-up"></i></button>
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