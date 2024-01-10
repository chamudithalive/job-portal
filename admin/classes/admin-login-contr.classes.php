<?php

class AdminLoginContr extends AdminLogin {
	private $username;
	private $password;

	public function __construct( $username, $password) {
		$this->username = $username;
		$this->password = $password;
	}

	public function adminLogin() {
		$this->getAdmin($this->username, $this->password);
	}
}