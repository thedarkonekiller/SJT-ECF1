<?php

function getAll(string $table){
    
    require($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');
        // On prépare notre requete
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

    require($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');
        // On prépare notre requete
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
    

function getByIdLeague(int $id){

    require($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');
        // On sélectionne notre requete
        $sql = "SELECT * FROM league WHERE id = :id";

        try {
            // On prépare la requete
            $query = $conn->prepare($sql);
            // On lie la valeur de l'identifiant au paramétre id
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            // On éxécute la requete 
            $results = $query->execute();
            // On récupére le résultat de la requete
            $results = $query->fetch(PDO::FETCH_ASSOC);

            return $results;

        } catch (Exception $e) {
            //On affiche un message en cas d'erreur
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    

    function getByIdClub(int $id){
    
        require($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');
            
            $sql = "SELECT * FROM club WHERE id = :id";
    
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