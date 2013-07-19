<?php

$int_array = array(4, 6, 1, 3, 5, 7, 25);

function draw_stars($num_str_arr){
	//set recursive to zero to loop through the array index
	$i = 0;
	//take the array above and retrieve each value
	foreach($num_str_arr as $num_str) {
		//declare the string variable in preparation to receive results
		//the variable must aleady be declared since '.=' can't concatinate the first time if it's not already defined.
		$asterics = "";
		//loop through and append an asterisk as many times as the array value says
		for($ix=0; $ix < $num_str; $ix++) { 
			$asterics .= '*';
		}
		//save each round of askterics strings in an array value
		$stars_arr[$i] = $asterics;
		$i++;
	}
	//add html breaks and convert the array into a string
	return implode('<br />', $stars_arr);
}

echo '<p>For reference:</p>';
var_dump($int_array);
echo '<br /><br />';
echo draw_stars($int_array);

?>