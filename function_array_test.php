<?php

function small_numbers() {
	$small_numbers = array(5, 6, 7);
	return $small_numbers;
 }

// echo "<p>list:</p>"
// list ($zero, $one, $two) = small_numbers();
// echo "<p>var dump:</p>";
// var_dump($small_numbers)
$zero = small_numbers()[0];
$one = small_numbers()[1];

echo "The first item in array is ".$zero.". The second item in array is ".$one.".";

?>