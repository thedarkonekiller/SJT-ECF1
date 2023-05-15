<?php

function getAll(string $table){
    
    require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbConnect.php');
    if ($conn) {
        
        $sql = "SELECT * FROM $table";
        $query = $conn->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
    
        return $results;
    } else {
        echo "il y a un souci !!!";
    }
}