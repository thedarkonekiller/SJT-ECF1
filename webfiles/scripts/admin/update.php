<?php



    function updateCountry(string $name){
        // On importe le fichier de connexion à la base de donnée
        require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');
    
        // On prépare la requête et la variable name
        $sql = "UPDATE country SET name = '$name'";
    
        // On execute la requête
        try {
            $req = $conn->prepare($sql);
            $req->bindParam(':name', $name, PDO::PARAM_STR);
            $req->execute();
            
        } catch (Exception $e) {
            //On affiche un message en cas d'erreur
            echo 'Erreur: ' . $e->getMessage();
        }
    }
 
    function updateLeague(string $name){
        // On importe le fichier de connexion à la base de donnée
        require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');
    
        // On prépare la requête et la variable name
        $sql = "UPDATE league SET name = '$name'";
    
        // On execute la requête
        try {
            $req = $conn->prepare($sql);
            $req->bindParam(':name', $name, PDO::PARAM_STR);
            $req->execute();
            
        } catch (Exception $e) {
            //On affiche un message en cas d'erreur
            echo 'Erreur: ' . $e->getMessage();
        }
    }


    function updateClub(string $name){
        // On importe le fichier de connexion à la base de donnée
        require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');
    
        // On prépare la requête et la variable name
        $sql = "UPDATE club SET name = '$name'";
    
        // On execute la requête
        try {
            $req = $conn->prepare($sql);
            $req->bindParam(':name', $name, PDO::PARAM_STR);
            $req->execute();
            
        } catch (Exception $e) {
            //On affiche un message en cas d'erreur
            echo 'Erreur: ' . $e->getMessage();
        }
    }


    function updateUser(string $name){
        // On importe le fichier de connexion à la base de donnée
        require_once($_SERVER['DOCUMENT_ROOT'].'/webfiles/scripts/admin/dbconnect.php');
    
        // On prépare la requête et la variable name
        $sql = "UPDATE user SET name = '$name'";
    
        // On execute la requête
        try {
            $req = $conn->prepare($sql);
            $req->bindParam(':name', $name, PDO::PARAM_STR);
            $req->execute();
            
        } catch (Exception $e) {
            //On affiche un message en cas d'erreur
            echo 'Erreur: ' . $e->getMessage();
        }
    }







<<<<<<< HEAD
=======
    $exec = $conn->query($req);
}
else{
   echo "La modification n'a pas fonctionné";
}
>>>>>>> b70048296953f2b40dd72a86fe5c62766617111f
?>
