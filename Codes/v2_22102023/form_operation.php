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


require_once('classes/Functions.php');

$personnels = getAllPrivee("personnels");
$patients = getAllPublic("patients");
$materiels = getAllPublic("materiels");
$salles = getAllPublic("salles");

extract($_POST);
if(!empty($personnel) && !empty($patient) && !empty($materiel) && !empty($salle) && !empty($nom_operation) && !empty($date)) {

	addOperation($personnel, $patient, $materiel, $salle, $nom_operation, $date);
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
                        <a href="interne.php">Menu</a>
                </nav>
		<form action="#" method="post">
			<div>
				<label for="personnel">Nom du médecin : </label>
				<select name="personnel">
					<?php foreach($personnels as $value){
						echo "<option value=".$value['id'].">".$value['nom']." ".$value['prenom']."</option>";
					}?>
				</select>
			</div><div>
				<label for="patient">Nom du patient : </label>
                                <select name="patient">
                                        <?php foreach($patients as $value){
                                                echo "<option value=".$value['id'].">".$value['nom']." ".$value['prenom']."</option>";
                                        }?>
                                </select>
			</div><div>
				<label for="nom_operation">Nom de l'opération : </label>
                                <input type="text" name="nom_operation"/>
			</div><div>
				<label for="materiel">Nom du matériel : </label>
				<select name="materiel">
                                        <?php foreach($materiels as $value){
                                                echo "<option value=".$value['id'].">".$value['nom']."</option>";
                                        }?>
                                </select>
			</div><div>
                                <label for="salle">Nom de la salle : </label>
                                <select name="salle">
                                        <?php foreach($salles as $value){
                                                echo "<option value=".$value['id'].">".$value['nom']."</option>";
                                        }?>
                                </select>
			</div><div>
				<label for="date">Date : </label>
				<input type="date" name="date"/>
			</div><div>
				<input type="submit"/>
			</div>
		</form>
	</body>
</html>
