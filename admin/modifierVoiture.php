<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Modifier la voiture</title>
    </head>
    <body>
        <h1>Modifier la voiture</h1>
        <p><a href='louer.html'>Retour</a></p>
        <form action = 'modifier.php' method ='POST'>
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
        Modifier immatriculation : <Input type="text" name="newImmatriculation"/>
        Modifier marque : <Input type="text" name="newMarque"/>
        Modifier modèle : <Input type="text" name="newModele"/>
        Modifier mise en circulation : <Input type="date" name="newMise-circulation"/>
        Modifier prix : <Input type="number" name="newPrix"/>
        Modifier mise en rentrée : <Input type="date" name="newRentree"/>
        Modifier chevaux : <Input type="number" name="newChevaux"/>
        Modifier description : <Input type="text" name="newDescription"/>
        <?php $connexion->close();?>
        <input type = 'submit' Value="Modifier la voiture"/>
        </form>
    </body>
</html>

