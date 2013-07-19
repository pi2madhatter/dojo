<!DOCTYPE HTML>
<html>
	<head>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="php, tutorial, advanced, sample page, names" />
		<meta name="description" content="PHP Advanced I Tutorial" />
		<title>PHP Advanced I Tutorial</title>
		<script>
			$(document).ready(function(){
				$('#wrapper').hide().delay(1000).fadeIn(800);
			});
		</script>
	</head>
	<body>
<?php

//Using for loop:
function table_output($users_array) {
	echo '<table><thead><tr><th>User #</th><th>First Name</th><th>Last Name</th><th>Full Name</th><th>Full Name in Upper Case</th><th>Length of Name</td></tr><thead>';
	for ($i=0; $i < 14; $i++) {
		echo "<tr><td>".($i+1)."</td><td>".$users_array[$i]['first_name']."</td><td>".$users_array[$i]['last_name']."</td>";
		$fullname = trim($users_array[$i]['first_name'])." ".trim($users_array[$i]['last_name']);
		$namecount = strlen($fullname);
		echo "<td>".$fullname."</td><td>".strtoupper($fullname)."</td></td><td>".$namecount."</td></tr>";
	}
	echo '</table>';
}

//Using foreach loop:
function table_output_foreach($users_array) {
	echo '<table><thead><tr><th>User #</th><th>First Name</th><th>Last Name</th><th>Full Name</th><th>Full Name in Upper Case</th><th>Length of Name</td></tr><thead>';
	$i = 0;
	foreach ($users_array as $person) {
		$i++; 
		echo "<tr><td>".($i)."</td><td>";
		$bothnames = array();
		foreach ($person as $stat) {
			echo $stat."</td><td>";
			$bothnames[] = trim($stat); 
		}
		$fullname = $bothnames[0]." ".$bothnames[1];
		echo $fullname."</td><td>";
		echo strtoupper($fullname)."</td><td>";
		echo strlen($fullname)."</td>";
		echo "</tr>";
	}
	echo '</table>';
}


$users = array( 
   array('first_name' => 'Michael', 'last_name' => ' Choi '),
   array('first_name' => 'John', 'last_name' => 'Supsupin'),
   array('first_name' => 'Mark', 'last_name' => ' Guillen'),
   array('first_name' => 'KB', 'last_name' => 'Tonel'),
   array('first_name' => 'John', 'last_name' => 'Hooper'),
   array('first_name' => 'Michelle', 'last_name' => 'Katzenburg'),
   array('first_name' => 'Tammy', 'last_name' => 'Smith'),
   array('first_name' => 'Gilbert', 'last_name' => 'Grazen'),
   array('first_name' => 'Filbert', 'last_name' => 'Lee'),
   array('first_name' => 'Kevin', 'last_name' => 'Petersen'),
   array('first_name' => 'Elisabeth', 'last_name' => 'Linden'),
   array('first_name' => 'Casey', 'last_name' => 'Davidson'),
   array('first_name' => 'George', 'last_name' => 'Chesterfield'),
   array('first_name' => 'Vincent', 'last_name' => 'Fonteroy')
);

echo '<h3>Using &quot;For Loop&quot;:</h3>';
table_output($users);

echo '<h3>Using &quot;Foreach&quot;:</h3>';
table_output_foreach($users);

?>
	</body>
</html>