<?php

    $is_invalid = false;
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $connexion = require __DIR__ . "/connexion.php";

        $sql = sprintf("SELECT * FROM administrateur WHERE mail = '%s'",
        $connexion->real_escape_string($_POST["mail"]));

        $result = $connexion->query($sql);

        $user = $result->fetch_assoc();

        if($user){
            if (password_verify($_POST["mdp"], $user["mdp_hash"])){
                
                session_start();

                session_regenerate_id();

                $_SESSION["user_id"] = $user["id"];

                header("Location: ../accueil.php");
                exit;
            }
        }
        $is_invalid = true;
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Connexion</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    </head>
    <body>
        <section>
            <h1>Connexion</h1>
            <?php if($is_invalid): ?>
                <em>Connexion invalide</em>
            <?php endif; ?>
            <form method="POST">
                <label>Adresse Mail</label>
                <input type="text" name="mail" value="<?= htmlspecialchars($_POST["mail"] ?? "")?>">
                <label>Mot de passe</label>
                <input type="password" name="mdp" >
                <label>Vous n'avez pas de compte ?</label>
                <a href="inscrire.php">S'inscrire</a>
                <br>
                <button type="submit" name="valider"> Se connecter</button>
            </form>
            <button onclick="window.location.href='../accueil.php';" class="btnLogin-popup">Retour</button>
        </section>
    </body>
</html>