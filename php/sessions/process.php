<?php
session_start();

	if($_POST['username'] == "victor@pagano-design.com" && ($_POST['password'] == "codingdojo"))
	{
		$_SESSION['message'] = '<span style="color:green">Happy! Login was successful!</span>';		
	}
	elseif($_POST['username'] == "" || ($_POST['password'] == ""))
	{
		$_SESSION['message'] = 'Error. Fields cannot be left blank.';
	}
	elseif($_POST['username'] !== "victor@pagano-design.com")
	{
		$_SESSION['message'] = 'Error. User name is invalid.';
	}
	elseif($_POST['password'] !== "codingdojo")
	{
		$_SESSION['message'] = 'Error. Your password is invalid.';
	}
	else
	{
		$_SESSION['message'] = 'An undefined error occurred. Please try again.';
	}

	header("Location:session_testing.php");
?>