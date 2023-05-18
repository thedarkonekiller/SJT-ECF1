<?php

function createCountry(string $name){
    //Import the database connection file
    require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');

    //We prepare the query and the variable name
    $sql = "INSERT INTO country (name) VALUES (:name)";

    //Execute the query
    try {
        $req = $conn->prepare($sql);
        $req->bindParam(':name', $name, PDO::PARAM_STR);
        $req->execute();
        
    } catch (Exception $e) {
        //We display a message in case of error
        echo 'Erreur: ' . $e->getMessage();
    }
}

function createLeague(string $league){
    //We import the connection file to the database
    require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');
    
    //We prepare the request and the variables nameclub, createclub, locstade, imgclub, paragclub.
    $sql = "INSERT INTO league (name) VALUES (:league)";

    //Execute the query
    try {
        $req = $conn->prepare($sql);
        $req->bindParam(':league', $league, PDO::PARAM_STR);
        $req->execute();
        
    } catch (Exception $e) {
        //We display a message in case of error
        echo 'Erreur: ' . $e->getMessage();
    }
}

function createClub(string $name, string $createClub, string $descClub, string $imgClub, string $Stade, int $leagueId){
    //Import the database connection file
    require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');

    //We prepare the request and the variables nameclub, createclub, locstade, imgclub, desclub.
    $sql = "INSERT INTO club(name, createDate, descrip, logo, stadiumName, league_id) VALUES (:name , :createClub, :descClub, :imgClub, :Stade, :leagueId)";

    //Execute the query
    try {
        $req = $conn->prepare($sql);
        $req->bindParam(':name', $name, PDO::PARAM_STR);
        $req->bindParam(':createClub', $createClub, PDO::PARAM_STR);
        $req->bindParam(':descClub', $descClub, PDO::PARAM_STR);
        $req->bindParam(':imgClub', $imgClub, PDO::PARAM_STR);
        $req->bindParam(':Stade', $Stade, PDO::PARAM_STR);
        $req->bindParam(':leagueId', $leagueId, PDO::PARAM_INT);
        $req->execute();
        
    } catch (Exception $e) {
        //We display a message in case of error
        echo 'Erreur: ' . $e->getMessage();
    }
}



function createPlayer(string $firstName, string $lastName, string $nationalite, string $poste, string $birthday, string $playerPic){
    //Import the database connection file
    require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');

    //We prepare the request and the variables firstname, lastname, nationality, position, birthday, playerpic.
    $sql = "INSERT INTO player (firstname , lastname , nationalite , poste , birthday , playerpic) VALUES (:firstName , :lastName, :nationalite, :poste, :birthday; :playerPic)";

    //Execute the query
    try {
        $req = $conn->prepare($sql);
        $req->bindParam(':firstName', $firstName, PDO::PARAM_STR);
        $req->bindParam(':lastName', $lastName, PDO::PARAM_STR);
        $req->bindParam(':nationalite', $nationalite, PDO::PARAM_STR);
        $req->bindParam(':poste', $poste, PDO::PARAM_STR);
        $req->bindParam(':birthday', $birthday, PDO::PARAM_STR);
        $req->bindParam(':playerPic', $playerPic, PDO::PARAM_STR);
        $req->execute();
        
    } catch (Exception $e) {
        //We display a message in case of error
        echo 'Erreur: ' . $e->getMessage();
    }
}


if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['addClubName']){
    $name = $_POST['addClubName'];
    $createClub = $_POST['addCludCreatedDate'];
    $descClub = $_POST['addClubDescription'];
    $imgClub = $_POST['addClubImage'];
    $Stade = $_POST['addClubStadium'];
    $leagueId = $_POST['addClubLeague'];
    createClub($name, $createClub, $descClub, $imgClub, $Stade, $leagueId);
    header('Location: /webfiles/views/admin/club');
}
if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['addLeagueName']){
    $name = $_POST['addLeagueName'];
    createLeague($name);
    header('Location: /webfiles/views/admin/league');
}

function createUser(string $userName, string $lastName, string $firstName, string $email, string $passwd){
    //Import the database connection file
    require($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');

     //We prepare the request and the variables firstname, lastname, nationality, position, birthday, playerpic.
    $sql = "INSERT INTO user (username, email, passwd, lastName, firstName ) VALUES (:userName, :email, :passwd, :lastName, :firstName)";

    //Execute the query
    try {
        $req = $conn->prepare($sql);
        $req->bindValue(':userName', $userName, PDO::PARAM_STR);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->bindValue(':passwd', $passwd, PDO::PARAM_STR);
        $req->bindValue(':lastName', $lastName, PDO::PARAM_STR);
        $req->bindValue(':firstName', $firstName, PDO::PARAM_STR);
        $req->execute();

    }
    catch(PDOException $e) {
        //We display a message in case of error
        echo $sql . "<br>" . $e->getMessage();
    }
}