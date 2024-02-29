<?php

session_start();

if(!isset($_SESSION['interne']){
	header("Location: index.php");
	die();
}

if(isset($_GET['deco'])){
	unset($_SESSION['interne']);
        header("Location: index.php");
        die();
}

require('classes/Functions.php');

$personnels = getAllPrivee("personnels");

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css"/>
	</head>
	<body>
		<nav>
                        <a href="?deco">Deconnexion</a>
                </nav>
		<?php foreach($personnels as $value) {
			echo "<div>";
			echo "<p>Nom : ".$value['nom']."</p>";
			echo "<p>Prenom : ".$value['prenom']."</p>";
			echo "<p>Service : ".$value['service']."</p>";
			echo "</div><hr>";
		} ?>
	</body>
</html>
