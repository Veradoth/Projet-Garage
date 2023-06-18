<?php
    session_start(); // Démarre la session

    if (isset($_SESSION["user_id"])){ // Vérifie si l'ID de l'utilisateur est défini dans la session
        $connexion = require __DIR__ . "/login/connexion_user.php"; // Inclut et assigne la connexion à la base de données

        $sql = "SELECT * FROM administrateur WHERE id = {$_SESSION["user_id"]}"; // Requête SQL pour récupérer un administrateur par son ID

        $result = $connexion->query($sql); // Exécute la requête SQL 

        $user = $result->fetch_assoc(); // Récupère les données de l'administrateur sous forme de tableau associatif
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Accueil</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="accueil.css"> <!-- Inclut une feuille de style externe -->
    </head>
    <body>

    <?php if (isset($user)): ?> <!-- Vérifie si l'utilisateur est connecté -->
        <p>Vous êtes connecté <?= htmlspecialchars($user["nom"]) ?>.</p> <!-- Affiche le nom de l'utilisateur connecté -->
    <?php endif; ?>
    <?php if(session_status() === PHP_SESSION_NONE): ?>
        <p>Vous avez été déconnecté.</p>
    <?php endif; ?>

        <header class="header-up"> <!-- En-tête en haut du site -->
            <h2 class="logo">Projet Garage</h2>
            <nav class="navigation">
                <a href="accueil.php">Accueil</a>
                <a href="#">A propos</a>
                <a href="#">Service</a>
                <a href="#">Contact</a>
                <a href="admin/admin.php">Administration</a>
                <?php if (isset($user)): ?> <!-- Vérifie si l'utilisateur est connecté -->
                    <button onclick="window.location.href='login/deconnexion.php';" class="btnLogin-popup" name="valider">Se deconnecter</button> <!-- Affiche le bouton de déconnexion -->
                <?php else: ?>
                    <button onclick="window.location.href='login/connecter.php';" class="btnLogin-popup" name="valider">Se connecter</button> <!-- Affiche le bouton de connexion -->
                <?php endif; ?>
            </nav>
        </header>

        <div class="fenetre-options">
            <div class="fenetre-location">
            <button onclick="window.location.href='location/location.php';" class="bouton">Location</button> <!-- Affiche le lien de location -->
            </div>
        </div>
        <script src="accueil.js"></script> <!-- Inclut un fichier JavaScript externe -->
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script> <!-- Inclut un script externe -->
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> <!-- Inclut un script externe -->
    </body>
</html>
