<?php

//To Handle Session Variables on This Page
session_start();

if(empty($_SESSION['id_jobseeker'])) {
	header("Location: ../jobseeker-index.php");
	exit();
}

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../../includes/db.inc.php");

//If user Actually clicked apply button
if(isset($_GET)) {

	$sql = "SELECT * FROM job WHERE id_job='$_GET[id]'";
	  $result = $conn->query($sql);
	  if($result->num_rows > 0) 
	  {
	    	$row = $result->fetch_assoc();
	    	$id_jobprovider = $row['id_jobprovider'];
	   }

	//Check if user has applied to job post or not. If not then add his details to apply_job_post table.
	$sql1 = "SELECT * FROM apply WHERE id_jobseeker='$_SESSION[id_jobseeker]' AND id_job='$row[id_job]'";
    $result1 = $conn->query($sql1);
    if($result1->num_rows == 0) {  
    	//If not apply job
    	$sql = "INSERT INTO apply(id_job, id_jobprovider, id_jobseeker) VALUES ('$_GET[id]', '$id_jobprovider', '$_SESSION[id_jobseeker]')";

		if($conn->query($sql)===TRUE) {
			$_SESSION['jobApplySuccess'] = true;
			header("Location: ../jobseeker-index.php");
			exit();
		} else {
			echo "Error " . $sql . "<br>" . $conn->error;
		}

		$conn->close();

    }  else {
		header("Location: ../../jobs.php");
		exit();
	}
	

} else {
	header("Location: ../../jobs.php");
	exit();
}