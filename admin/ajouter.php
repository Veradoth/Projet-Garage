<!doctype html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Ajouter un véhicule</title>
</head>
<body><h1>Ajouter un.e étudiant.e</h1>
<p><a href='louer.html'>Retour</a></p>
<?php
include "connexion.php";

$immatriculation = $_POST['immatriculation'];
$marque = $_POST['marque'];
$modele = $_POST['modele'];
$mise_circulation = $_POST['mise_circulation'];
$prix = $_POST['prix'];
$rentree = $_POST['rentree'];
$chevaux = $_POST['chevaux'];
$descrip = $_POST['description'];

$sql = "INSERT INTO voiture(immatriculation, marque, modele, mise_circulation, prix, date_rentree, chevaux, descrip) VALUES ('$immatriculation', '$marque', '$modele', '$mise_circulation', '$prix', '$rentree', '$chevaux', '$descrip');";
$connexion->query($sql); 
if(!$connexion->error){echo 'la voiture a bien été enregistré <br>';}
mysqli_close($connexion) ;
?>
