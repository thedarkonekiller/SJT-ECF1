<?php

function deleteCountry(int $id){
    // On importe le fichier de connexion à la base de donnée
    require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');

    // On prépare la requête et la variable id
    $sql = "DELETE FROM country WHERE id = :id";

    // On execute la requête
    try {
        $req = $conn->prepare($sql);
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        
    } catch (Exception $e) {
        //On affiche un message en cas d'erreur
        echo 'Erreur: ' . $e->getMessage();
    }
}
function deleteLeague(int $id){
    // On importe le fichier de connexion à la base de donnée
    require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');

    // On prépare la requête et la variable id
    $sql = "DELETE FROM league WHERE id = :id";

    // On execute la requête
    try {
        $req = $conn->prepare($sql);
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        
    } catch (Exception $e) {
        //On affiche un message en cas d'erreur
        echo 'Erreur: ' . $e->getMessage();
    }
}
function deleteClub(int $id){
    // On importe le fichier de connexion à la base de donnée
    require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');

    // On prépare la requête et la variable id
    $sql = "DELETE FROM club WHERE id = :id";

    // On execute la requête
    try {
        $req = $conn->prepare($sql);
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        
    } catch (Exception $e) {
        //On affiche un message en cas d'erreur
        echo 'Erreur: ' . $e->getMessage();
    }
}
function deleteUser(int $id){
    // On importe le fichier de connexion à la base de données
    require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');

    // On prépare la requête et la variable id
    $sql = "DELETE FROM user WHERE id = :id";

    // On execute la requête
    try {
        $req = $conn->prepare($sql);
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        
    } catch (Exception $e) {
        //On affiche un message en cas d'erreur
        echo 'Erreur: ' . $e->getMessage();
    }
}

// On vérifie si une valeur est soumise avec le nom de champ
if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['deleteIdClub']){
    // On récupére la valeur soumise avec le nom du champ
    $id = $_POST['deleteIdClub'];
    // On appelle la fonction tout en passant par la valeur des identifiants
    deleteClub($id);
    header('Location: /webfiles/views/admin/club');
}
// On vérifie si une valeur est soumise avec le nom de champ
if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['deleteIdLeague']){
     // On récupére la valeur soumise avec le nom du champ
    $id = $_POST['deleteIdLeague'];
     // On appelle la fonction tout en passant par la valeur des identifiants
    deleteLeague($id);
    header('Location: /webfiles/views/admin/league');
}