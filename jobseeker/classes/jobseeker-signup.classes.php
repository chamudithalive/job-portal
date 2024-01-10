<?php

class JobSeekerSignup extends Dbh {

	protected function setUser($firstname, $lastname, $email, $password, $address, $contactno, $qualification, $dob, $designation, $aboutme) {
		$stmt = $this->connect()->prepare('INSERT INTO jobseeker(firstname, lastname, email, password, address, contactno, qualification, dob, designation, resume, hash, aboutme) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);');

		$password = base64_encode(strrev(md5($password)));

		$uploadOk = true;

		$folder_dir = "../uploads/";
		$base = basename($_FILES['resume']['name']);
		$resumeFileType = pathinfo($base, PATHINFO_EXTENSION);
		$file = uniqid() . "." . $resumeFileType;
		$filename = $folder_dir .$file;

		if(file_exists($_FILES['resume']['tmp_name'])) { 
			if($resumeFileType == "pdf")  {
				if($_FILES['resume']['size'] < 500000)
				{
					move_uploaded_file($_FILES["resume"]["tmp_name"], $filename);
				}
				else
				{
					$_SESSION['uploadError'] = "Wrong Size. Max Size Allowed : 5MB";
					$uploadOk = false;
				}
			}
			else
			{
				$_SESSION['uploadError'] = "Wrong Format. Only PDF Allowed";
				$uploadOk = false;
			}
		}
		else
		{
			$_SESSION['uploadError'] = "Something Went Wrong. File Not Uploaded. Try Again.";
			$uploadOk = false;
		}

		if($uploadOk == false) {
			header("Location: ../jobseeker-signup.php");
			exit();
		}

		$hash = md5(uniqid());

		if(!$stmt->execute(array($firstname, $lastname, $email, $password, $address, $contactno, $qualification, $dob, $designation, $file, $hash, $aboutme))) {
			$stmt = null;
			$_SESSION['registerError'] = true;
			header("Location: ../jobseeker-signup.php");
			exit();
		}

		$stmt = null;
		$_SESSION['registerCompleted'] = true;
		header("Location: ../jobseeker-login.php");
		exit();
	}

	protected function checkUser($email) {
		$stmt = $this->connect()->prepare('SELECT email FROM jobseeker WHERE email=?;');

		if(!$stmt->execute(array($email))) {
			$stmt = null;
			$_SESSION['registerError'] = true;
			header("Location: ../jobseeker-signup.php");
			exit();
		}

		$resultCheck;
		if($stmt->rowCount() > 0) {
			$resultCheck = false;
		}
		else {
			$resultCheck = true;
		}

		return $resultCheck;
	}
}