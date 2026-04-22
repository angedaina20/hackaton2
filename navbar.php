

<nav style="background-color: #2c3e50; padding: 15px; display: flex; justify-content: space-around; align-items: center; color: white;">
    <div class="logo">
        <a href="index.php" style="color: white; font-weight: bold; text-decoration: none; font-size: 1.2rem;">HACKATON LOGEMENT</a>
    </div>

    <div class="liens">
        <a href="index.php" style="color: white; margin: 0 10px; text-decoration: none;">Accueil</a>
        
        <?php if(isset($_SESSION['user_nom'])): ?>
            <span style="color: #27ae60; margin-left: 15px;">👤 <?php echo htmlspecialchars($_SESSION['user_nom']); ?></span>
            <a href="ajouter_logement.php" style="color: white; margin: 0 10px; text-decoration: none;">Ajouter</a>
            <a href="deconnexion.php" style="color: #e74c3c; margin: 0 10px; text-decoration: none; font-weight: bold;">Déconnexion</a>
        <?php else: ?>
            <a href="connexion.php" style="color: white; margin: 0 10px; text-decoration: none;">Connexion</a>
            <a href="inscription.php" style="color: white; margin: 0 10px; text-decoration: none; background: #2980b9; padding: 5px 10px; border-radius: 3px;">S'inscrire</a>
        <?php endif; ?>
    </div>
</nav>