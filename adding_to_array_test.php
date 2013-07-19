<?php

$main_array = array("first_name"=>"first","last_name"=>"last","password"=>"password","confirm_password"=>"confirm","birth_date"=>"birth");
var_dump($main_array);
echo '<br><br>';
$second_array['index'] = 'value';

$second_array['index2'] = 'value2';
var_dump($second_array);

echo '<br><br>';


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

illegal_character_check('%$#*?rew34', 'alphanum');

?>