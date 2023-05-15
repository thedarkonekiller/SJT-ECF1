<?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbConnect.php'); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/functions.php'); ?>
<?php
if ($conn): ?>
<main>
    <section>
        <h2>Ajouter un pays</h2>
        <form action="/webfiles/scripts/products/addproduct.php" method="POST" enctype="multipart/form-data">
            <label for="typeprdct">Type</label>
            <select name="addProductType" id="typeprdct">
                <?php foreach ($resultrmt as $name) { ?>
                    <option value="<?= $name['namematerialtypes'] ?>"><?= $name['namematerialtypes'] ?></option>
               <?php } ?>
            </select>
            <label for="ref">Référence</label>
            <input type="text" name="addProductReference" id="ref">
            <label for="prodname">Nom Produit</label>
            <input type="text" name="addProductName" id="prodname">
            <label for="prodpic">Image</label>
            <input type="file" name="addProductPicture" id="prodpic">
            <label for="proddesccourte">Description courte</label>
            <textarea name="addProductShortDesc" id="proddesccourte" rows="7" maxlength="255"></textarea>
            <label for="proddesc">Description</label>
            <textarea name="addProductLongDesc" id="proddesc" rows="20"></textarea>
            <label for="prodprice">Prix de revente</label>
            <input type="number" step="0.01" name="addProductPrice" id="prodprice">
            <input type="submit" name="addProductButton" value="Enregister">
        </form>
    </section>
        <section class="admArray">
            <h2>Liste des produits</h2>
            <table class="flex flexColumn">
                <thead>
                    <tr class="flex">
                        <th>Nom du Pays</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    getAll('country');
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
<?php endif ?>