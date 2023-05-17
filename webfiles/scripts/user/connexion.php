<?php 


if(!empty($conn)){

        
    $email = $_POST["mail"];
    $password = $_POST["pswrd"];

    $req = "SELECT * FROM users WHERE email='$email' AND passwd='$password'";

    $exec = $conn->query($req);

    if($exec != false){
        $result = $exec->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($result)){
                session_start();
                $_SESSION["connected"] = TRUE;
                header('Location: /index.php');
                
            }else{
                echo "Vous avez réussi à vous connecter";?>
            <?php }
    
    }else{
        echo "Echec de la connexion, vérifier votre adresse mail ou le mot de passe";?>
    <?php }

}
else{
    echo "La BDD n'est pas connecté";
}
