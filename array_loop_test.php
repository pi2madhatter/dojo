<?php

// array(5)
// {
// 	["first_name"]=> array(1)
// 	{
// 		["first_name"]=> string(31) "First name is a required field."
// 	}
// 	["last_name_length_exceeded"]=> string(42) "Last name must be less than 14 characters."
// 	["last_name_bad_characters"]=> string(46) "Last name must use alphabetic characters only."
// 	["password_length_exceed"]=> string(41) "Password must be less than 14 characters."
// 	["password_bad_characters"]=> string(47) "Password must use alphanumeric characters only."
// 	}
// }

function illegal_character_check($string, $type)
//$type = (alphabetic = alpha, numeric = num, both = alphanum)
{
	if($type == 'alpha' && preg_match("/[^a-zA-Z]+/", $string))
	{
		return "bad";
	}
	elseif($type == 'num' && preg_match("/[^0-9]+/", $string))
	{
		return "bad";
	}
	elseif(preg_match("/[^a-zA-Z0-9]+/", $string))
	{
		return "bad";
	}
}

function names_evaluator($name, $label)
//got the first_name value ("") and label (first_name) to evaluate...
{
	$label_string = str_replace('_', ' ', ucwords($label));
	//if the value is "", then alert it and move on...
	if($name == "")
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
	if($name == "")
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
 	if($collected_alerts >= 0)
	{
		return $collected_alerts;
	}
}


$_POST = array("first_name"=>"xxxxxxxxxxxxxxxxxx","last_name"=>"Pagano21","password"=>"01e","confirm_password"=>"01efr","birth_date"=>"");

$_SESSION =(validator($_POST));

?>