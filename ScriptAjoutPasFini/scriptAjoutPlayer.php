<?php 
    
    require_once('../dbconnect.php');
    
    if(!empty($conn)){

        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $nationalite = $_POST["nationalite"];
        $poste = $_POST["poste"];
        $birthday = $_POST["birthday"];
        $playerPic = $_POST["playerPic"];

        $req = "INSERT INTO user () VALUES ('$firstName','$lastName', '$nationalite', '$poste' '$birthday')";

        $exec = $conn->query($req);
    }
    else{
        // Connexion à la BDD n'a pas fonctionnée
    }
?>