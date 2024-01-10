<?php

class JobSeekerLogin extends Dbh {

	protected function getUser( $email, $password) {

		$password = base64_encode(strrev(md5($password)));

		$stmt = $this->connect()->prepare('SELECT id_jobseeker, firstname, lastname, email, active FROM jobseeker WHERE email = ? AND password = ?');


		if(!$stmt->execute(array($email, $password))) {
			$stmt = null;
			$_SESSION['loginActiveError'] = "Your Account Is Not Active. Check Your Email.";
		 	header("Location: ../jobseeker-login.php");
			exit();
		}

		
		if($stmt->rowCount() > 0) {
			while($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
				if($row[0]['active'] == '0')
				{
					$_SESSION['loginActiveError'] = "Your Account Is Not Active. Check Your Email.";
			 		header("Location: ../jobseeker-login.php");
					exit();
				}
				else if($row[0]['active'] == '1')
				{ 
					//Set some session variables for easy reference
					$_SESSION['name'] = $row[0]['firstname'] . " " . $row[0]['lastname'];
					$_SESSION['id_jobseeker'] = $row[0]['id_jobseeker'];
					if(isset($_SESSION['callFrom'])) {
						$location = $_SESSION['callFrom'];
						unset($_SESSION['callFrom']);
						header("Location: ../" . $location);
						exit();
					} else {
						//Redirect them to user dashboard once logged in successfully
						header("Location: ../jobseeker-index.php");
						exit();
					}
				}
				else if($row[0]['active'] == '2')
				{ 
					$_SESSION['loginActiveError'] = "Your Account Is Deactivated. Contact Admin To Reactivate.";
			 		header("Location: ../jobseeker-login.php");
					exit();
				}
				else {
		 		//if no matching record found in user table then redirect them back to login page
		 		$_SESSION['loginError'] = $stmt->error;
		 		header("Location: ../jobseeker-login.php");
				exit();
				}
 			}
 		}

		$stmt = null;
		$_SESSION['loginActiveError'] = "Check Your Email and Password";
		header("Location: ../jobseeker-login.php");
		exit();
	}
}