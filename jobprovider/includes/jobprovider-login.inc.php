<?php
session_start();

//If user Actually clicked login button 
if(isset($_POST)) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	include "../../dbh.classes.php";
	include "../classes/jobprovider-login.classes.php";
	include "../classes/jobprovider-login-contr.classes.php";

	$login = new JobProviderLoginContr($email, $password);

	$login->loginUser();
}
else {
	//redirect them back to login page if they didn't click login button
	header("Location: ../jobprovider-login.php");
	exit();
}