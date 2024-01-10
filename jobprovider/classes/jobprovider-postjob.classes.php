<?php
class JobProviderPostJob extends Dbh {
	protected function setJob($jobtitle, $description, $minimumsalary, $maximumsalary, $experience, $qualification) {
		$stmt = $this->connect()->prepare("INSERT INTO job(id_jobprovider, jobtitle, description, minimumsalary, maximumsalary, experience, qualification) VALUES ('$_SESSION[id_jobprovider]',?, ?, ?, ?, ?, ?);");
		
		if($stmt->execute(array($jobtitle, $description, $minimumsalary, $maximumsalary, $experience, $qualification))) {
			//If data Inserted successfully then redirect to dashboard
			$_SESSION['jobPostSuccess'] = true;
			header("Location: ../jobprovider-index.php");
			exit();
		}
		
		else {
			//If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up :D
			echo "Error ";
		}

		$stmt = null;

		//Close database connection. Not compulsory but good practice.
		$conn->close();
	}
}