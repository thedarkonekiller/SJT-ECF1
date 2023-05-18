<?php
// On va créer des variables qui vont etre égal à ce qu'on a inscrit dans la BDD
$servername = "91.234.195.40";
$username = "cp1902020p09_adm_sjt_ecf1";
$password = "S3cr3t02**";
$dbname = "cp1902020p09_sjt-ecf1";

// On se connecte à la base de données
try {
    // Code susceptible de générer une exception
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Gestion de l'exception
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}