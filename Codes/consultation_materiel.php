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

$materiels = getAllPublic("materiels");

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
		<?php foreach($materiels as $value) {
			if($value['libre'] == 1){$value['libre']="Oui";}else{$value['libre']="Non";}
			echo "<div>";
			echo "<p>Nom : ".$value['nom']."</p>";
			echo "<p>Lieu : ".$value['lieu']."</p>";
			echo "<p>Dispo : ".$value['libre']."</p>";
			echo "</div><hr>";
		} ?>
	</body>
</html>
