<?php 
// 1. Démarrage de la session (obligatoire pour savoir si Ade est là)
session_start(); 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Accueil - Hackaton Logement</title>
</head>
<body>

    <?php include 'navbar.php'; ?>

    <div style="text-align: center; padding: 50px; background-color: #f4f4f4;">
        <h1>Bienvenue sur notre plateforme</h1>
        <p>Que souhaitez-vous faire ?</p>
        
        <div style="margin-top: 20px;">
            <a href="#liste" style="padding: 10px 20px; background: #27ae60; color: white; text-decoration: none; border-radius: 5px;">
                🏠 Visiter les logements
            </a>

            <?php if(isset($_SESSION['user_id'])): ?>
                <a href="ajouter_logement.php" style="padding: 10px 20px; background: #2980b9; color: white; text-decoration: none; border-radius: 5px; margin-left: 10px;">
                    ➕ Ajouter un logement
                </a>
            <?php endif; ?>
        </div>
    </div>

    <div id="liste" style="padding: 20px;">
        <h2>Dernières offres</h2>
        <div id="liste" style="padding: 20px; display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
    <?php
    // Connexion rapide pour l'affichage
    try {
        $db = new PDO('mysql:host=localhost;dbname=hackaton;charset=utf8', 'root', '');
        
        // On récupère tous les logements
        $reponse = $db->query('SELECT * FROM logements ORDER BY id DESC');

        // On fait une boucle pour chaque logement trouvé
        while ($donnees = $reponse->fetch()) {
            ?>
            <div style="border: 1px solid #ddd; border-radius: 10px; width: 300px; padding: 15px; box-shadow: 2px 2px 10px rgba(0,0,0,0.1);">
                <div style="background: #eee; height: 150px; border-radius: 5px; display: flex; align-items: center; justify-content: center;">
                    🖼️ Photo à venir
                </div>
                <h3 style="color: #2c3e50; margin-top: 10px;"><?php echo htmlspecialchars($donnees['titre']); ?></h3>
                <p style="color: #7f8c8d;">📍 <?php echo htmlspecialchars($donnees['ville']); ?></p>
                <p style="font-size: 1.2rem; font-weight: bold; color: #27ae60;">
                    <?php echo number_format($donnees['prix_par_nuit'], 0, ',', ' '); ?> FCFA <span style="font-size: 0.8rem; color: #7f8c8d;">/ nuit</span>
                </p>
                <a href="details.php?id=<?php echo $donnees['id']; ?>" style="display: block; text-align: center; background: #2980b9; color: white; padding: 8px; text-decoration: none; border-radius: 5px; margin-top: 10px;">
                    Voir les détails
                </a>
            </div>
            <?php
        }
        $reponse->closeCursor();
    } catch (Exception $e) {
        echo "Erreur d'affichage : " . $e->getMessage();
    }
    ?>
</div>
    </div>

</body>
</html>