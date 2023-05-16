<?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/read.php'); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_header.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_admin_aside.php') ?>
<main>
    <section>
        <h2>Ajouter un club</h2>
        <form class="flex flex-col" action="/webfiles/scripts/admin/create.php" method="POST">
            <label for="clubName">Nom</label>
            <input type="text" name="addClubName" id="clubName">
            <label for="clubCreatedDate">Date de création</label>
            <input type="date" name="addCludCreatedDate" id="clubCreatedDate">
            <label for="clubDesc">Description</label>
            <textarea name="addClubDescription" id="clubDesc" cols="10"></textarea>
            <label for="clubImg">Logo</label>
            <input type="url" name="addClubImage" id="clubImg">
            <label for="clubStadium">Stade</label>
            <input type="text" name="addClubStadium" id="clubStadium">
            <button type="submit" name="addClub">Ajouter</button>
        </form>
    </section>
    <section class="admArray">
        <h2>Liste des clubs</h2>
        <table class="flex flex-col">
            <thead>
                <tr class="flex">
                    <th>Nom</th>
                    <th>Date Création</th>
                    <th>Logo</th>
                    <th>Stade</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $results = getAll('club');
                foreach ($results as $result) { ?>
                    <tr class="flex">
                        <td><?= $result['name']; ?></td>
                        <td><?= $result['createDate']; ?></td>
                        <td><?= $result['descrip']; ?></td>
                        <td><?= $result['stadiumName']; ?></td>
                        <td class="flex">
                            <form action="/webfiles/views/admin/club/modify.php" method="POST">
                                <input type="hidden" name="modifyIdClub" value="<?php echo $result["id"]; ?>">
                                <button type="submit" name="modifyClub"><i class="fa-solid fa-pen-to-square"></i></button>
                            </form>
                            <form action="/webfiles/scripts/admin/delete.php" method="POST">
                                <input type="hidden" name="deleteIdClub" value="<?php echo $result["id"]; ?>">
                                <button type="submit" name="deleteClub"><i class="fa-solid fa-trash-can-arrow-up"></i></button>
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