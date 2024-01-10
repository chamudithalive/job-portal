<?php
//To Handle Session Variables on This Page
session_start();

if(empty($_SESSION['id_jobprovider'])) {
  header("Location: ../jobprovider-index.php");
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

	//sql query to check user login
	$sql = "UPDATE jobprovider SET password='$password' WHERE id_jobprovider='$_SESSION[id_jobprovider]'";

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