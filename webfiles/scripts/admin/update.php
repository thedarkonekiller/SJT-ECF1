<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

function updateCountry(string $name, int $id, string $img)
{
    // On importe le fichier de connexion à la base de donnée
    require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/dbconnect.php');

    // On prépare la requête et la variable name
    $sql = "UPDATE country SET name = :name, img = :img WHERE id = :id";

    // On execute la requête
    try {
        $req = $conn->prepare($sql);
        $req->bindParam(':name', $name, PDO::PARAM_STR);
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->bindParam(':img', $img, PDO::PARAM_INT);
        $req->execute();
    } catch (Exception $e) {
        //Error log
        error_log('Erreur lors de l\'exécution de la requête SQL : ' . $e->getMessage());

        //Display a generic message to the user
        echo 'Une erreur est survenue lors du traitement de la requête. Veuillez réessayer ultérieurement.';
        exit; //Stop the script in case of error
    }
}

function updateLeague(string $name, int $id)
{
    // On importe le fichier de connexion à la base de donnée
    require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/dbconnect.php');

    // On prépare la requête et la variable name
    $sql = "UPDATE league SET name = :name WHERE id = :id";

    // On execute la requête
    try {
        $req = $conn->prepare($sql);
        $req->bindParam(':name', $name, PDO::PARAM_STR);
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
    } catch (Exception $e) {
        //Error log
        error_log('Erreur lors de l\'exécution de la requête SQL : ' . $e->getMessage());

        //Display a generic message to the user
        echo 'Une erreur est survenue lors du traitement de la requête. Veuillez réessayer ultérieurement.';
        exit; //Stop the script in case of error
    }
}


function updateClub(int $id, string $name, string $createDate, string $descrip, string $logo, string $stadium, int $league)
{
    // On importe le fichier de connexion à la base de donnée
    require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/dbconnect.php');

    // On prépare la requête et la variable name
    $sql = "UPDATE club SET name = :name, createDate = :createDate, descrip = :descrip, logo = :logo, stadiumName = :stadium, league_id = :leagueId WHERE id = :id";

    // On execute la requête
    try {
        $req = $conn->prepare($sql);
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->bindParam(':name', $name, PDO::PARAM_STR);
        $req->bindParam(':createDate', $createDate, PDO::PARAM_STR);
        $req->bindParam(':descrip', $descrip, PDO::PARAM_STR);
        $req->bindParam(':logo', $logo, PDO::PARAM_STR);
        $req->bindParam(':stadium', $stadium, PDO::PARAM_STR);
        $req->bindParam(':leagueId', $league, PDO::PARAM_INT);
        $req->execute();
    } catch (Exception $e) {
        //Error log
        error_log('Erreur lors de l\'exécution de la requête SQL : ' . $e->getMessage());

        //Display a generic message to the user
        echo 'Une erreur est survenue lors du traitement de la requête. Veuillez réessayer ultérieurement.';
        exit; //Stop the script in case of error
    }
}


function updateUser(string $name)
{
    // On importe le fichier de connexion à la base de donnée
    require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/dbconnect.php');

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
        //Error log
        error_log('Erreur lors de l\'exécution de la requête SQL : ' . $e->getMessage());

        //Display a generic message to the user
        echo 'Une erreur est survenue lors du traitement de la requête. Veuillez réessayer ultérieurement.';
        exit; //Stop the script in case of error
    }
}




if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //Process the update country form
    if(isset($_POST['updateCountry'])){
        $id = $_POST['updateContryId'];
        $name = $_POST['updateCountryName'];
        $img = $_POST['updateCountryImage'];
        updateCountry($name, $id, $img);
        header('Location: /webfiles/views/admin/country');
    }
    //Process the update league form
    elseif(isset($_POST['updateLeague'])){
        $id = $_POST['updateLeagueId'];
        $name = $_POST['updateLeagueName'];
        updateLeague($name, $id);
        header('Location: /webfiles/views/admin/league');
    }
    //Process the update club form
    elseif(isset($_POST['updateClub'])){
        $name = $_POST['updateClubName'];
        $createDate = $_POST['updateClubCreatedDate'];
        $descrip = $_POST['updateClubDescription'];
        $logo = $_POST['updateClubImage'];
        $stadium = $_POST['updateClubStadium'];
        $league = $_POST['updateClubLeague'];
        updateClub($id, $name, $createDate, $descrip, $logo, $stadium, $league);
        header('Location: /webfiles/views/admin/club');
    }
}