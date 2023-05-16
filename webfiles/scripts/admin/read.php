<?php

function getAll(string $table){
    
    require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbConnect.php');
        
        $sql = "SELECT * FROM $table";

        try {
            $query = $conn->query($sql);
            $results = $query->fetchAll(PDO::FETCH_ASSOC);    
            return $results;
        } catch (Exception $e) {
            //On affiche un message en cas d'erreur
            echo 'Erreur: ' . $e->getMessage();
        }
    
    }



function getByIdCountry(int $id){

    require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbConnect.php');
        
        $sql = "SELECT * FROM country WHERE id = :id";

        try {
            $query = $conn->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $results = $query->execute();
            $results = $query->fetch(PDO::FETCH_ASSOC);

            return $results;

        } catch (Exception $e) {
            //On affiche un message en cas d'erreur
            echo 'Erreur: ' . $e->getMessage();
        }
    }