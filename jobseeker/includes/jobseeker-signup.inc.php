<?php

session_start();

if(isset($_POST)) {

	$firstname = $_POST['fname'];
	$lastname = $_POST['lname'];
	$address = $_POST['address'];
	$contactno = $_POST['contactno'];
	$qualification = $_POST['qualification'];
	$dob = $_POST['dob'];
	$designation = $_POST['designation'];
	$aboutme = $_POST['aboutme'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	include "../../dbh.classes.php";
	include "../classes/jobseeker-signup.classes.php";
	include "../classes/jobseeker-signup-contr.classes.php";

	$signup = new JobSeekerSignupContr($firstname, $lastname, $email, $password, $address, $contactno, $qualification, $dob, $designation, $aboutme);

	$signup->signupUser();

	header("Location: ../../index.php?error=none");
}
else {

	header("Location: ../jobseeker-signup.php");
	exit();
}