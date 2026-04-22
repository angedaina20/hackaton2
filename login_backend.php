<?php
session_start(); // On prépare le système de "badges" (sessions)
include 'config.php'; // On se connecte à la base de données

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // 1. On cherche si l'email existe dans la table
    $sql = "SELECT * FROM utilisateurs WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch(); // On récupère les infos de l'utilisateur trouvé

    // 2. On vérifie si l'utilisateur existe ET si le mot de passe est bon
    if ($user && password_verify($password, $user['mot_de_passe'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_nom'] = $user['nom'];
        
        // Redirection vers l'accueil
        header("Location: index.php"); 
        exit();
    }
?>