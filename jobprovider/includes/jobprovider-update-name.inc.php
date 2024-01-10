<?php
session_start();

if(empty($_SESSION['id_jobprovider'])) {
  header("Location: ../jobprovider-index.php");
  exit();
}

require_once("../../includes/db.inc.php");

//If user Actually clicked login button 
if(isset($_POST)) {
	//Escape Special Characters in String
	$name = mysqli_real_escape_string($conn, $_POST['name']);

	//sql query to check user login
	$sql = "UPDATE jobprovider SET name='$name' WHERE id_jobprovider='$_SESSION[id_jobprovider]'";

	if($conn->query($sql) === true) {
		header("Location: ../jobprovider-index.php");
		exit();
	}
	else {
		echo $conn->error;
	}

 	//Close database connection. Not compulsory but good practice.
 	$conn->close();
}
else {
	//redirect them back to login page if they didn't click login button
	header("Location: ../jobprovider-settings.php");
	exit();
}