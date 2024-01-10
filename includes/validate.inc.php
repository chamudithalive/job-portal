<?php

if (isset($_POST['input'])) {

	$email = $_POST['input'];

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

		echo "<span class='valid'>Invalid email address!</span>";
	}
}

?>