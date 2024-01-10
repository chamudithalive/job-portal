<?php

//To Handle Session Variables on This Page
session_start();

if(empty($_SESSION['id_jobseeker'])) {
	header("Location: ../jobseeker-index.php");
	exit();
}

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../../includes/db.inc.php");

if(isset($_POST)) {
	//Deactivate account
	$sql = "UPDATE jobseeker SET active='2' WHERE id_jobseeker='$_SESSION[id_jobseeker]'";

	if($conn->query($sql) == TRUE) {
		header("Location: ../../includes/logout.inc.php");
		exit();
	} else {
		echo $conn->error;
	}
} else {
	header("Location: jobseeker-settings.php");
	exit();
}