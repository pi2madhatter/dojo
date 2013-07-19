<?php

$login_info['password'] = 'now';
$login_info['confirm_password'] = 'ow1';


//Password matching
	if($login_info['password'] !== $login_info['confirm_password'])
 	{
 		$login_alert['passwords_mismatch'] = "Passwords do not match.";
 	}
//Password evaluator
	if(strlen($login_info['password']) < 4 || strlen($login_info['password']) > 8)
 	{
 		$login_alert['password_length_exceed'] = "Password must be between 4 and 8 characters.";
 	}
 	// if(illegal_character_check($login_info['password'],'both') == 'bad')
 	// {
 	// 	$login_alert['password_bad_characters'] = "Password must use alphanumeric characters only.";
 	// }

 	var_dump($login_alert);

?>