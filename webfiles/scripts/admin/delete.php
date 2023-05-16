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
    // On importe le fichier de connexion à la base de donnée
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


if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['deleteIdClub']){
    $id = $_POST['deleteIdClub'];
    deleteClub($id);
    header('Location: /webfiles/views/admin/club');
}