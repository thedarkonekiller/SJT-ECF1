<?php session_start(); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_admin_header.php') ?>
<?php 
    if ($_SESSION && $_SESSION['role'] === "['ROLE_ADMIN']") {
        require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_admin_aside.php');
    } else { ?>
        <p class="danger">Vous n'avez pas accès à cette page</p>
    <?php }
?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_admin_footer.php') ?>