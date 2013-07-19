<?php

$countUp = array();
$max = 7;
for($i=0; $i<$max; $i++) {
	$countUp[] = $i+1;
	foreach($countUp as $num) {
	echo $num;
	}
	echo "<br />";
}
for($i=($max-1); $i>0; $i--) {
	unset($countUp[$i]);
	foreach($countUp as $num) {
	echo $num;
	}
	echo "<br />";
}

?>