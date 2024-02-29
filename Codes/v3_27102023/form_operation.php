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
$salles = getAllPublic("materiels");

if(!empty($_POST['nom_personnel']) && !empty($_POST['nom_patient']) && !empty($_POST['nom_materiel']) && !empty($_POST['nom_salle']) && !empty($_POST['nom_lieu']) && !empty($_POST['nom_operation']) && !empty($_POST['date'])) {
	extract($_POST);

	addOperation($nom_personnel, $nom_patient, $nom_materiel, $nom_salle, $nom_operation, $date, $nom_lieu);
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
				<label for="nom_personnel">Nom du médecin : </label>
				<select name="nom_personnel">
					<?php foreach($personnels as $value){
						echo "<option value=".$value['id'].">".$value['nom']." ".$value['prenom']."</option>";
					}?>
				</select>
			</div><div>
				<label for="nom_patient">Nom du patient : </label>
                                <select name="nom_patient">
                                        <?php foreach($patients as $value){
                                                echo "<option value=".$value['id'].">".$value['nom']." ".$value['prenom']."</option>";
                                        }?>
                                </select>
			</div><div>
				<label for="nom_operation">Nom de l'opération : </label>
                                <input type="text" name="nom_operation"/>
			</div><div>
				<label for="nom_materiel">Nom du matériel : </label>
				<select name="nom_materiel">
                                        <?php foreach($materiels as $value){
                                                echo "<option value=".$value['id'].">".$value['nom']."</option>";
                                        }?>
                                </select>
			</div><div>
                                <label for="nom_salle">Nom de la salle : </label>
                                <select name="nom_salle">
                                        <?php foreach($salles as $value){
                                                echo "<option value=".$value['id'].">".$value['nom']."</option>";
                                        }?>
                                </select>
			</div><div>
				<label for="nom_lieu">Lieu : </label>
				<input type="text" name="nom_lieu"/>
			</div><div>
				<label for="date">Date : </label>
				<input type="date" name="date"/>
			</div><div>
				<input type="submit"/>
			</div>
		</form>
	</body>
</html>
