<?php

class JobSeekerLoginContr extends JobSeekerLogin {
	private $email;
	private $password;

	public function __construct( $email, $password) {
		$this->email = $email;
		$this->password = $password;

	}

	public function loginUser() {
		$this->getUser($this->email, $this->password);
	}
}