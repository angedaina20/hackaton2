<?php
session_start();
// Connexion à la base de données
$host = 'localhost';
$dbname = 'hackaton';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}

// On vérifie si le formulaire a été envoyé
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $ville = $_POST['ville'];
    $id_fournisseur = $_SESSION['user_id']; // L'ID de celui qui est connecté

    // Requête pour insérer dans ta nouvelle table
    $sql = "INSERT INTO logements (titre, description, prix_par_nuit, ville, id_fournisseur) 
            VALUES (?, ?, ?, ?, ?)";
    
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$titre, $description, $prix, $ville, $id_fournisseur])) {
        // Si ça marche, on retourne à l'accueil
        header("Location: index.php?success=1");
    } else {
        echo "Erreur lors de la publication.";
    }
}
?>