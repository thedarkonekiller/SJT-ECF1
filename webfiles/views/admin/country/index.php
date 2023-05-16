<<<<<<< HEAD

=======
>>>>>>> e913c390848a3b132d51b7fb838744b89397a80f
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
<<<<<<< HEAD
            var_dump($name);
            deleteCountry($name);
            header('Location: /webfiles/views/admin/country');
        }
        elseif($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['updateIdCountry']){
            $id = $_POST['updateIdCountry'];
            var_dump($name);
            updateCountry($name);
            header('Location: /webfiles/views/admin/country');
        }
?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/create.php'); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/read.php'); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/delete.php'); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['addCountryName']) {
    $name = $_POST['addCountryName'];
    createCountry($name);
    header('Location: /webfiles/views/admin/country');
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['deleteIdCountry']) {
    $id = $_POST['deleteIdCountry'];
    deleteCountry($id);
    header('Location: /webfiles/views/admin/country');
}

=======
            deleteCountry($id);
            header('Location: /webfiles/views/admin/country');
        }
>>>>>>> e913c390848a3b132d51b7fb838744b89397a80f
?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_header.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_aside.php') ?>
<main>
    <section>
        <h2>Ajouter un pays</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <label for="countryName">Nom</label>
            <input type="text" name="addCountryName" id="countryName">
            <button type="submit" name="addCountry">Ajouter</button>
        </form>
<<<<<<< HEAD
    </section> 
    <section>
    <h2>Modifier un pays</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <label for="ref">Nom du pays</label>
            <input type="text" name="updateCountryName" id="countryName">
            <button type="submit" name="updateCountry">Modifier</button>
        </form>
    </section>
<<<<<<< HEAD
=======
        <section class="admArray">
            <h2>Liste des pays</h2>
            <table class="flex flex-col">
                <thead>
=======
    </section>
>>>>>>> 9a1a6472dac75200557695a8493eb26cd219ab8d
    <section class="admArray">
        <h2>Liste des pays</h2>
        <table class="flex flex-col">
            <thead>
                <tr class="flex">
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $results = getAll('country');
                foreach ($results as $result) { ?>
>>>>>>> e913c390848a3b132d51b7fb838744b89397a80f
                    <tr class="flex">
                     <td><?= $result['name']; ?></td>
                        <td class="flex">
                            <form action="/webfiles/views/admin/country/modify.php" method="POST">
                                <input type="hidden" name="modifyIdCountry" value="<?php echo $result["id"]; ?>">
                                <button type="submit" name="modifyCountry"><i class="fa-solid fa-pen-to-square"></i></button>
                            </form>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                <input type="hidden" name="deleteIdCountry" value="<?php echo $result["id"]; ?>">
                                <button type="submit" name="deleteCountry"><i class="fa-solid fa-trash-can-arrow-up"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php 
                ?>
            </tbody>
        </table>
    </section>
</main>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_footer.php') ?>