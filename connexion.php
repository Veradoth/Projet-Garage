<?php
try{
	$connexion = new PDO('mysql:host=localhost;dbname=garage;charset=utf8','root','');
}catch(PDOException $e){
	echo "erreur de la connexion a la base de donnee".$e->getMessage();
}
?>