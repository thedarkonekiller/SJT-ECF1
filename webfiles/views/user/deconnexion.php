<?php
session_start();
unset($_SESSION["user"]);
require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/functions.php');
?>
<p class="success">Vous avez été déconnecté avec succès.</p>
<?php RedirectToURL('/index.php'); ?>