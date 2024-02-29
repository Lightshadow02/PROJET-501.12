<?php

function loginPersonnel($nom, $prenom, $pass) {
	require_once("Database_Privee.php");

	$req = "SELECT id, role FROM personnels WHERE nom='$nom' AND prenom='$prenom' AND password='$pass';";
	$sth = Mysql2::getInstance()->query($req);
	$res = $sth->fetchAll();

	return $res;
}

function loginPatient($nom, $prenom, $pass) {
	require_once("Database_Public.php");

	$req = "SELECT id FROM patients WHERE nom='$nom' AND prenom='$prenom' AND password='$pass';";
	$sth = Mysql::getInstance()->query($req);
	$res = $sth->fetchAll();

	return $res;
}

function addOperation($personnel, $patient, $materiel, $salle, $nom, $date, $lieu) {
	require_once("Database_Privee.php");

	$req = "INSERT INTO operations (nom, lieu, materiel, salle, personnel, patient,	date) VALUES ('$nom', '$lieu', $materiel, $salle, $personnel, $patient, '$date');";
	$sth = Mysql2::getInstance()->query($req);
	$res = $sth->fetchAll();

	return $res;
}

function getMyOperations($id) {
	require_once("Database_Privee.php");

	$req = "SELECT * FROM operations WHERE id=$id;";
	$sth = Mysql2::getInstance()->query($req);
	$res = $sth->fetchAll();

	return $res;
}

function getOperations() {
	require_once("Database_Privee.php");

	$req = "SELECT * FROM operations;";
	$sth = Mysql2::getInstance()->query($req);
        $res = $sth->fetchAll();

	return $res;
}

function getAllPublic($table) {
        require_once("Database_Public.php");

	$req = "SELECT * FROM $table;";
        $sth = Mysql::getInstance()->query($req);
        $res = $sth->fetchAll();

        return $res;
}

function getAllPrivee($table) {
	require_once("Database_Privee.php");

        $req = "SELECT * FROM $table;";
        $sth = Mysql2::getInstance()->query($req);
        $res = $sth->fetchAll();

        return $res;
}

function getPublicById($table, $id) {
	require_once("Database_Public.php");

	$req = "SELECT * FROM $table WHERE id = '$id';";
	$sth = Mysql::getInstance()->query($req);
	$res = $sth->fetchAll();

	return $res;
}

function getPrivateById($table, $id) {
	require_once("Database_Privee.php");

	$req = "SELECT * FROM $table WHERE id = '$id';";
	$sth = Mysql2::getInstance()->query($req);
	$res = $sth->fetchAll();

	return $res;
}

function getPersonnelId($nom, $prenom) {
	require_once("Database_Privee.php");

        $req = "SELECT id FROM personnels WHERE nom='$nom' AND prenom='$prenom';";
        $sth = Mysql2::getInstance()->query($req);
        $res = $sth->fetchAll();

        return $res;
}

function getPatientId($nom, $prenom) {
        require_once("Database_Public.php");

        $req = "SELECT id FROM patients WHERE nom='$nom' prenom='$prenom';";
        $sth = Mysql::getInstance()->query($req);
        $res = $sth->fetchAll();

        return $res;
}

function getBadgeId($numero) {
	require_once("Database_Privee.php");

	$req = "SELECT id FROM badges WHERE numero='$numero';";
        $sth = Mysql2::getInstance()->query($req);
        $res = $sth->fetchAll();

        return $res;
}

function getMaterielId($nom) {
	require_once("Database_Public.php");

        $req = "SELECT id FROM materiels WHERE nom='$nom';";
        $sth = Mysql::getInstance()->query($req);
        $res = $sth->fetchAll();

        return $res;
}

function getSalleId($nom) {
        require_once("Database_Public.php");

        $req = "SELECT id FROM salles WHERE nom='$nom';";
        $sth = Mysql::getInstance()->query($req);
        $res = $sth->fetchAll();

        return $res;
}

?>
