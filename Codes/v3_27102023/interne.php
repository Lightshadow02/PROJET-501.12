<?php

session_start();
if($_SESSION['interne'] != "yes"){
	header("Location: externe.php");
        die();
}

?>

<!DOCTYPE html>

<html lang="fr">

    <head>
        <meta charset="utf-8">
        <title>Page d'Accueil</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div id="nom_entreprise" href="index.html">DataSafe Systems</div>
        <ul>
	<?php if($_SESSION['role'] == "admin_IT" || $_SESSION['role'] == "boss"){ ?>
	        <li><a href="form_patient.php">Ajout Patient</a></li>
		<li><a href="del_patient.php">Suppression Patient</a></li>
                <li><a href="form_personnel.php">Ajout Personnel</a></li>
		<li><a href="del_personnel.php">Suppression Personnel</a></li>
                <li><a href="form_materiel.php">Ajout Matériel</a></li>
		<li><a href="del_materiel.php">Suppression Salle</a></li>
		<li><a href="form_salle.php">Ajout Salle</a></li>
		<li><a href="del_salle.php">Suppression Salle</a></li>
		<li><a href="form_badge.php">Ajout Badge</a></li>
           	<li><a href="del_badge.php">Suppression Badge</a></li> 
	   <?php }if($_SESSION['role'] == "chirurgien" || $_SESSION['role'] == "boss"){ ?>
		<li><a href="form_operation.php">Ajout Opération</a></li>
		<li><a href="del_operation.php">Suppression Opération</a></li>
	   <?php } ?>
	    </ul><ul>
		<li><a href="consultation_patient.php">Consultation Patient</a></li>
		<li><a href="consultation_personnel.php">Consultation Personnel</a></li>
		<li><a href="consultation_materiel.php">Consultation Matériel</a></li>
		<li><a href="consultation_salle.php">Consultation Salle</a></li>
		<li><a href="consultation_badge.php">Consultation Badge</a></li>
	    </ul>
    </body>
    <footer>
	©DataSafe Systems 2023
    </footer>
</html>
