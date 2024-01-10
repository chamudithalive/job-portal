<?php
session_start();

if(empty($_SESSION['id_jobprovider'])) {
  header("Location: ../jobprovider-index.php");
  exit();
}

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../../includes/db.inc.php");

if(isset($_POST)) {
	$sql = "UPDATE jobprovider SET active='3' WHERE id_jobprovider='$_SESSION[id_jobprovider]'";

	if($conn->query($sql) == TRUE) {
		header("Location: ../../includes/logout.inc.php");
		exit();
	}
	else {
		echo $conn->error;
	}
}
else {
	header("Location: jobprovider-settings.php");
	exit();
}