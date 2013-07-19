<?php

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

	//date validation
	elseif($type == 'date')
	{
	//found on stackoverflow... first check for illegal characters, then use $matches array to verify result is real
		if(preg_match('/(\d{2})\/(\d{2})\/(\d{4})/', $string, $matches) )
		{
			foreach ($matches as $match => $value) {
				# code...
			}
		    if(!checkdate($matches[2], $matches[1], $matches[3]))
		    {
		    	return "bad";
		    }
		}
		else
		{
			return "bad";
		}
	}
	//if it doesn't match any of these formats, it's either good or undefined. Let it go...
	return "good";
}

//FYI...
//is_numeric($string)) ... checks if $string is a NUMBER (ie: 25)
//ctype_digit($string) ... checks if $string is a STRING that is all number characters (ie: '25')
//ctype_alpha($string) ... checks if the string HAS numbers
//Info on different ctypes: http://php.net/manual/en/book.ctype.php

echo (illegal_character_check('11/20/2012', 'date'));

?>