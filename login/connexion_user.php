<?php
$server = "localhost"; // Adresse du serveur MySQL
$userdb = "root"; // Nom d'utilisateur de la base de données
$userpwd = ""; // Mot de passe de la base de données
$base = "garage"; // Nom de la base de données

$connexion=new mysqli($server,$userdb,$userpwd,$base); // Établir une connexion à la base de données MySQL

if($connexion->connect_errno){ // Vérifier s'il y a une erreur de connexion
    die("Erreur de connexion : ".$connexion->connect_error); // Afficher un message d'erreur et arrêter l'exécution du script
} 

return $connexion; // Retourner l'objet de connexion à la base de données
?>
