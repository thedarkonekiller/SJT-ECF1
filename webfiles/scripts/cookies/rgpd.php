<?php
// Création du cookies rgpd qui expire au bout de 6 mois
setcookie("rgpd", "accepted", time() + 600000, '/');
// Redirection vers la page source
if(isset($_SERVER['HTTP_REFERER'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
} else {
    // Redirection vers une page par défaut si la page source n'est pas disponible
    header('Location: /index.php');
    exit;
}
?>