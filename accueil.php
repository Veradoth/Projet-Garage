<?php
    session_start();

    if (isset($_SESSION["user_id"])){
        $connexion = require __DIR__ . "/login/connexion.php";

        $sql = "SELECT * FROM administrateur WHERE id = {$_SESSION["user_id"]}";

        $result = $connexion->query($sql);

        $user = $result->fetch_assoc();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Accueil</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="accueil.css">
    </head>
    <body>

    <?php if (isset($user)): ?>
        <p>Vous êtes connectés <?= htmlspecialchars($user["nom"]) ?>.</p>
    <?php endif; ?>
        <!--En-tête en haut du site-->
        <header class="header-up">
            <h2 class="logo">Projet Garage</h2>
            <nav class="navigation">
                <a href="accueil.php">Accueil</a>
                <a href="a_propos.html">A propos</a>
                <a href="service.html">Service</a>
                <a href="contact.html">Contact</a>
                <?php if (isset($user)): ?>
                    <button onclick="window.location.href='login/deconnexion.php';" class="btnLogin-popup" name="valider">Se deconnecter</button>
                <?php else: ?>
                <button onclick="window.location.href='login/connecter.php';" class="btnLogin-popup" name="valider">Se connecter</button>
                <?php endif; ?>
            </nav>
        </header>
        <!--<header class="header-down">
            <nav class="navigation-down">
                <a href="mentions.html">Mentions légales</a>
                <a href="charte.html">Charte de confidentialité</a>
            </nav>
        </header>-->
        
        <!--Fenêtre Se connecter / Enregistrer-->
       
        </div>
        <div class="fenetre-options">
            <div class="fenetre-location">
                <h3>Location</h3>
                <a href="admin/louer.html">Louer</a>
            </div>
        </div>
        <script src="accueil.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>