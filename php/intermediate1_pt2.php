<?php
$nested_array = array("This ", "is ", "a ", "array");

//deliberately using different value types to try to trip up the function
$source_array = array(4, "Tom", 1.75, "Michael", -5, NULL, "Jimmy Smith", $nested_array);

//function to handle different value types in the source array in draw_stars()
function diff_to_int_and_sym($val_sample) {
	$type = gettype($val_sample);
	//is already a whole number? just grab the value and use an asterisk for the symbol
	if($type =='integer') {
		$num_str = $val_sample;
		$char_symbol = '*';
	//is number with decimals? round up, grab the value and use an asterisk for the symbol
	//returns type as 'double', not 'float'. Weird...
	} elseif($type == 'double') {
		$num_str = round($val_sample, 0, PHP_ROUND_HALF_UP);
		$char_symbol = '*';
	//is string? grab the character count and use first letter for the symbol (converted to lowercase)
	} elseif($type == 'string') {
		$num_str = strlen($val_sample);
		$char_symbol = strtolower(substr($val_sample, 0, 1));
	//is array? merge the different subvalues in the array as a string, grab the character count and the first letter for the symbol (converted to lowercase)
	} elseif($type == 'array') {
		$num_str = strlen(implode($val_sample));
		$char_symbol = strtolower(substr(implode($val_sample), 0, 1));
	//anything else, just pass a value of 1 and lowercase 'x' as a symbol
	} else {
		$num_str = 1;
		$char_symbol = 'x';
	}
	// put $num_str (character count -- converted to always be positive number) and $char_symbol (first character or asterisk) into an array and pass off for use
	return array(abs($num_str), $char_symbol);
}

//render asterisks for the number of characters in each item in an array
function draw_stars($any_kinds_arr){
	//set recursive to zero to loop through the input array's index
	$i = 0;
	//take the array above and retrieve each value
	foreach($any_kinds_arr as $any_str) {
		//run each through the diff_to_int_and_sym() function to know what to do with different kinds of input value types.
		$num_str = diff_to_int_and_sym($any_str)[0];
		$char_symbol = diff_to_int_and_sym($any_str)[1];
		//declare $asterics variable since '.=' can't concatinate the first time otherwise.
		$asterics = "";
		//loop through and append an asterisk (or whatever symbol is defined) as many times as the array value (character count) says.
		for($ix=0; $ix < $num_str; $ix++) { 
			$asterics .= $char_symbol;
		}
		//save each round of askterics strings in an array value
		$stars_arr[$i] = $asterics;
		$i++;
	}
	//add html breaks and convert the array into a string
	return implode('<br />', $stars_arr);
}

echo '<p>For reference, What the input array says:</p>';
var_dump($source_array);
echo "<div style=\"border:solid 1px #999;background-color:#eee;padding:10px;margin-top:20px;\">";
echo draw_stars($source_array);
echo "</div>";

echo "<h3>Rules:</h3>
<ul>
<li>Whole numbers use an asterisk for the symbol displayed that many times</li>
<li>Decimals round up or down and use an asterisk for the symbol displayed that many times</li>
<li>Negative whole numbers and decimals are converted to positive and use an asterisk for the symbol displayed that many times</li>
<li>A string uses the first character for the symbol (converted to lowercase) displayed the character (including spaces) count's number of times.</li>
<li>A sub-array merges it's different values as a string, uses the first character for the symbol (converted to lowercase) displayed the character (including spaces) count's number of times.</li>
<li>Anything else (including NULL) will just pass a value of 1 and lowercase 'x' as a symbol.</li>
</ul>";

?>