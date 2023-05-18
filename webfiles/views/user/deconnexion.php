<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/functions.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_header.php');
unset($_SESSION["user"]);
?>
<p class="success">Vous avez été déconnecté avec succès.</p>
<?php RedirectToURL('/index.php', 3);
require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_footer.php');