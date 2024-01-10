<?php

session_start();

if(empty($_SESSION['id_admin'])) {
	header("Location: ../admin-login.php");
	exit();
}

require_once("../../includes/db.inc.php");

if(isset($_GET)) {

	//Delete Company using id and redirect
	$sql = "DELETE FROM jobprovider WHERE id_jobprovider='$_GET[id]'";
	if($conn->query($sql)) {
		header("Location: ../admin-jobproviders.php");
		exit();
	} else {
		echo "Error";
	}
}