<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_header.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/read.php') ?>
<?php
    $clubs = getAll('club');
    
?>
<main class="flex flex-col club">
    <h1>Les Clubs</h1>
    <div class="flex">
        <?php
        foreach ($clubs as $club) : ?>
        <section class="card">
            <h2><?= $club['name'] ?></h2>
            <p><?= $club['createDate'] ?></p>
            <p><?= $club['stadiumName'] ?></p>
            <img src="<?= $club['logo'] ?>" alt="Image de <?= $club['name'] ?>">
            <p><?= $club['descrip'] ?></p>
        </section>
        <?php endforeach; ?>
    </div>
    
</main>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_footer.php') ?>