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
require_once('classes/Functions.php');

$patients = getAllPrivee('operations');

if(!empty($_POST['id_del'])) {
	extract($_POST);
	$req = "DELETE FROM operations WHERE id=$id_del;";
	$sth = Mysql2::getInstance()->query($req);
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
				<label for="id_del">Nom de l'opération : </label>
				<select name="id_del">
					<?php foreach($patients as $value){
						$personnel = getPrivateById('personnels', $value['personnel']);
						echo "<option value=".$value['id'].">".$value['nom']." - ".$personnel[0]['nom']."</option>";
					} ?>
				</select>
			</div><div>
				<input type="submit"/>
			</div>
		</form>
	</body>
</html>
