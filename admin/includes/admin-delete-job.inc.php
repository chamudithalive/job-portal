<?php

session_start();

if(empty($_SESSION['id_admin'])) {
	header("Location: ../admin-login.php");
	exit();
}

require_once("../../includes/db.inc.php");

if(isset($_GET)) {

	$sql = "DELETE FROM job WHERE id_job='$_GET[id]'";
	if($conn->query($sql)) {
		$sql1 = "DELETE FROM apply WHERE id_job='$_GET[id]'";
		if($conn->query($sql1)) {
		}
		header("Location: ../admin-jobs.php");
		exit();
	} else {
		echo "Error";
	}
}