<?php 
session_start();
// 1. Connexion à la base
$db = new PDO('mysql:host=localhost;dbname=hackaton;charset=utf8', 'root', '');

// 2. On récupère l'ID envoyé dans l'URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // 3. On cherche les infos de CE logement précis
    // 3. On cherche les infos de CE logement avec LEFT JOIN
       // 3. On cherche les infos de CE logement avec LEFT JOIN
        $req = $db->prepare('
            SELECT logements.*, utilisateurs.nom 
            FROM logements 
            LEFT JOIN utilisateurs ON logements.id_fournisseur = utilisateurs.id 
            WHERE logements.id = ?
        ');
        
        $req->execute([$id]);
        $logement = $req->fetch();

    if(!$logement) {
        die("Ce logement n'existe pas.");
    }
} else {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $logement['titre']; ?></title>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div style="max-width: 800px; margin: 20px auto; padding: 20px; font-family: sans-serif;">
        <a href="index.php" style="text-decoration: none; color: #2980b9;">← Retour aux offres</a>
        
        <h1 style="margin-top: 20px;"><?php echo $logement['titre']; ?></h1>
        <p style="font-size: 1.2rem; color: #27ae60; font-weight: bold;">
            <?php echo $logement['<p style="font-size: 1.2rem; color: #27ae60; font-weight: bold;">
    <?php echo number_format($logement['prix_par_nuit'], 0, ',', ' '); ?> FCFA / nuit
</p>']; ?> FCFA / nuit
        </p>
        <p>📍 <strong>Lieu :</strong> <?php echo $logement['ville']; ?></p>
        
        <div style="background: #f9f9f9; padding: 20px; border-radius: 10px; margin-top: 20px;">
            <p>👤 <strong>Propriétaire :</strong> <?php echo htmlspecialchars($logement['nom']); ?></p>

            <h3>Description</h3>
            <p><?php echo nl2br($logement['description']); ?></p>
        </div>

        <div style="margin-top: 30px;">
            <button style="padding: 15px 30px; background: #27ae60; color: white; border: none; border-radius: 5px; font-size: 1.1rem; cursor: pointer;">
                Réserver ce logement
            </button>
        </div>
    </div>
</body>
</html>