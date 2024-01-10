<?php
class JobProviderSignup extends Dbh {
	protected function setUser($name, $companyname, $address, $contactno, $website, $email, $password, $aboutme) {
		$stmt = $this->connect()->prepare('INSERT INTO jobprovider(name, companyname, address, contactno, website, email, password, aboutme, logo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);');

		$password = base64_encode(strrev(md5($password)));

		//This variable is used to catch errors doing upload process. False means there is some error and we need to notify that user.
		$uploadOk = true;

		//Folder where you want to save your image. THIS FOLDER MUST BE CREATED BEFORE TRYING
		$folder_dir = "../uploads/";

		//Getting Basename of file. So if your file location is Documents/New Folder/myResume.pdf then base name will return myResume.pdf
		$base = basename($_FILES['image']['name']); 

		//This will get us extension of your file. So myimage.pdf will return pdf. If it was image.doc then this will return doc.
		$imageFileType = pathinfo($base, PATHINFO_EXTENSION); 

		//Setting a random non repeatable file name. Uniqid will create a unique name based on current timestamp. We are using this because no two files can be of same name as it will overwrite.
		$file = uniqid() . "." . $imageFileType; 
	  
		//This is where your files will be saved so in this case it will be uploads/image/newfilename
		$filename = $folder_dir .$file;  

		//We check if file is saved to our temp location or not.
		if(file_exists($_FILES['image']['tmp_name'])) { 
			//Next we need to check if file type is of our allowed extention or not. I have only allowed pdf. You can allow doc, jpg etc. 
			if($imageFileType == "jpg" || $imageFileType == "png")  {
				//Next we need to check file size with our limit size. I have set the limit size to 5MB. Note if you set higher than 2MB then you must change your php.ini configuration and change upload_max_filesize and restart your server

				if($_FILES['image']['size'] < 500000) { // File size is less than 5MB
					//If all above condition are met then copy file from server temp location to uploads folder.
					move_uploaded_file($_FILES["image"]["tmp_name"], $filename);
				}

				else {
					//Size Error
					$_SESSION['uploadError'] = "Wrong Size. Max Size Allowed : 5MB";
					$uploadOk = false;
				}
			}

			else {
				//Format Error
				$_SESSION['uploadError'] = "Wrong Format. Only jpg & png Allowed";
				$uploadOk = false;
			}
		}

		else {
			//File not copied to temp location error.
			$_SESSION['uploadError'] = "Something Went Wrong. File Not Uploaded. Try Again.";
			$uploadOk = false;
		}

		//If there is any error then redirect back.
		if($uploadOk == false) {
			header("Location: ../jobprovider-signup.php");
			exit();
		}

		if(!$stmt->execute(array($name, $companyname, $address, $contactno, $website, $email, $password, $aboutme, $file))) {
			$stmt = null;
			//if email found in database then show email already exists error.
		
		}

		$stmt = null;

		//If data inserted successfully then Set some session variables for easy reference and redirect to company login
		$_SESSION['registerCompleted'] = true;
		header("Location: ../jobprovider-login.php");
		exit();
	}

	protected function checkUser($email) {
		$stmt = $this->connect()->prepare('SELECT email FROM jobprovider WHERE email=?;');

		if(!$stmt->execute(array($email))) {
			$stmt = null;
			$_SESSION['registerError'] = true;
			header("Location: ../jobprovider-signup.php");
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