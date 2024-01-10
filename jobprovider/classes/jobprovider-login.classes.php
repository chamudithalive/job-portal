<?php
class JobProviderLogin extends Dbh {
	protected function getUser($email, $password) {
		$password = base64_encode(strrev(md5($password)));

		$stmt = $this->connect()->prepare('SELECT id_jobprovider, companyname, email, active FROM jobprovider WHERE email = ? AND password = ?');

		if(!$stmt->execute(array($email, $password))) {
			$stmt = null;
			//if no matching record found in user table then redirect them back to login page
			$_SESSION['loginError'] = "Your Account Is Not Active. Check Your Email.";
	 		header("Location: ../jobprovider-login.php");
			exit();
		}

		if($stmt->rowCount() > 0) {
			while($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
				if($row[0]['active'] == '2') {
					$_SESSION['companyLoginError'] = "Your Account Is Still Pending Approval.";
					header("Location: ../jobprovider-login.php");
					exit();
				}

				else if($row[0]['active'] == '0') {
					$_SESSION['companyLoginError'] = "Your Account Is Rejected. Please Contact For More Info.";
					header("Location: ../jobprovider-login.php");
					exit();
				}

				else if($row[0]['active'] == '1') {
					//Set some session variables for easy reference
					$_SESSION['name'] = $row[0]['companyname'];
					$_SESSION['id_jobprovider'] = $row[0]['id_jobprovider'];

					//Redirect them to company dashboard once logged in successfully
					header("Location: ../jobprovider-index.php");
					exit();
				}
				
				else if($row[0]['active'] == '3') {
					$_SESSION['companyLoginError'] = "Your Account Is Deactivated. Contact Admin For Reactivation.";
					header("Location: ../jobprovider-login.php");
					exit();
				}
 			}
 		}

		$stmt = null;
		$_SESSION['companyLoginError'] = "Check Your Email and Password";
		header("Location: ../jobprovider-login.php");
		exit();
	}
}