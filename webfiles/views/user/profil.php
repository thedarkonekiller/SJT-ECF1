<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_header.php') ?>
<main class="flex flex-col profil">
    <h1>page de profil de <?= $_SESSION['user']['pseudo'] ?></h1>
    <form class="flex flex-col" action="/webfiles/scripts/admin/update.php" method="post">
        <input type="text" name="userName" value="<?= $_SESSION['user']['pseudo'] ?>" disabled>
        <input type="email" name="email" value="<?= $_SESSION['user']['email'] ?>" disabled>
        <input type="text" name="fisrtName" value="<?= $_SESSION['user']['fname'] ?>" disabled>
        <input type="text" name="lastName" value="<?= $_SESSION['user']['lname'] ?>" disabled>
    </form>
</main>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/views/_included/_footer.php') ?>