<?php

//sample array based on example in assignment (but also including negative numbers)
$num_array = array(135, 2.4, 2.67, 1.23, 332, 2, 1.02, .08, -999);
//using existing PHP max and min functions here for test purposes
$existing_function_output = array('max' => max($num_array), 'min' => min($num_array));

function get_max_and_min($evaluate_array) {
	//set max and min to compare each value with the one before it, starting with the first one
	$max = $evaluate_array[0];
	$min = $evaluate_array[0];
	foreach ($evaluate_array as $current_num) {
		//saving the value that meets the criteria as a dedicated variable
		if($current_num >= $max) {
			$max = $current_num;
		}
		if($current_num <= $min) {
			$min = $current_num;
		}
	}
	//pass the dedicated variables as values in a new array and indexed appropriately
	return array('max'=>$max, 'min'=>$min);
}

echo "<p>Existing PHP max and min functions generates (for comparison purposes):</p>";
//using existing PHP max and min functions here for test purposes
var_dump($existing_function_output);

echo "<p>My function generates:</p>";
//result of my function
var_dump(get_max_and_min($num_array));
?>