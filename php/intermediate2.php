<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="php, tutorial, intermediate, sample page, multiplication" />
		<meta name="description" content="PHP Intermediate II Tutorial" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
		<title>PHP Intermediate II Tutorial</title>
		<script>
			$(document).ready(function(){
				$('#wrapper').hide().delay(1000).fadeIn(800);
			});
		</script>
	</head>
	<body>
<?php


function product_table_generator($x,$y) {
	//generate the table wrapper
	echo '<table>';
	//tracking each row
	for ($xi=0; $xi < $x; $xi++) { 
		$row = $xi;
		//echo '<tr><td>'.$row.'</td>';
		//tracking each column while inside each row
		for ($yi=0; $yi < $y; $yi++) { 
			$col = $yi;
			if($col == 0 && $row == 0){
					$product = "&nbsp;";
				} elseif($col == 0) {
					$product = $row;
				} elseif($row == 0){
					$product = $col;
				} else {
					$product = ($row*$col);
				}
			echo '<td>'.$product.'</td>';
		}
		echo '</tr>';
	}
	echo '</table>';
}

$x = 10;//total rounds of rows
$y = 10;//total cols in each row

product_table_generator($x,$y);

?>
	</body>
</html>