<?php
$dsn = 'mysql:host=localhost;dbname=bibliotheque';
$username = "root";
$password = "";

try {
    $conn = new PDO($dsn, $username, $password);
    // Configure les options PDO si nécessaire
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
?>