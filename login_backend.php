<?php
session_start();
include('connexion.php');

if (isset($_POST['login'])) {
    // ... tes lignes pour préparer et exécuter la requête SQL ...
    $user = $stmt->fetch();

    if ($user) { // On vérifie si l'utilisateur existe
        $_SESSION['user_nom'] = $user['nom'];
        $_SESSION['utilisateur_id'] = $user['id']; // La ligne qu'on a ajoutée

        header("Location: index.php");
        exit();
    } // <--- Fermeture du IF ($user)
} // <--- Fermeture du IF (isset($_POST['login']))
?>