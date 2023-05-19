<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_header.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/read.php') ?>
<?php
    $countries = getAll('country');
?>
<main class="flex flex-col country">
    <h1>Les pays</h1>
    <div class="flex">
        <?php
        foreach ($countries as $country) : ?>
        <section class="card">
            <h2><?= $country['name'] ?></h2>
            <img src="<?= $country['img'] ?>" alt="Image de <?= $country['name'] ?>">
            <h2>Liste des ligues</h2>
            <table>
                <thead>
                    <tr>
                        <th>nom</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?php
                                $league = getByIdLeague($country['league_id']);
                                echo $league['name'];
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
        <?php endforeach; ?>
    </div>
    
</main>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_footer.php') ?>