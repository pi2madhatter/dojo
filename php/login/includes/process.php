<?php
session_start();
//require('connection.php');

function illegal_character_check($string, $type)
//$type = (alphabetic = alpha, numeric = num, alphanumeric = alphanum, date=date)
{
	//alphabetic characters ONLY validation
	if($type == 'alpha')
	{
		//fyi carat in regex means "not the included characters" this includes spaces, apostrophes and dashes for names like "Peggy Sue O'Hara-Clark"
		if(preg_match("/[^-'a-zA-Z\s]+/", $string))
		{
			return "bad";
		}
	}

	//numeric characters ONLY validation
	elseif($type == 'num')
	{
		if(preg_match("/[^0-9]+/", $string))
		{
			return "bad";
		}
	}

	//alphanumeric validation
	//in the case of passwords, CONTAINS a number AND a letter, but nothing else
	elseif($type == 'alphanum')
	{
		if(preg_match("/[^a-zA-Z0-9]+/", $string))
		{
			return "bad";
		}
		elseif(!preg_match("/[a-zA-Z]+/", $string) || !preg_match("/[0-9]+/", $string))
		{
			return "bad";
		}
	}

	//if it doesn't match any of these formats, it's either good or undefined. Let it go...
	return "good";
}

function names_evaluator($name, $label)
//got the first_name value ("") and label (first_name) to evaluate...
{
	$label_string = str_replace('_', ' ', ucwords($label));
	//if the value is "", then alert it and move on...
	if (empty($name))
	{
		$alert[$label.'_required'] = $label_string . " is a required field.";
	}
	 else
	{
		//otherwise check the values for length...
		if(strlen($name) > 14)
	 	{
	 		$alert[$label.'_character_exceeded'] = $label_string . " must be less than 14 characters.";
	 	}
	 	//and feed into illegal character check for bad characters...
	 	if(illegal_character_check($name,'alpha') == 'bad')
	 	{
	 		$alert[$label.'_bad_characters'] = $label_string . " must use alphabetic characters only.";
	 	}
	}
	if(isset($alert)){
		return $alert;
	}
	else
	{
		return array();
	}
}

function passwords_evaluator($name, $label)
{
	$label_string = str_replace('_', ' ', ucwords($label));
	//if the value is "", then alert it and move on...
	if (empty($name))
	{
		$alert[$label.'_required'] = $label_string . " is a required field.";
	}
	else {
		//otherwise check the values of the length...
		if(strlen($name) < 4 || strlen($name) > 8)
	 	{
	 		$alert[$label.'_length_exceed'] = $label_string . " must be between 4 and 8 characters.";
	 	}
	 	if(illegal_character_check($name,'both') == 'bad')
	 	{
	 		$alert[$label.'_bad_characters'] = $label_string . "must use alphanumeric characters only.";
	 	}
	}
	if(isset($alert)){
		return $alert;
	}
	else
	{
		return array();
	}
}

//in comes array with entries from all fields...
function validator($login_info)
{
	$collected_alerts = array();
//First Name evaluator
	//this takes the text from the first_name slot and the tag 'first_name' and pushes them to the names_evaluator function...
	$first_name_alerts = (names_evaluator($login_info['first_name'], 'first_name'));
	$collected_alerts = array_merge($collected_alerts, $first_name_alerts);
//Last Name evaluator
	//this takes the text from the last_name slot and the tag 'last_name' and pushes them to the names_evaluator function...
	$last_name_alerts = (names_evaluator($login_info['last_name'], 'last_name'));
	$collected_alerts = array_merge($collected_alerts, $last_name_alerts);

	//Email evaluator
	if(empty($login_info['email']))
	{
		$collected_alerts['email_required'] = "Email is a required field.";
	}
	elseif(filter_var($login_info['email'],FILTER_VALIDATE_EMAIL) === FALSE)
	{
		$collected_alerts['email_format'] = "Email must be in valid format.";
	}

	//Birthday evaluator isn't required
	// if(!empty($login_info['birth_date'])
	// {
	// 		$collected_alerts['birth_date'] = "Birthdate is a required field.";
	// }

	//Password matching
	if($login_info['password'] !== $login_info['confirm_password'])
 	{
 		$collected_alerts['passwords_mismatch'] = "Passwords do not match.";
 	}
 	else
 	{
 	//Password evaluator
		$passwords_alerts = (passwords_evaluator($login_info['password'], 'password'));
		$collected_alerts = array_merge($collected_alerts, $passwords_alerts);
 	}
	if(empty($collected_alerts))
	{
		$collected_alerts = array('success'=>'<span class="success">Your submission was successful.<br />Thanks for submitting your information.</span>');
	}

	return $collected_alerts;
}	

if($_POST){
	// if($_POST['registration'])
	// {
	// 	$_SESSION['messages'] = (validator($_POST));
	// 	//submit query
	// }
	// elseif($_POST['login'])
	// {
		$_SESSION['messages'] = (validator($_POST));
//	}
}

header("Location:../php_advanced_intermediate1.php");

?>