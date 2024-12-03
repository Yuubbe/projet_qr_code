<?php
$host = 'localhost'; // Remplacez par votre hôte
$dbname = 'verification_system'; // Le nom de votre base de données
$username = 'root'; // Votre nom d'utilisateur MySQL
$password = 'root'; // Votre mot de passe MySQL (si nécessaire)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
