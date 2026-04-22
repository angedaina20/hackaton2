<?php
// 1. On démarre la session pour savoir qui est l'utilisateur connecté
session_start();

// 2. On inclut ta connexion à la base de données
include('connexion.php');

// 3. On vérifie si l'utilisateur est bien connecté
if (!isset($_SESSION['utilisateur_id'])) {
    die("Erreur : Vous devez être connecté pour réserver.");
}

// 4. On récupère les données envoyées par le formulaire de details.php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_logement = $_POST['id_logement'];
    $id_utilisateur = $_SESSION['utilisateur_id']; // L'ID stocké lors du login
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];

    // 5. On prépare la requête SQL pour enregistrer la réservation
    $sql = "INSERT INTO reservations (id_utilisateur, id_logement, date_debut, date_fin, statut) 
            VALUES (:user, :logement, :debut, :fin, 'en attente')";
    
    $req = $pdo->prepare($sql);
    
    // 6. On exécute la requête
    $resultat = $req->execute([
        'user' => $id_utilisateur,
        'logement' => $id_logement,
        'debut' => $date_debut,
        'fin' => $date_fin
    ]);

    if ($resultat) {
        echo "Réservation réussie ! Votre demande est en attente.";
        // Optionnel : rediriger vers une page de confirmation après 2 secondes
        header("refresh:2;url=index.php");
    } else {
        echo "Une erreur est survenue lors de la réservation.";
    }
}
?>