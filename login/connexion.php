<?php
$server = "localhost";
$userdb = "root";
$userpwd = "";
$base = "garage";
$connexion=new mysqli($server,$userdb,$userpwd,$base);
if($connexion->connect_errno){
	die("Erreur de connexion : ".$connexion->connect_error);
} 

return $connexion;
?>