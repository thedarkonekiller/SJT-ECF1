<!DOCTYPE html>
<html>
<head>
    <title>Création de la base de données</title>
</head>
<body>
    <h1>Création de la base de données</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //Retrieve connection information entered by the user
        $servername = $_POST['servername'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        try {
            //Connect to MySQL
            $conn = new PDO("mysql:host=$servername", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connexion à MySQL réussie<br>";

            //Create the database
            $dbname = "FootballClub";
            $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
            $conn->exec($sql);
            echo "Base de données créée avec succès<br>";
            echo "Pensez à renseigner vos informations de connexion dans le fichier dbconnect.php situé dans /webfiles/scripts/admin"

            //Using the database
            $conn->exec("USE $dbname");

            //Execution of the SQL script
            $sql = file_get_contents('./base.sql');
            $conn->exec($sql);
            echo "Script SQL exécuté avec succès";
        } catch(PDOException $e) {
            echo "Erreur lors de la connexion à MySQL : " . $e->getMessage();
        }
    } else {
        //Display the form for entering connection information
        ?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="servername">Serveur MySQL :</label>
            <input type="text" name="servername" id="servername" required><br>

            <label for="username">Nom d'utilisateur :</label>
            <input type="text" name="username" id="username" required><br>

            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" required><br>

            <input type="submit" value="Créer la base de données">
        </form>
        <?php
    }
    ?>
</body>
</html>
