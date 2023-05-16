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
        $sql = "UPDATE league SET name = :name";
    
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
        $sql = "UPDATE club SET name = '$name', createDate = '$updateDate', descrip = '$description', logo = '$logo', stadiumName = '$stadium'";
    
        // On execute la requête
        try {
            $req = $conn->prepare($sql);
            $req->bindParam(':name', $name, PDO::PARAM_STR);
            $req->bindParam(':createDate', $updateDate, PDO::PARAM_STR);
            $req->bindParam(':descrip', $description, PDO::PARAM_STR);
            $req->bindParam(':logo', $logo, PDO::PARAM_STR);
            $req->bindParam(':stadiumName', $stadium, PDO::PARAM_STR);
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
        $sql = "UPDATE user SET name = '$name', birthDate = '$birthday', nationality = '$nationality', post = '$poste'";
    
        // On execute la requête
        try {
            $req = $conn->prepare($sql);
            $req->bindParam(':name', $name, PDO::PARAM_STR);
            $req->bindParam(':birthDate', $birthday, PDO::PARAM_STR);
            $req->bindParam(':nationality', $nationality, PDO::PARAM_STR);
            $req->bindParam(':post', $poste, PDO::PARAM_STR);
            $req->execute();
            
        } catch (Exception $e) {
            //On affiche un message en cas d'erreur
            echo 'Erreur: ' . $e->getMessage();
        }
    }


    function updatePlayeur(string $name){
        // On importe le fichier de connexion à la base de donnée
        require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');
    
        // On prépare la requête et la variable name
        $sql = "UPDATE playeur SET firstName = '$fName', lastDate = '$lName', nationality = '$nationality', post = '$poste', birthday = '$birthday', playeurPic = '$playeurPic'";
    
        // On execute la requête
        try {
            $req = $conn->prepare($sql);
            $req->bindParam(':firstName', $fName, PDO::PARAM_STR);
            $req->bindParam(':name', $lName, PDO::PARAM_STR);
            $req->bindParam(':name', $nationality, PDO::PARAM_STR);
            $req->bindParam(':name', $poste, PDO::PARAM_STR);
            $req->bindParam(':name', $birthday, PDO::PARAM_STR);
            $req->bindParam(':playeurPic', $playeurPic, PDO::PARAM_STR);
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
if($_POST && $_POST['updateNameLeague']){
    $name = $_POST['updateNameLeague'];
    updateLeague($name);
    header('Location: /webfiles/views/admin/league');
}
