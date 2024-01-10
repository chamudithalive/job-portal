<?php
session_start();

if(empty($_SESSION['id_jobprovider'])) {
  header("Location: ../jobprovider-index.php");
  exit();
}
require_once("../../includes/db.inc.php");

//if user Actually clicked update profile button
if(isset($_POST)) {
	//Escape Special Characters
	$companyname = mysqli_real_escape_string($conn, $_POST['companyname']);
	$website = mysqli_real_escape_string($conn, $_POST['website']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$contactno = mysqli_real_escape_string($conn, $_POST['contactno']);
	$aboutme = mysqli_real_escape_string($conn, $_POST['aboutme']);

	$uploadOk = true;

	if(is_uploaded_file ( $_FILES['image']['tmp_name'] )) {
		$folder_dir = "../uploads/";

		$base = basename($_FILES['image']['name']); 

		$imageFileType = pathinfo($base, PATHINFO_EXTENSION); 

		$file = uniqid() . "." . $imageFileType; 
	  
		$filename = $folder_dir .$file;  

		if(file_exists($_FILES['image']['tmp_name'])) { 
			if($imageFileType == "jpg" || $imageFileType == "png")  {
				if($_FILES['image']['size'] < 500000) { // File size is less than 5MB
					//If all above condition are met then copy file from server temp location to uploads folder.
					move_uploaded_file($_FILES["image"]["tmp_name"], $filename);
				}
				else {
					$_SESSION['uploadError'] = "Wrong Size. Max Size Allowed : 5MB";
					header("Location: edit-company.php");
					exit();
				}
			}
			else {
				$_SESSION['uploadError'] = "Wrong Format. Only jpg & png Allowed";
				header("Location: edit-company.php");
				exit();
			}
		}
	}
	else {
		$uploadOk = false;
	}

	//Update User Details Query
	$sql = "UPDATE jobprovider SET companyname='$companyname', website='$website', address='$address', contactno='$contactno', aboutme='$aboutme'";

	if($uploadOk == true) {
		$sql = $sql . ", logo='$file'";
	}

	$sql = $sql . " WHERE id_jobprovider='$_SESSION[id_jobprovider]'";

	if($conn->query($sql) === TRUE) {
		$_SESSION['name'] = $companyname;
		//If data Updated successfully then redirect to dashboard
		header("Location: ../jobprovider-index.php");
		exit();
	}
	else {
		echo "Error ". $sql . "<br>" . $conn->error;
	}
	//Close database connection. Not compulsory but good practice.
	$conn->close();

}
else {
	//redirect them back to dashboard page if they didn't click update button
	header("Location: ../jobprovider-edit-profile.php");
	exit();
}