<?php
class JobSeekerUpdate extends Dbh {
	protected function updateProfile($firstname, $lastname, $address, $contactno, $qualification, $aboutme) {

		$uploadOk = true;

		$folder_dir = "../uploads/";

		$base = basename($_FILES['resume']['name']); 

		$resumeFileType = pathinfo($base, PATHINFO_EXTENSION); 

		$file = uniqid() . "." . $resumeFileType;   

		$filename = $folder_dir .$file;  

		if(file_exists($_FILES['resume']['tmp_name'])) { 
			
			if($resumeFileType == "pdf")  {

				if($_FILES['resume']['size'] < 500000) { // File size is less than 5MB

					move_uploaded_file($_FILES["resume"]["tmp_name"], $filename);

				} else {
					$_SESSION['uploadError'] = "Wrong Size. Max Size Allowed : 5MB";
					header("Location: edit-profile.php");
					exit();
				}
			} else {
				$_SESSION['uploadError'] = "Wrong Format. Only PDF Allowed";
				header("Location: ../jobseeker-edit-profile.php");
				exit();
			}
		}

		require_once("../../includes/db.inc.php");

		//Update User Details Query
		$stmt = "UPDATE jobseeker SET firstname='$firstname', lastname='$lastname', address='$address', contactno='$contactno', qualification='$qualification', aboutme='$aboutme'";

		if($uploadOk == true) {
			$stmt .= ", resume='$file'";
		}

		$stmt .= " WHERE id_jobseeker='$_SESSION[id_jobseeker]'";
		
		if($conn->query($stmt) === TRUE) {
			$_SESSION['name'] = $firstname.' '.$lastname;
			//If data Updated successfully then redirect to dashboard
			header("Location: ../jobseeker-index.php");
			exit();
		} else {
			echo "Error ". $stmt . "<br>" . $stmt->error;
		}
	}
}