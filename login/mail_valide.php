<?php

    $connexion = require __DIR__ . "/connexion_user.php";

    $sql = sprintf("SELECT * FROM administrateur WHERE mail = '%s'",
                    $connexion->real_escape_string($_GET["mail"]));

    $result = $connexion->query($sql);

    $is_available = $result->num_rows === 0;

    header("Content-Type: application/json");

    echo json_encode(["available" => $is_available]);
?>