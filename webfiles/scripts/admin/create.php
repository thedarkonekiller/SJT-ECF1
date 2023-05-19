<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/functions.php');

/**
 * Permet de créer un pays
 *
 * @param string $name
 * @return void
 */
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

/**
 * Permet de créer une ligue
 *
 * @param string $league
 * @return void
 */
function createLeague(string $league, int $country){
    //We import the connection file to the database
    require($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');
    
    //We prepare the request and the variables nameclub, createclub, locstade, imgclub, paragclub.
    $sql = "INSERT INTO league (name, country_id) VALUES (:league, :country)";

    //Execute the query
    try {
        $req = $conn->prepare($sql);
        $req->bindParam(':league', $league, PDO::PARAM_STR);
        $req->bindParam(':country', $country, PDO::PARAM_INT);
        $req->execute();
        
    } catch (Exception $e) {
        //We display a message in case of error
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
        //We display a message in case of error
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
    //Import the database connection file
    require($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');
    
    // On prépare la requête et les variables firstname, lastname, nationalite, poste, birthday, playerpic.
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


if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //Process the add country form
        if(isset($_POST['addCountry'])){
            if (empty(Validator($_POST))) {
                $name = $_POST['addCountryName'];
                $img = $_POST['addCountryImage'];
                createCountry($name, $img);
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
    // Traitement du formulaire d'ajout de ligue
    if(isset($_POST['addLeague'])){
        if (empty(Validator($_POST))) {
            $name = $_POST['addLeagueName'];
            $country = $_POST['addLeagueCountry'];
            createLeague($name, $country);
            header('Location: /webfiles/views/admin/league');
        } else { ?>
            <!-- On affiche un message d'erreur -->
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
    // Traitement du formulaire d'ajout de club
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
            <!-- On affiche un message d'erreur -->
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
    // Traitement du formulaire d'ajout de ligue
    elseif(isset($_POST['addLeague'])){
        if (empty(Validator($_POST))) {
            $name = $_POST['addLeagueName'];
            $country = $_POST['addLeagueCountry'];
            createLeague($name, $country);
            header('Location: /webfiles/views/admin/league');
        } else { ?>
            <!-- On affiche un message d'erreur -->
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
    elseif (isset($_POST['addUser'])) {
        if (empty(Validator($_POST))) {
            $userName = $_POST['addUserName'];
            $firstName = $_POST['addFirstName'];
            $lastName = $_POST['addLastName'];
            $email = $_POST['addEmail'];
            $password = $_POST['addPassword'];
            // On fait le hashage du mot de passe
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
                    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_header.php'); ?>
                    <div class='danger flex flex-col'>
                            <h3>L'email existe déjà !</h3>
                    </div>
                    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_footer.php');

                }
            } else { ?>
                <?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_header.php'); ?>
                <div class='danger flex flex-col'>
                        <h3>Le pseudo existe déjà !</h3>
                </div>
                <?php require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/views/_included/_footer.php');

            }
} else { ?>
            <!-- On affiche un message d'erreur -->
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
        RedirectToURL('/webfiles/views/user/connexion.php', 5);
        }




