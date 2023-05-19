<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/functions.php');

/**
 *Allows you to create a country
 *
 *@param string $name
 *@param string $img
 *@return void
 */
function createCountry(string $name, string $img){
    //Import the database connection file
    require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');

    //We prepare the query and the variable name
    $sql = "INSERT INTO country (name, img) VALUES (:name, :img)";

    //Execute the query
    try {
        $req = $conn->prepare($sql);
        $req->bindParam(':name', $name, PDO::PARAM_STR);
        $req->bindParam(':img', $img, PDO::PARAM_STR);
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
 *Allows you to create a league
 *
 *@param string $league
 *@return void
 */
function createLeague(string $league){
    //We import the connection file to the database
    require($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');
    
    //We prepare the request and the variables nameclub, createclub, locstade, imgclub, paragclub.
    $sql = "INSERT INTO league (name) VALUES (:league)";

    //Execute the query
    try {
        $req = $conn->prepare($sql);
        $req->bindParam(':league', $league, PDO::PARAM_STR);
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
 *Permet de créer un club
 *
 *@param string $name
 *@param string $createClub
 *@param string $descClub
 *@param string $imgClub
 *@param string $Stade
 *@param integer $leagueId
 *@return void
 */
function createClub(string $name, string $createClub, string $descClub, string $imgClub, string $Stade, int $leagueId){
    //Import the database connection file
    require($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');

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
        //Error log
        error_log('Erreur lors de l\'exécution de la requête SQL : ' . $e->getMessage());

        //Display a generic message to the user
        echo 'Une erreur est survenue lors du traitement de la requête. Veuillez réessayer ultérieurement.';
        exit; //Stop the script in case of error
    }
}

/**
 *Permet de créer un utilisateur
 *
 *@param string $userName
 *@param string $lastName
 *@param string $firstName
 *@param string $email
 *@param string $passwd
 *@return void
 */
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
        //Error log
        error_log('Erreur lors de l\'exécution de la requête SQL : ' . $e->getMessage());

        //Display a generic message to the user
        echo 'Une erreur est survenue lors du traitement de la requête. Veuillez réessayer ultérieurement.';
        exit; //Stop the script in case of error
    }
}


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //Process the add country form
    if(isset($_POST['addCountry'])){
        if (empty(Validator($_POST))) {
            $name = $_POST['addCountryName'];
            createCountry($name);
            header('Location: /webfiles/views/admin/country');
        } else { ?>
            <!--An error message is displayed -->
            <?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_header.php'); ?>
            <p class="danger">
                <?php
                    $errors = Validator($_POST);
                    foreach ($errors as $error) { ?>
                        <p class="danger"><?= $error ?></p>
                    <?php }
                ?>
            </p>
        <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_footer.php');
        RedirectToURL('/webfiles/views/admin/country', 5);
        }
    }
    //Process the add league form
    elseif(isset($_POST['addLeague'])){
        if (empty(Validator($_POST))) {
            $name = $_POST['addLeagueName'];
            createLeague($name);
            header('Location: /webfiles/views/admin/league');
        } else { ?>
            <!--An error message is displayed -->
            <?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_header.php'); ?>
            <p class="danger">
                <?php
                    $errors = Validator($_POST);
                    foreach ($errors as $error) { ?>
                        <p class="danger"><?= $error ?></p>
                    <?php }
                ?>
            </p>
        <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_footer.php');
        RedirectToURL('/webfiles/views/admin/league', 5);
        }
    }
    //Process the add club form
    elseif(isset($_POST['addClub'])){
        if (empty(Validator($_POST))) {
            $name = $_POST['addClubName'];
            $createClub = $_POST['addCludCreatedDate'];
            $descClub = $_POST['addClubDescription'];
            $imgClub = $_POST['addClubImage'];
            $Stade = $_POST['addClubStadium'];
            $leagueId = $_POST['addClubLeague'];
            createClub($name, $createClub, $descClub, $imgClub, $Stade, $leagueId);
            header('Location: /webfiles/views/admin/club');
        } else { ?>
            <!--An error message is displayed -->
            <?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_header.php'); ?>
            <p class="danger">
                <?php
                    $errors = Validator($_POST);
                    foreach ($errors as $error) { ?>
                        <p class="danger"><?= $error ?></p>
                    <?php } ?>
            </p>
            <?php 
            require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_footer.php');
            RedirectToURL('/webfiles/views/admin/club', 5);
        }   
    }
    //Process the add user form
    elseif (isset($_POST['addUser'])) {
        if (empty(Validator($_POST))) {
            $userName = $_POST['addUserName'];
            $firstName = $_POST['addFirstName'];
            $lastName = $_POST['addLastName'];
            $email = $_POST['addEmail'];
            $password = $_POST['addPassword'];
            $password = password_hash($password, PASSWORD_ARGON2ID);

            createUser($userName, $lastName, $firstName, $email, $password); ?>
            <?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_header.php'); ?>
            <div class='success flex flex-col'>
                    <h3>Vous êtes inscrit avec succès.</h3>
                    <p>Vous allez être redirigé vers la page de connexion</a></p>
            </div>
            <?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_footer.php');
            
            RedirectToURL('/webfiles/views/user/connexion.php', 5);
        } else { ?>
            <!--An error message is displayed -->
            <?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_header.php'); ?>
            <p class="danger">
                <?php
                    $errors = Validator($_POST);
                    foreach ($errors as $error) { ?>
                        <p class="danger"><?= $error ?></p>
                    <?php }
                ?>
            </p>
        <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_footer.php');
        RedirectToURL('/webfiles/views/admin/league', 5);
        }
    }
}




