<?php
    function updateCountry(string $name){
        // On importe le fichier de connexion à la base de donnée
        require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');
    
        // On prépare la requête et la variable name
        $sql = "UPDATE country SET name = :name";
    
        // On execute la requête
        try {
            $req = $conn->prepare($sql);
            $req->bindParam(':name', $name, PDO::PARAM_STR);
            $req->execute();
            
        } catch (Exception $e) {
            //On affiche un message en cas d'erreur
            echo 'Erreur: ' . $e->getMessage();
        }
    }
 
    function updateLeague(string $name){
        // On importe le fichier de connexion à la base de donnée
        require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');
    
        // On prépare la requête et la variable name
        $sql = "UPDATE league SET name = '$name'";
    
        // On execute la requête
        try {
            $req = $conn->prepare($sql);
            $req->bindParam(':name', $name, PDO::PARAM_STR);
            $req->execute();
            
        } catch (Exception $e) {
            //On affiche un message en cas d'erreur
            echo 'Erreur: ' . $e->getMessage();
        }
    }


    function updateClub(string $name){
        // On importe le fichier de connexion à la base de donnée
        require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');
    
        // On prépare la requête et la variable name
        $sql = "UPDATE club SET name = '$name'";
    
        // On execute la requête
        try {
            $req = $conn->prepare($sql);
            $req->bindParam(':name', $name, PDO::PARAM_STR);
            $req->execute();
            
        } catch (Exception $e) {
            //On affiche un message en cas d'erreur
            echo 'Erreur: ' . $e->getMessage();
        }
    }


    function updateUser(string $name){
        // On importe le fichier de connexion à la base de donnée
        require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');
    
        // On prépare la requête et la variable name
        $sql = "UPDATE user SET name = '$name'";
    
        // On execute la requête
        try {
            $req = $conn->prepare($sql);
            $req->bindParam(':name', $name, PDO::PARAM_STR);
            $req->execute();
            
        } catch (Exception $e) {
            //On affiche un message en cas d'erreur
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    
if($_POST && $_POST['updateNameCountry']){
    $name = $_POST['updateNameCountry'];
    updateCountry($name);
    header('Location: /webfiles/views/admin/country');
}
