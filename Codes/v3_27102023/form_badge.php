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

require('classes/Database_Privee.php');

if(!empty($_POST['numero']) && !empty($_POST['proprio'])) {

	extract($_POST);
	$req = "INSERT INTO badges (numero, proprietaire) VALUES ('$numero', '$proprio');";
	$sth = Mysql2::getInstance()->query($req);
	echo "<h1 style='color: green;'>Fait !</h1>";

}
require_once('classes/Functions.php');
$personnels = getAllPrivee('personnels');
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
				<label for="numero">Numero : </label>
				<input type="number" name="numero"/>
			</div><div>
				<label for="proprio">Propriétaire : </label>
				<select name="proprio">
					<?php foreach($personnels as $value){
						echo "<option value=".$value['id'].">".$value['nom']." ".$value['prenom']."</option>";
					} ?>
				</select>
			</div><div>
				<input type="submit"/>
			</div>
		</form>
	</body>
</html>
