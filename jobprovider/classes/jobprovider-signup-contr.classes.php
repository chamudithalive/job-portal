<?php
class JobProviderSignupContr extends JobProviderSignup {
	private $companyname;
	private $email;
	private $password;
	private $contactno;
	private $aboutme;
	private $name;
	private $website;
	private $address;

	public function __construct($name, $companyname, $address, $contactno, $website, $email, $password, $aboutme) {
		$this->name = $name;
		$this->companyname = $companyname;
		$this->email = $email;
		$this->password = $password;
		$this->address = $address;
		$this->contactno = $contactno;
		$this->website = $website;
		$this->aboutme = $aboutme;
	}

	public function signupUser() {
		if(!$this->userCheck() == false) {
			$this->setUser($this->name, $this->companyname, $this->address, $this->contactno, $this->website, $this->email, $this->password, $this->aboutme);
		}
	}

	private function userCheck() {
		$result;
		if (!$this->checkUser($this->email))
		{
			$result = false;
			header("Location: ../jobprovider-signup.php");
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