<!doctype html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Supprimer un véhicule</title>
</head>
<body><h1>Supprimer un véhicule</h1>
<p><a href='louer.html'>Retour</a></p>
<form action = 'supprimer.php' method ='POST'>
Voiture : <select name='numVoiture'>
<?php
include "connexion.php";
$sql = 'SELECT * FROM voiture';
$listeVoiture = $connexion->query($sql);
while ($voiture = $listeVoiture->fetch_assoc()) {
	echo "<option value='".$voiture['id']."'>".$voiture['immatriculation']." ".$voiture['marque']." ".$voiture['modele']." ".$voiture['mise_crirculation']." ".$voiture['prix']." ".$voiture['date_rentree']." ".$voiture['chevaux']." ".$voiture['descrip'];
    echo '</option>';
}
?>
</select><br>
<?php $connexion->close();?>
<input type = 'submit' Value="Supprimer cette voiture"/>
</form>
</body></html>

