<?php

//To Handle Session Variables on This Page
session_start();

if(empty($_SESSION['id_jobseeker'])) {
  header("Location: ../jobseeker-index.php");
  exit();
}

//if user Actually clicked update profile button
if(isset($_POST)) {

	$firstname = $_POST['fname'];
	$lastname = $_POST['lname'];
	$address = $_POST['address'];
	$contactno = $_POST['contactno'];
	$qualification = $_POST['qualification'];
	$aboutme = $_POST['aboutme'];

	
  include "../../dbh.classes.php";
	include "../classes/jobseeker-update.classes.php";
	include "../classes/jobseeker-update-contr.classes.php";
	$jobseeker = new JobSeekerUpdateContr($firstname, $lastname, $address, $contactno, $qualification, $aboutme);

	$jobseeker->updateUser();
}
else {
	//redirect them back to dashboard page if they didn't click update button
	header("Location: ../jobseeker-edit-profile.php");
	exit();
}