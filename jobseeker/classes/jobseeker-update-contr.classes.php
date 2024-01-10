<?php

class JobSeekerUpdateContr extends JobSeekerUpdate {
	
	private $firstname;
	private $lastname;
	private $address;
	private $contactno;
	private $qualification;
	private $aboutme;

	public function __construct($firstname, $lastname, $address, $contactno, $qualification, $aboutme) {

		$this->firstname = $firstname;
		$this->lastname = $lastname;
		$this->address = $address;
		$this->contactno = $contactno;
		$this->qualification = $qualification;
		$this->aboutme = $aboutme;
	}

	public function updateUser() {
		$this->updateProfile($this->firstname, $this->lastname, $this->address, $this->contactno, $this->qualification, $this->aboutme);
	}
}