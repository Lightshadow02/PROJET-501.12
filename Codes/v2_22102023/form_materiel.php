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

if(!empty($_POST['nom']) && !empty($_POST['lieu'])) {

	extract($_POST);
	addMateriel($nom, $lieu);
	echo "<h1 style='color: green;'>Fait !</h1>";

}

$lieux = getLieux();
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
                        <a href="/index.php">Menu</a>
                </nav>
		<form action="#" method="post">
			<div>
				<label for="nom">Nom : </label>
				<input type="text" name="nom"/>
			</div><div>
				<label for="lieu">Lieu : </label>
				<select name="lieu">
					<?php foreach ($lieux as $value) { ?>
						<option value=<?php echo $value['id'];?>><?php echo $value['nom'];?></option>
					<?php } ?>
				</select>
			</div><div>
				<input type="submit"/>
			</div>
		</form>
	</body>
</html>
