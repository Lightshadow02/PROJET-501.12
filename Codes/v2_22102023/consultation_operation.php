<?php

session_start();
if($_SESSION['interne'] != "yes"){
        header("Location: index.php");
        die();
}

if(isset($_GET['deco'])){
        unset($_SESSION['interne']);
        header("Location: index.php");
        die();
}


require('classes/Functions.php');

$operations = getOperations();

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
		<?php foreach($operations as $value) {
			$medecin = getPrivateById("personnels", $value['personnel'])[0];
			$patient = getPublicById("patients", $value['patient'])[0];
			$materiel = getPublicById("materiels", $value['materiel'])[0];
			$salle = getPublicById("salles", $value["salle"])[0];
			echo "<div>";
			echo "<p>Nom : ".$value['nom']."</p>";
			echo "<p>Medecin : ".$medecin['nom']." ".$medecin['prenom']."</p>";
			echo "<p>Patient : ".$patient['nom']." ".$patient['prenom']."</p>";
			echo "<p>Materiel : ".$materiel['nom']."</p>";
			echo "<p>Salle : ".$salle['nom']."</p>";
			echo "<p>Lieu : ".$value['lieu']."</p>";
			echo "<p>Date : ".$value['date']."</p>";
			echo "</div><hr>";
		} ?>
	</body>
</html>
