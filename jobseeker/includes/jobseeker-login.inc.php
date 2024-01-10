<?php

//To Handle Session Variables on This Page
session_start();

//If user Actually clicked login button 
if(isset($_POST)) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	include "../../dbh.classes.php";
	include "../classes/jobseeker-login.classes.php";
	include "../classes/jobseeker-login-contr.classes.php";

	$login = new JobSeekerLoginContr($email, $password);

	$login->loginUser();

}
else {
	//redirect them back to login page if they didn't click login button
	header("Location: ../jobseeker-login.php");
	exit();
}