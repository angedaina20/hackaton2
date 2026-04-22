<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - Hackaton</title>
</head>
<body>
    <?php include 'navbar.php';?>
    <h2>Se connecter</h2>
    <form action="login_backend.php" method="POST">
        <input type="email" name="email" placeholder="Votre Email" required><br><br>
        <input type="password" name="password" placeholder="Mot de passe" required><br><br>
        <button type="submit" name="login">Se connecter</button>
    </form>
</body>
</html>