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
require_once('classes/Functions.php');

$patients = getAllPublic('salles');

if(!empty($_POST['id_del'])) {
	extract($_POST);
	$req = "DELETE FROM salles WHERE id=$id_del;";
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
				<label for="id_del">Nom de la salle : </label>
				<select name="id_del">
					<?php foreach($patients as $value){
						echo "<option value=".$value['id'].">".$value['nom']."</option>";
					} ?>
				</select>
			</div><div>
				<input type="submit"/>
			</div>
		</form>
	</body>
</html>
