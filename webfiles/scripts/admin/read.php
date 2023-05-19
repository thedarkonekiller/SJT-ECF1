<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


/**
 *Allows to recover all the contents of a table
 *
 *@param string $table
 *@return array
 */
function getAll(string $table): array
{
    //List of authorized tables
    $allowedTables = ['country', 'league', 'club', 'user'];

    //Check if the table is authorized
    if (!in_array($table, $allowedTables)) {
        //We display an error message
        echo 'La table spécifiée n\'est pas autorisée.';
        exit;
    }
    require($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/dbconnect.php');

    try {
        //We prepare our request
        $sql = "SELECT * FROM {$table}";
        $query = $conn->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    } catch (PDOException $e) {
        //Error log
        error_log('Erreur lors de l\'exécution de la requête SQL : ' . $e->getMessage());

        //Display a generic message to the user
        echo 'Une erreur est survenue lors du traitement de la requête. Veuillez réessayer ultérieurement.';
        exit; //Stop the script in case of error
    }
}
/**
 *Allows you to retrieve information
 *of a country
 *
 *@param integer $id
 *@return array
 */
function getByIdCountry(int $id): array
{

    require($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/dbconnect.php');
    //We prepare our query
    $sql = "SELECT * FROM country WHERE id = :id";

    try {
        $query = $conn->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $results = $query->execute();
        $results = $query->fetch(PDO::FETCH_ASSOC);

        return $results;
    } catch (Exception $e) {
        //Error log
        error_log('Erreur lors de l\'exécution de la requête SQL : ' . $e->getMessage());

        //Display a generic message to the user
        echo 'Une erreur est survenue lors du traitement de la requête. Veuillez réessayer ultérieurement.';
        exit; //Stop the script in case of error
    }
}
/**
 *Allows you to retrieve information
 *of a league
 *
 *@param integer $id
 *@return array
 */
function getByIdLeague(int $id): array
{

    require($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/dbconnect.php');
    //We select our query
    $sql = "SELECT * FROM league WHERE id = :id";

    try {
        //We prepare the request
        $query = $conn->prepare($sql);
        //We bind the value of the identifier to the id parameter
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        //Execute the query
        $results = $query->execute();
        //Retrieve the result of the query
        $results = $query->fetch(PDO::FETCH_ASSOC);

        return $results;
    } catch (Exception $e) {
        //Error log
        error_log('Erreur lors de l\'exécution de la requête SQL : ' . $e->getMessage());

        //Display a generic message to the user
        echo 'Une erreur est survenue lors du traitement de la requête. Veuillez réessayer ultérieurement.';
        exit; //Stop the script in case of error
    }
}
/**
 *Allows you to retrieve information
 *from a club
 *
 *@param integer $id
 *@return array
 */
function getByIdClub(int $id): array
{

    require($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/dbconnect.php');

    $sql = "SELECT * FROM club WHERE id = :id";

    try {
        $query = $conn->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $results = $query->execute();
        $results = $query->fetch(PDO::FETCH_ASSOC);

        return $results;
    } catch (Exception $e) {
        //Error log
        error_log('Erreur lors de l\'exécution de la requête SQL : ' . $e->getMessage());

        //Display a generic message to the user
        echo 'Une erreur est survenue lors du traitement de la requête. Veuillez réessayer ultérieurement.';
        exit; //Stop the script in case of error
    }
}
/**
 *Allows you to retrieve information
 *of a user
 *
 *@param integer $id
 *@return array
 */
function getByIdUser(int $id): array
{

    require($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/dbconnect.php');

    $sql = "SELECT * FROM user WHERE id = :id";

    try {
        $query = $conn->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $results = $query->execute();
        $results = $query->fetch(PDO::FETCH_ASSOC);

        return $results;
    } catch (Exception $e) {
        //Error log
        error_log('Erreur lors de l\'exécution de la requête SQL : ' . $e->getMessage());

        //Display a generic message to the user
        echo 'Une erreur est survenue lors du traitement de la requête. Veuillez réessayer ultérieurement.';
        exit; //Stop the script in case of error
    }
}
function getClubNameByLeague(int $leagueId): array
{
    require($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/dbconnect.php');

    $sql = "SELECT name FROM club WHERE league_id = :leagueId";

    try {
        $query = $conn->prepare($sql);
        $query->bindParam(':leagueId', $leagueId, PDO::PARAM_INT);
        $results = $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    } catch (Exception $e) {
        //Error log
        error_log('Erreur lors de l\'exécution de la requête SQL : ' . $e->getMessage());

        //Display a generic message to the user
        echo 'Une erreur est survenue lors du traitement de la requête. Veuillez réessayer ultérieurement.';
        exit; //Stop the script in case of error
    }
}

function getLeagueNameByCountry(int $countryId): array
{
    require($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/dbconnect.php');

    $sql = "SELECT name FROM league WHERE country_id = :countryId";

    try {
        $query = $conn->prepare($sql);
        $query->bindParam(':countryId', $countryId, PDO::PARAM_INT);
        $results = $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    } catch (Exception $e) {
        //Error log
        error_log('Erreur lors de l\'exécution de la requête SQL : ' . $e->getMessage());

        //Display a generic message to the user
        echo 'Une erreur est survenue lors du traitement de la requête. Veuillez réessayer ultérieurement.';
        exit; //Stop the script in case of error
    }
}
