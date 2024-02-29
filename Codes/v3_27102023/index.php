<?php

require_once("classes/Functions.php");

if(!empty($_POST['login']) && !empty($_POST['pass'])){
	list($nom, $prenom) = explode(".", $_POST['login']);
	if($_POST['type'] == "interne"){
		$pass = hash("sha256", $_POST['pass']);
		$result = loginPersonnel($nom, $prenom, $pass);
		if(!empty($result[0]['id'])){
			session_start();
			$_SESSION['interne'] = "yes";
			$_SESSION['id'] = $result[0]['id'];
			$_SESSION['role'] = $result[0]['role'];
			header("Location: interne.php");
			die();
		}
	}
	if($_POST['type'] == "externe"){
		$pass = hash("sha256", $_POST['pass']);
                $result = loginPatient($nom, $prenom, $pass);
                if(!empty($result[0]['id'])){
                        session_start();
			$_SESSION['id'] = $result[0]['id'];
                        $_SESSION['interne'] = "no";
                        header("Location: externe.php");
                        die();
                }
        }
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
		<div>
			<h2>Authentification Interne</h2>
        		<form action="#" method="post">
				<div>
					<label for="login">nom.prenom</label>
					<input type="text" name="login"/>
				</div><div>
					<label for="pass">Mot de passe</label>
					<input type="password" name="pass"/>
				</div><div>
					<input type="hidden" name="type" value="interne"/>
					<input type="submit" value="Connexion"/>
				</div>
			</form>
		</div><div>
                        <h2>Authentification Externe</h2>
                        <form action="#" method="post">
                                <div>
                                        <label for="login">nom.prenom</label>
                                        <input type="text" name="login"/>
                                </div><div>
                                        <label for="pass">Mot de passe</label>
                                        <input type="password" name="pass"/>
                                </div><div>
                                        <input type="hidden" name="type" value="externe"/>
                                        <input type="submit" value="Connexion"/>
                                </div>
                        </form>
                </div>
	</body>
	<footer>
		©DataSafe Systems 2023
	</footer>
</html>
