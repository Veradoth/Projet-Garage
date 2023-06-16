
<!doctype html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <title>Modifier un véhicule</title>
    </head>
    <body>
        <h1>Modifier un véhicule</h1>
        <p><a href='louer.html'>Retour</a></p>
        <?php
        include "connexion.php";
        $num = $_POST['numVoiture'];

        $sql = "DELETE FROM voiture WHERE id = $num;";
        $connexion->query($sql); 
        if(!$connexion->error){echo 'le véhicule a bien été supprimé <br>';}
        mysqli_close($connexion) ;
        ?>
        
    </body>
</html>
