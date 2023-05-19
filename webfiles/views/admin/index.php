<?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_admin_header.php') ?>
<?php 
    // Si on arrive à se connecter en tant qu'administrateur
    if ($_SESSION && $_SESSION['user']['role'] === "[ROLE_ADMIN]") {
        require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_admin_aside.php');
    } 
    // Si on arrive pas à se connecter en tant qu'administrateur
    else { ?>
        <?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_admin_header.php') ?>
        <p class="danger">Vous n'avez pas accès à cette page</p>
        <?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_admin_footer.php') ?>
    <?php }
?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_admin_footer.php') ?>