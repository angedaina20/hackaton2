<?php
$host = "localhost";
$dbname = "hackaton"; // Nom de ta base vue dans phpMyAdmin
$user = "root";       // Utilisateur par défaut de XAMPP
$pass = "";           // Pas de mot de passe par défaut

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>