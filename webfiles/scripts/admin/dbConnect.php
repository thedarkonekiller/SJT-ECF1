<?php
$servername = "91.234.195.40";
$username = "cp1902020p09_adm_sjt_ecf1";
$password = "S3cr3t02**";
$dbname = "cp1902020p09_sjt-ecf1";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}