<?php 
session_start();
// Sécurité : Si l'utilisateur n'est pas connecté, on le renvoie à la connexion
if(!isset($_SESSION['user_id'])){
    header("Location: connexion.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ajouter un logement</title>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div style="max-width: 500px; margin: 50px auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px;">
        <h2>Proposer un logement</h2>
        <form action="ajouter_backend.php" method="POST">
            <p>Titre de l'annonce :<br>
            <input type="text" name="titre" required style="width: 100%;"></p>
            
            <p>Ville :<br>
            <input type="text" name="ville" required style="width: 100%;"></p>
            
            <p>Prix par nuit (FCFA) :<br>
            <input type="number" name="prix" required style="width: 100%;"></p>
            
            <p>Description :<br>
            <textarea name="description" rows="4" style="width: 100%;"></textarea></p>
            
            <button type="submit" style="background: #2980b9; color: white; padding: 10px; width: 100%; border: none; border-radius: 5px;">
                Publier l'annonce
            </button>
        </form>
    </div>
</body>
</html>