<?php

class JobSeekerSignupContr extends JobSeekerSignup {
	
	private $firstname;
	private $lastname;
	private $email;
	private $password;
	private $address;
	private $contactno;
	private $qualification;
	private $dob;
	private $designation;
	private $aboutme;

	public function __construct($firstname, $lastname, $email, $password, $address, $contactno, $qualification, $dob, $designation, $aboutme) {

		$this->firstname = $firstname;
		$this->lastname = $lastname;
		$this->email = $email;
		$this->password = $password;
		$this->address = $address;
		$this->contactno = $contactno;
		$this->qualification = $qualification;
		$this->dob = $dob;
		$this->designation = $designation;
		$this->aboutme = $aboutme;
	}

	public function signupUser() {
		if(!$this->userCheck() == false) {
			$this->setUser($this->firstname, $this->lastname, $this->email, $this->password, $this->address, $this->contactno, $this->qualification, $this->dob, $this->designation, $this->aboutme);
		}
	}

	private function userCheck() {
		$result;
		if (!$this->checkUser($this->email))
		{
			$result = false;
			header("Location: ../jobseeker-signup.php");
			$_SESSION['registerError'] = true;
			exit();
		}
		else
		{
			$result = true;
		}
		return $result;
	}
}