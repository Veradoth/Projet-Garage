<?php

    $connexion = require __DIR__ . "/connexion_user.php"; // Inclut et assigne la connexion à la base de données

    $sql = sprintf("SELECT * FROM administrateur WHERE mail = '%s'", // Requête SQL pour sélectionner les administrateurs avec le mail spécifié
                    $connexion->real_escape_string($_GET["mail"])); // Échappe et récupère la valeur du paramètre GET "mail"

    $result = $connexion->query($sql); // Exécute la requête SQL

    $is_available = $result->num_rows === 0; // Vérifie si aucun résultat n'a été retourné (adresse mail non utilisée)

    header("Content-Type: application/json"); // Spécifie le type de contenu de la réponse comme JSON

    echo json_encode(["available" => $is_available]); // Convertit le résultat en JSON et l'affiche
?>
