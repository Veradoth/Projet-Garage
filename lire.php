<!doctype html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <title>Liste des véhicules</title>
    <link rel="stylesheet" href="lire.css">
    </head>
    <body>
        <h1>Liste des véhicules</h1>
        <p><a href='louer.html'>Retour</a></p>
        <?php
            include "connexion.php";
            $sql = 'SELECT * FROM voiture';
            echo '<table border="1">';
            $listeVoiture = $connexion->query($sql);
            echo '<tr><th>NUMERO</th><th>IMMATRICULATION</th><th>MARQUE</th><th>MODELE</th><th>MISE EN CIRCULATION</th><th>PRIX</th><th>DATE DE RENTREE</th><th>CHEVAUX</th><th>DESCRIPTION</th></tr>';
            while ($voiture = $listeVoiture->fetch_assoc()) {
	            echo '<tr>';
                echo '<td>'.$voiture['id'].'</td><td>'.$voiture['immatriculation'].'</td><td>'.$voiture['marque'].'</td><td>'.$voiture['modele'].'</td><td>'.$voiture['mise_circulation'].'</td><td>'.$voiture['prix'].'</td><td>'.$voiture['date_rentree'].'</td><td>'.$voiture['chevaux'].'</td><td>'.$voiture['descrip'].'</td>';
                echo '</tr>';
            }
            echo '</table>';
            $connexion->close();
        ?>
    </body>
</html>