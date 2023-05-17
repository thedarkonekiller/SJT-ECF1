<?php 
require_once('/webfiles/views/user/connexion.php');
$value = 'accepted';
setcookie("CookieCon", "$value", time()+60, '/');
header('Location:');

// Validation du formulaire
if (isset($_POST['email']) &&  isset($_POST['password'])) {
    foreach ($users as $user) {
        if (
            $user['email'] === $_POST['email'] &&  $user['password'] === $_POST['password']
        ) {
            $loggedUser = [
                'email' => $user['email'],
            ];
        } else {
           echo "Echec de la connexion";
                $_POST['email'];
                $_POST['password'];
        }
    }
} ?>
<!--
   Si utilisateur/trice est non identifié(e), on affiche le formulaire
-->
<?php if(!isset($loggedUser)): ?>

    <!-- si message d'erreur on l'affiche -->
    <?php if(isset($errorMessage)) : ?>
        <div class="danger">
            <?php echo $errorMessage; ?>
        </div>
    <?php endif; ?>

<!-- 
    Si utilisateur/trice bien connectée on affiche un message de succès
-->
<?php else: ?>
    <div class="success">
        Bonjour <?php echo $loggedUser['email']; ?> et bienvenue sur le site !
    </div>
    <?php
    $value = 'accepted';
setcookie("CookieCon", "$value", time()+60, '/');
header('Location: ../../index.php');
?>
<?php endif; ?>

