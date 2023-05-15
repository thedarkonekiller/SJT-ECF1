<?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/functions.php'); ?>

<main>
    <section>
        <h2>Ajouter un pays</h2>
        <form action="/webfiles/scripts/products/addproduct.php" method="POST" enctype="multipart/form-data">
            <label for="ref">Nom du pays</label>
            <input type="text" name="addCountryName" id="countryName">
        </form>
    </section>
        <section class="admArray">
            <h2>Liste des produits</h2>
            <table class="flex flex-col">
                <thead>
                    <tr class="flex">
                        <th>Nom du Pays</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    var_dump(getAll('country'));
                    foreach ($results as $result) { ?>
                        <tr class="flex">
                            <td><?= $result['nameCountry']; ?></td>
                            <td class="flex">
                                <form action="./dashboard.php?page=adm_products" method="POST">
                                    <input type="hidden" name="idproduct" value="<?php echo $result["id"]; ?>">
                                    <button type="submit" name="modifyProductIcon"><i class="fa-solid fa-pen-to-square"></i></button>
                                </form>
                                <form action="/webfiles/scripts/products/supprproduct.php" method="POST">
                                <input type="hidden" name="idproduct" value="<?php echo $result["id"]; ?>">    
                                <button type="submit" name="suppressProductIcon"><i class="fa-solid fa-trash-can-arrow-up"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </section>
</main>