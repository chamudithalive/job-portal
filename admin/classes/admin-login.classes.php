<?php

class AdminLogin extends Dbh {

	protected function getAdmin($username, $password) {

		$stmt = $this->connect()->prepare('SELECT * FROM admin WHERE username = ? AND password = ?;');

		if(!$stmt->execute(array($username, $password))) {
			$stmt = null;
			//if no matching record found in user table then redirect them back to login page
			$_SESSION['loginError'] = "Your Account Is Not Active. Check Your Email.";
	 		header("Location: ../admin-login.php");
			exit();
		}

		//if user table has this this login details
		if($stmt->rowCount() > 0) {
			//output data
			while($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
				//Set some session variables for easy reference
				$_SESSION['id_admin'] = $row[0]['id_admin'];
				header("Location: ../admin-dashboard.php");
				exit();
			}
	 	}
	 	else {
	 		$_SESSION['loginError'] = true;
	 		header("Location: ../admin-login.php");
			exit();
	 	}

		$stmt = null;
	}
}