<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription - Hackaton</title>
    <link rel="stylesheet" href="inscription.css">
</head>
<body>

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
    if (isset($_POST['register'])) {
        echo "<p style='color:green; text-align:center; margin-top:10px;'>Formulaire bien reçu !</p>";
    }
    ?>

</body>