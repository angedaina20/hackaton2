<?php
// 1. On ouvre la session pour savoir laquelle fermer
session_start();

// 2. On vide toutes les variables de session (le nom, l'id, etc.)
$_SESSION = array();

// 3. On détruit physiquement la session sur le serveur
session_destroy();

// 4. On redirige l'utilisateur vers la page d'accueil
header("Location: index.php");
exit();
?>