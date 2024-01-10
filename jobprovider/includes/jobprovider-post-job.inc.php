<?php
session_start();

if(empty($_SESSION['id_jobprovider'])) {
  header("Location: ../jobprovider-index.php");
  exit();
}

//if user Actually clicked Add Post Button
if(isset($_POST)) {
	$jobtitle = $_POST['jobtitle'];
	$description = $_POST['description'];
	$minimumsalary = $_POST['minimumsalary'];
	$maximumsalary = $_POST['maximumsalary'];
	$experience = $_POST['experience'];
	$qualification = $_POST['qualification'];

	include "../../dbh.classes.php";
	include "../classes/jobprovider-postjob.classes.php";
	include "../classes/jobprovider-postjob-contr.classes.php";

	$postjob = new JobProviderPostJobContr($jobtitle, $description, $minimumsalary, $maximumsalary, $experience, $qualification);

	$postjob->postJob();
}
else {
	//redirect them back to dashboard page if they didn't click Add Post button
	header("Location: ../jobprovider-create-job.php");
	exit();
}