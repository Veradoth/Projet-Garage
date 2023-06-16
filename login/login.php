<?php
if(isset($_POST['mail']) && isset($_POST['mdp'])){

    $mail = $_POST['mail'];
    $password = $_POST['mdp'];

    include "../connexion.php";
    $req = mysqli_query($connexion , "SELECT * FROM administrateur WHERE mail='$mail' AND mdp = '$password'");
    $num_ligne = mysqli_num_rows($req);
    if($num_ligne > 0){
        header("Location:../accueil.php");
    }
    else{
        header("Location:connecter.php");
    }


}

?>