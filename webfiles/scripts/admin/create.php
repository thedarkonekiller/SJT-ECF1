<?php
/**
 * Permet de créer un pays
 *
 * @param string $name
 * @return void
 */
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

/**
 * Permet de créer une ligue
 *
 * @param string $league
 * @return void
 */
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

/**
 * Permet de créer un club
 *
 * @param string $name
 * @param string $createClub
 * @param string $descClub
 * @param string $imgClub
 * @param string $Stade
 * @param integer $leagueId
 * @return void
 */
function createClub(string $name, string $createClub, string $descClub, string $imgClub, string $Stade, int $leagueId){
    // On importe le fichier de connexion à la base de donnée
    require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');

    // On prépare la requête et les variables nameclub, createclub, locstade, imgclub, desclub.
    $sql = "INSERT INTO club(name, createDate, descrip, logo, stadiumName, league_id) VALUES (:name , :createClub, :descClub, :imgClub, :Stade, :leagueId)";

    // On execute la requête
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
        //On affiche un message en cas d'erreur
        echo 'Erreur: ' . $e->getMessage();
    }
}

/**
 * Permet de créer un joueur
 *
 * @param string $firstName
 * @param string $lastName
 * @param string $nationalite
 * @param string $poste
 * @param string $birthday
 * @param string $playerPic
 * @return void
 */
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

/**
 * Permet de créer un utilisateur
 *
 * @param string $userName
 * @param string $lastName
 * @param string $firstName
 * @param string $email
 * @param string $passwd
 * @return void
 */
function createUser(string $userName, string $lastName, string $firstName, string $email, string $passwd){
    // On importe le fichier de connexion à la base de donnée
    require($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');
    
    // On prépare la requête et les variables firstname, lastname, nationalite, poste, birthday, playerpic.
    $sql = "INSERT INTO user (username, email, passwd, lastName, firstName ) VALUES (:userName, :email, :passwd, :lastName, :firstName)";

    // On execute la requête
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
        //On affiche un message en cas d'erreur
        echo $sql . "<br>" . $e->getMessage();
    }
}


// Traitement du formulaire d'ajout de club
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
// Traitement du formulaire d'ajout de ligue
if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['addLeagueName']){
    $name = $_POST['addLeagueName'];
    createLeague($name);
    header('Location: /webfiles/views/admin/league');
}