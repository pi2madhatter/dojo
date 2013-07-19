<?php
	session_start();
	
	if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
	{
		$error_message = "Email is valid";
	}
	else
	{
		$error_message = "Invalid email!";
	}
	
	$_SESSION['errors'] = $error_message;
	header('location: index.php');
?>