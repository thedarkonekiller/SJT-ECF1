<?php session_start(); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/functions.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/dbConnect.php');
if ($conn) {
    Validator($_POST);
    // Vérification si le paramètre 'login' est défini dans la requête POST
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $passwd = $_POST['password'];
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
                        "email" => $user["email"],
                        "role" => $user["role"]
                    ];
                    // Redirection vers la page du profil utilisateur
                    RedirectToURL("/webfiles/views/user/profil.php", 0.1);
                    exit;
                } else {
                    echo "Les informations envoyées ne permettent pas de vous identifier";
                    RedirectToURL("/webfiles/views/user/connexion.php", 3);
                    exit;
                }
            } else {
                echo "L'utilisateur n'existe pas";
                RedirectToURL("/webfiles/views/user/connexion.php", 3);
                exit;
            }
        } catch (PDOException $e) {
            // Capture et gestion des exceptions liées à la base de données
            echo "Une erreur s'est produite lors de l'exécution de la requête : " . $e->getMessage();
        }
    }
}


?>