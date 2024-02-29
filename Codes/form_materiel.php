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


require('classes/Database_Public.php');

if(!empty($_POST['nom']) && !empty($_POST['lieu'])) {

	extract($_POST);
	$req = "INSERT INTO materiels (nom, lieu, libre) VALUES ('$nom', '$lieu', 1);";
	$sth = Mysql::getInstance()->query($req);
	echo "<h1 style='color: green;'>Fait !</h1>";

}
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
		<form action="#" method="post">
			<div>
				<label for="nom">Nom : </label>
				<input type="text" name="nom"/>
			</div><div>
				<label for="lieu">Lieu : </label>
				<input type="text" name="lieu"/>
			</div><div>
				<input type="submit"/>
			</div>
		</form>
	</body>
</html>
