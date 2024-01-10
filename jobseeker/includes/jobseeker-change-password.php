<?php

//To Handle Session Variables on This Page
session_start();

if(empty($_SESSION['id_jobseeker'])) {
	header("Location: ../jobseeker-index.php");
	exit();
}

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../../includes/db.inc.php");

//If user Actually clicked login button 
if(isset($_POST)) {

	//Escape Special Characters in String
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	//Encrypt Password
	$password = base64_encode(strrev(md5($password)));

	//Change password
	$sql = "UPDATE jobseeker SET password='$password' WHERE id_jobseeker='$_SESSION[id_jobseeker]'";
	if($conn->query($sql) === true) {
		header("Location: ../jobseeker-index.php");
		exit();
	} else {
		echo $conn->error;
	}

 	//Close database connection. Not compulsory but good practice.
 	$conn->close();

} else {
	//redirect them back to login page if they didn't click login button
	header("Location: ../jobseeker-settings.php");
	exit();
}