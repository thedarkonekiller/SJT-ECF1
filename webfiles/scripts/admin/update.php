<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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


    function updateClub(int $id, string $name, string $createDate, string $descrip, string $logo, string $stadium) {
        // On importe le fichier de connexion à la base de donnée
        require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');
    
        // On prépare la requête et la variable name
        $sql = "UPDATE club SET name = :name, createDate = :createDate, descrip = :descrip, logo = :logo, stadiumName = :stadium WHERE id = :id";
    
        // On execute la requête
        try {
            $req = $conn->prepare($sql);
            $req->bindParam(':id', $id, PDO::PARAM_INT);
            $req->bindParam(':name', $name, PDO::PARAM_STR);
            $req->bindParam(':createDate', $createDate, PDO::PARAM_STR);
            $req->bindParam(':descrip', $descrip, PDO::PARAM_STR);
            $req->bindParam(':logo', $logo, PDO::PARAM_STR);
            $req->bindParam(':stadium', $stadium, PDO::PARAM_STR);
            $req->execute();
        } catch (Exception $e) {
            // On affiche un message en cas d'erreur
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
//  var_dump($_POST);

if($_POST && $_POST['updateNameCountry']){
    $name = $_POST['updateNameCountry'];
    updateCountry($name);
    header('Location: /webfiles/views/admin/country');
}
elseif($_POST && $_POST['updateNameLeague']){
    $name = $_POST['updateNameLeague'];
    updateLeague($name);
    header('Location: /webfiles/views/admin/league');
}
elseif($_POST && $_POST['updateNameClub']){
    $id = $_POST['updateClubId'];
    $name = $_POST['updateNameClub'];
    $createDate = $_POST['updateClubCreatedDate'];
    $descrip = $_POST['updateClubDescription'];
    $logo = $_POST['updateClubImage'];
    $stadium = $_POST['updateClubStadium'];
    updateClub($id, $name, $createDate, $descrip, $logo, $stadium);
    header('Location: /webfiles/views/admin/club');

}
