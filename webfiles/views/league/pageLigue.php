<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_header.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/read.php') ?>
<?php
$leagues = getAll('league');
?>
<main class="flex flex-col league">
    <h1>Les Ligues</h1>
    <div class="flex">
        <?php
        foreach ($leagues as $league) : ?>
            <section class="card">
                <h2><?= $league['name']; ?></h2>
                <?php 
                    $countriesImg = getCountryImageByleague($league['country_id']);
                    foreach ($countriesImg as $img): ?>
                        <img src="<?= $img ?>" alt="Image de">
                    <?php endforeach; ?>
                <h2>Liste des clubs</h2>
                <table>
                    <thead>
                        <tr>
                            <th>nom</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $clubs = getClubNameByLeague($league['id']);
                        foreach ($clubs as $value) { ?>
                            <tr>
                                <td><?= $value['name']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </section>
        <?php endforeach; ?>
    </div>

</main>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_footer.php') ?>