<?php
    if(empty($_POST["nom"])){
        die("Le nom est requis");
    }

    if(! filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)){
        die("Mail valide requis");
    }

    if(strlen($_POST["mdp"]) < 8){
        die("Mot de passe doit contenir au moins 8 caractères !");
    }

    if(! preg_match("/[a-z]/i", $_POST["mdp"])){
        die("Le mot de passe doit contenir au moins 1 lettre");
    }

    if(! preg_match("/[0-9]/i", $_POST["mdp"])){
        die("Le mot de passe doit contenir au moins 1 chiffre !");
    }

    if($_POST["mdp"] !== $_POST["mdp_confirm"]){
        die("Les mots de passe ne sont pas identiques !");
    }

    $password_hash = password_hash($_POST["mdp"], PASSWORD_DEFAULT);

    $connexion = require __DIR__. "/connexion_user.php";

    $sql = "INSERT INTO administrateur (nom, mail, mdp_hash) VALUES (?, ?, ?)";

    $stmt = $connexion->stmt_init();

    if( ! $stmt->prepare($sql)){
        die("SQL error: ". $connexion->error);
    }

    $stmt->bind_param("sss",
                        $_POST["nom"],
                        $_POST["mail"],
                        $password_hash);

    if($stmt->execute()){

    header("Location: reussie.php");
    exit;
    }
    else{
        if($connexion->errno === 1062){
            die("Mail déjà pris");
        }
        else{
            die($connexion->error . " " . $connexion->errno);
        }
    }

?>