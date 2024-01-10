<?php
session_start();

if(empty($_SESSION['id_jobprovider'])) {
  header("Location: ../jobprovider-index.php");
  exit();
}

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../../includes/db.inc.php");

//Retrieve data
$sql = "SELECT * FROM apply WHERE id_jobprovider='$_SESSION[id_jobprovider]' AND id_jobseeker='$_GET[id]' AND id_job='$_GET[id_job]'";

$result = $conn->query($sql);

if($result->num_rows == 0) 
{
  header("Location: index.php");
  exit();
}

//Under review
$sql = "UPDATE apply SET status='2' WHERE id_jobprovider='$_SESSION[id_jobprovider]' AND id_jobseeker='$_GET[id]' AND id_job='$_GET[id_job]'";

if($conn->query($sql) === TRUE) {
	header("Location: ../jobprovider-applications.php");
	exit();
}
?>