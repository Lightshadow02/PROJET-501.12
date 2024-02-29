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

$patients = getAllPublic("patients");

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
		<?php foreach($patients as $value) {
			echo "<div>";
			echo "<p>Nom : ".$value['nom']."</p>";
			echo "<p>Prenom : ".$value['prenom']."</p>";
			echo "<p>Adresse : ".$value['adresse']."</p>";
			echo "<p>Age : ".$value['age']."</p>";
			echo "</div><hr>";
		} ?>
	</body>
</html>
