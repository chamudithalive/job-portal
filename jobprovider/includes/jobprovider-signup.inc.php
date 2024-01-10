<?php
session_start();

//If user clicked register button
if(isset($_POST)) {
	//Escape Special Characters In String First
	$companyname = $_POST['companyname'];
	$contactno = $_POST['contactno'];
	$website = $_POST['website'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$address = $_POST['address'];
	$aboutme = $_POST['aboutme'];
	$name = $_POST['name'];

	include "../../dbh.classes.php";
	include "../classes/jobprovider-signup.classes.php";
	include "../classes/jobprovider-signup-contr.classes.php";

	$signup = new JobProviderSignupContr($name, $companyname, $address, $contactno, $website, $email, $password, $aboutme);

	$signup->signupUser();

	header("Location: ../jobprovider-index.php?error=none");
}
else {
	//redirect them back to register page if they didn't click register button
	header("Location: ../jobprovider-signup.php");
	exit();
}