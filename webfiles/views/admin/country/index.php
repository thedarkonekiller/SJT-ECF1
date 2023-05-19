<?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/read.php'); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_header.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_aside.php') ?>
<main>
    <section class="add">
        <h2>Ajouter un pays</h2>
        <form action="/webfiles/scripts/admin/create.php" method="POST" class="flex flex-col">
            <label for="countryName">Nom</label>
            <input type="text" name="addCountryName" id="countryName">
            <label for="contryImage">Image</label>
            <input type="url" name="addCountryImage" id="contryImage">
            <button type="submit" name="addCountry">Ajouter</button>
        </form>
    </section>
    <section class="admArray">
        <h2>Liste des pays</h2>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $results = getAll('country');
                foreach ($results as $result) { ?>
                    <tr>
                     <td><?= $result['name']; ?></td>
                        <td class="flex">
                            <form action="/webfiles/views/admin/country/modify.php" method="POST">
                                <input type="hidden" name="modifyIdCountry" value="<?php echo $result["id"]; ?>">
                                <button class="faw" type="submit" name="modifyCountry"><i class="fa-solid fa-pen-to-square"></i></button>
                            </form>
                            <form action="/webfiles/scripts/admin/delete.php" method="POST">
                                <input type="hidden" name="deleteIdCountry" value="<?php echo $result["id"]; ?>">
                                <button class="faw" type="submit" name="deleteCountry"><i class="fa-solid fa-trash-can-arrow-up"></i></button>
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