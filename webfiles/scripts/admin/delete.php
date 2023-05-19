<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

/**
 *Allows you to delete a country
 *
 *@param integer $id
 *@return void
 */
function deleteCountry(int $id){
    //Import the database connection file
    require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');

    //We prepare the request and the id variable
    $sql = "DELETE FROM country WHERE id = :id";

    //Execute the query
    try {
        $req = $conn->prepare($sql);
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

/**
 *Allows you to delete a league
 *
 *@param integer $id
 *@return void
 */
function deleteLeague(int $id){
    //Import the database connection file
    require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');

    //We prepare the request and the id variable
    $sql = "DELETE FROM league WHERE id = :id";

    //Execute the query
    try {
        $req = $conn->prepare($sql);
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

/**
 *Allows you to delete a club
 *
 *@param integer $id
 *@return void
 */
function deleteClub(int $id){
    //Import the database connection file
    require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');

    //We prepare the request and the id variable
    $sql = "DELETE FROM club WHERE id = :id";

    //Execute the query
    try {
        $req = $conn->prepare($sql);
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

/**
 *Allows you to delete a user
 *
 *@param integer $id
 *@return void
 */
function deleteUser(int $id){
    //Import the database connection file
    require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');

    //We prepare the request and the id variable
    $sql = "DELETE FROM user WHERE id = :id";

    //Execute the query
    try {
        $req = $conn->prepare($sql);
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


//And he has a $_POST
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //Process the country deletion form
    if(isset($_POST['deleteCountry'])){
        //Retrieve the submitted value with the name of the field
        $id = $_POST['deleteIdCountry'];
        //We call the function while passing through the value of the identifiers
        deleteClub($id);
        header('Location: /webfiles/views/admin/country');
    }
    //Process the league deletion form
    elseif(isset($_POST['deleteLeague'])){
        //Retrieve the submitted value with the name of the field
        $id = $_POST['deleteIdLeague'];
        //We call the function while passing through the value of the identifiers
        deleteLeague($id);
        header('Location: /webfiles/views/admin/league');
    }
    //Process the club deletion form
    elseif(isset($_POST['deleteClub'])){
        //Retrieve the submitted value with the name of the field
        $id = $_POST['deleteIdClub'];
        //We call the function while passing through the value of the identifiers
        deleteClub($id);
        header('Location: /webfiles/views/admin/club');
    }
    //Process the user deletion form
    elseif(isset($_POST['deleteUser'])){
        //Retrieve the submitted value with the name of the field
        $id = $_POST['deleteIdUser'];
        //We call the function while passing through the value of the identifiers
        deleteUser($id);
        header('Location: /webfiles/views/admin/user');
    }
}