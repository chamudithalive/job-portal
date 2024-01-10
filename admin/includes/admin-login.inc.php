<?php

//To Handle Session Variables on This Page
session_start();

//If user Actually clicked login button 
if(isset($_POST)) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	include "../../dbh.classes.php";
	include "../classes/admin-login.classes.php";
	include "../classes/admin-login-contr.classes.php";

	$adminLogin = new AdminLoginContr($username, $password);

	$adminLogin->adminLogin();
}
else {
	header("Location: ../admin-login.php");
	exit();
}