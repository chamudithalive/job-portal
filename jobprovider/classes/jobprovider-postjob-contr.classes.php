<?php
class JobProviderPostJobContr extends JobProviderPostJob {
	private $jobtitle;
	private $description;
	private $minimumsalary;
	private $maximumsalary;
	private $experience;
	private $qualification;

	public function __construct($jobtitle, $description, $minimumsalary, $maximumsalary, $experience, $qualification) {
		$this->jobtitle = $jobtitle;
		$this->description = $description;
		$this->minimumsalary = $minimumsalary;
		$this->maximumsalary = $maximumsalary;
		$this->experience = $experience;
		$this->qualification = $qualification;
	}

	public function postJob() {
		$this->setJob($this->jobtitle, $this->description, $this->minimumsalary, $this->maximumsalary, $this->experience, $this->qualification);
	}
}