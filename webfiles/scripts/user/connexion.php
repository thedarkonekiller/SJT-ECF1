<?php session_start(); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/functions.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/dbconnect.php');
if ($conn) {
    Validator($_POST);
    // Vérification si le paramètre 'login' est défini dans la requête POST
    if (isset($_POST['login'])) {
        $email = $_POST['mail'];
        $passwd = $_POST['pswrd'];
        $requser = "SELECT * FROM user WHERE email = :email";
        try {
            // Préparation de la requête avec un paramètre lié
            $stmt = $conn->prepare($requser);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            // Récupération du résultat de la requête
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                if (password_verify($passwd, $user['passwd'])) {
                    // Stockage des informations de l'utilisateur dans la session
                    $_SESSION["user"] = [
                        "id" => $user["id"],
                        "pseudo" => $user["username"],
                        "fname" => $user["firstName"],
                        "lname" => $user["lastName"],
                        "email" => $user["email"],
                        "role" => $user["role"]
                    ];
                    ?>
                    <!-- On affiche un message de succès -->
                    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_header.php'); ?>
                    <p class="success">Vous êtes connecté, vous allez être redirigé vers votre page de profil dans 5s</p>
                    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_footer.php'); ?>
                    <?php
                    // Redirection vers la page du profil utilisateur
                    RedirectToURL("/webfiles/views/user/profil.php", 5);
                    exit;
                } else {
                    ?>
                    <!-- On affiche un message d'erreur -->
                    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_header.php'); ?>
                    <p class="danger">Les informations envoyées ne permettent pas de vous identifier, vous allez être redirigé vers la page de connexion dans 5s</p>
                    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_footer.php'); ?>
                    <?php
                    RedirectToURL("/webfiles/views/user/connexion.php", 5);
                    exit;
                }
            } else {
                ?>
                <!-- On affiche un message d'erreur -->
                <?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_header.php'); ?>
                <p class="danger">L'utilisateur n'existe pas, vous allez être redirigé vers la page de connexion dans 5s</p>
                <?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_footer.php'); ?>
                <?php
                RedirectToURL("/webfiles/views/user/connexion.php", 5);
                exit;
            }
        } catch (PDOException $e) {
            // Capture et gestion des exceptions liées à la base de données
            ?>
            <!-- On affiche un message d'erreur -->
            <?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_header.php'); ?>
            <p class="danger">Une erreur s'est produite lors de l'exécution de la requête : <?= $e->getMessage(); ?>, vous allez être redirigé vers la page d'accueil dans 5s</p>
            <?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_footer.php'); ?>
            <?php
            RedirectToURL("/index.php", 5);
            
        }
    }
}


?>