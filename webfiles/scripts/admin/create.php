<?php

function createCountry(string $name){
    // On importe le fichier de connexion à la base de donnée
    require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');

    // On prépare la requête et la variable name
    $sql = "INSERT INTO country (name) VALUES (:name)";

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

function createPlayer(string $firstName, string $lastName, string $nationalite, string $poste, string $birthday, string $playerPic){
    // On importe le fichier de connexion à la base de donnée
    require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');

    // On prépare la requête et les variables firstname, lastname, nationalite, poste, birthday, playerpic.
    $sql = "INSERT INTO player (firstname , lastname , nationalite , poste , birthday , playerpic) VALUES (:firstName , :lastName, :nationalite, :poste, :birthday; :playerPic)";

    // On execute la requête
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
        //On affiche un message en cas d'erreur
        echo 'Erreur: ' . $e->getMessage();
    }
}

function createClub(string $name, string $createClub, string $descClub, string $imgClub, string $locStade){
    // On importe le fichier de connexion à la base de donnée
    require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');

    // On prépare la requête et les variables nameclub, createclub, locstade, imgclub, desclub.
    $sql = "INSERT INTO club (name, createDate, desc, logo, stadiumName) VALUES (:name , :createClub, :descClub, :imgClub, :locStade)";

    // On execute la requête
    try {
        $req = $conn->prepare($sql);
        $req->bindParam(':name', $name, PDO::PARAM_STR);
        $req->bindParam(':createClub', $createClub, PDO::PARAM_STR);
        $req->bindParam(':paragClub', $descClub, PDO::PARAM_STR);
        $req->bindParam(':imgClub', $imgClub, PDO::PARAM_STR);
        $req->bindParam(':locStade', $locStade, PDO::PARAM_STR);
        $req->execute();
        
    } catch (Exception $e) {
        //On affiche un message en cas d'erreur
        echo 'Erreur: ' . $e->getMessage();
    }
}

function createLeague(string $league){
    // On importe le fichier de connexion à la base de donnée
    require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');

    // On prépare la requête et les variables nameclub, createclub, locstade, imgclub, paragclub.
    $sql = "INSERT INTO league (name) VALUES (:league)";

    // On execute la requête
    try {
        $req = $conn->prepare($sql);
        $req->bindParam(':league', $league, PDO::PARAM_STR);
        $req->execute();
        
    } catch (Exception $e) {
        //On affiche un message en cas d'erreur
        echo 'Erreur: ' . $e->getMessage();
    }
}