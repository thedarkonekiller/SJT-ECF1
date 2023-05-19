<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_header.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/read.php') ?>
<?php
    $clubs = getAll('club');
    
?>
<main class="flex flex-col country">
    <h1>Les pays</h1>
    <div class="flex">
        <?php
        foreach ($clubs as $club) : ?>
        <section class="card">
            <h2><?= $club['name'] ?></h2>
            <img src="<?= $club['img'] ?>" alt="Image de <?= $club['name'] ?>">
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
                                $league = getByIdLeague($club['league_id']);
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