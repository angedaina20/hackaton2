
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription - Hackaton</title>
    <link rel="stylesheet" href="inscription.css">
</head>
<body>
<?php include 'navbar.php';?>
    <div class="ins">
        <h2>Créer un compte</h2>
        <form action="inscription.php" method="POST">
            <input type="text" name="nom" placeholder="Nom complet" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit" name="register">S'inscrire</button>
        </form>
    </div>
<?php
include 'config.php'; // On appelle la connexion

if (isset($_POST['register'])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Sécurité !

    try {
        // On prépare l'insertion dans ta table 'utilisateurs'
        $sql = "INSERT INTO utilisateurs (nom, email, mot_de_passe ) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nom, $email, $password]);

        echo "<p style='color:green; text-align:center;'>Inscription réussie sur la base !</p>";
    } catch (PDOException $e) {
        echo "<p style='color:red;'>Erreur : " . $e->getMessage() . "</p>";
    }
}
?>
</body>