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
            <h2><?= $league['name'] ?></h2>
            <img src="<?= $league['img'] ?>" alt="Image de <?= $league['name'] ?>">
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
                                $league = getByIdLeague($league['league_id']);
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