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

$badges = getAllPrivee("badges");

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
		<?php foreach($badges as $value) {
			echo "<div>";
			echo "<p>Numero : ".$value['numero']."</p>";
			echo "<p>Propriétaire : ".$value['proprietaire']."</p>";
			echo "</div><hr>";
		} ?>
	</body>
</html>
