<?php

function deleteCountry(int $id){
    // On importe le fichier de connexion à la base de donnée
    require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/db.php');

    // On prépare la requête et la variable id
    $sql = "DELETE FROM country WHERE id = :id";

    // On execute la requête
    try {
        $req = $db->prepare($sql);
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        
    } catch (Exception $e) {
        //On affiche un message en cas d'erreur
        echo 'Erreur: ' . $e->getMessage();
    }

}