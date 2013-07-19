<?php

//First Pulldown
echo '<p>First pulldown using "for" loop:</p>';
$states = array('CA', 'WA', 'VA', 'UT', 'AZ'); 

echo "<form>\n\t<select>\n";

for($i = 0; $i < (count($states)-1); $i++) {
	$state_code = $states[$i];
	echo "\t\t<option value=\"$state_code\">$state_code</option>\n";
}
echo "\t</select>\n</form>";

//Second pulldown
echo '<p>Second pulldown using "foreach" loop:</p>';
$states = array('CA', 'WA', 'VA', 'UT', 'AZ'); 

echo "<form>\n\t<select>\n";

foreach ($states as $state) {
  echo "\t\t<option value=\"$state\">$state</option>\n";
}
echo "\t</select>\n</form>";

//Third pulldown
echo '<p>Third pulldown with additional states added:</p>';
$states = array('CA', 'WA', 'VA', 'UT', 'AZ', 'NJ', 'NY', 'DE'); 

echo "<form>\n\t<select>\n";

foreach ($states as $state) {
  echo "\t\t<option value=\"$state\">$state</option>\n";
}
echo "\t</select>\n</form>";

?>