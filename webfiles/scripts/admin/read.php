<?php

function getAll(string $table){
    
    require($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');
        
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
        
        $sql = "SELECT * FROM league WHERE id = :id";

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