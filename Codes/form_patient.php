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

if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['age']) && !empty($_POST['adresse']) && !empty($_POST['pass1']) && !empty($_POST['pass2'])) {

	if($_POST['pass1'] == $_POST['pass2']){
		extract($_POST);
		$req = "INSERT INTO patients (nom, prenom, age, adresse, password) VALUES ('$nom', '$prenom', $age, '$adresse', '$pass1');";
		$sth = Mysql::getInstance()->query($req);
		echo "<h1 style='color: green;'>Fait !</h1>";
	}
	else {
		echo "<h1 style='color: red;'>Les mots de passes divergent !</h1>";
	}
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
				<label for="prenom">Prenom : </label>
				<input type="text" name="prenom"/>
			</div><div>
				<label for="age">Age : </label>
				<input type="number" name="age"/>
			</div><div>
				<label for="adresse">Adresse : </label>
				<input type="text" name="adresse"/>
			</div><div>
				<label for="pass1">Mot-de-passe : </label>
				<input type="password" name="pass1"/>
			</div><div>
				<label for="pass2">Confirmation : </label>
				<input type="password" name="pass2"/>
			</div><div>
				<input type="submit"/>
			</div>
		</form>
	</body>
</html>
