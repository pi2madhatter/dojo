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

function checkerboarder($rows, $cols, $style) {
	if($style == 2) {
		echo '<table class="trad">'; 
	} elseif($style == 3){
		echo '<table class="alt">';
	} else {
		echo '<table>';
	}
	for ($r=0; $r < $rows; $r++) { 
		echo '<tr>';
		for ($c=0; $c < $cols; $c++) {
			$mode = $c+$r;
			echo '<td class="';
			if($mode&1) {
				echo 'b_square">&nbsp;';
			} else {
				echo 'w_square">&nbsp;';
			}
			echo '</td>';
		}
		echo '</tr>';
	}
	echo '</table>';
}

//define how many rows, columns and what style checkerboard (1=shadowed, 2=traditional, 3=green alternative)
checkerboarder(8,8,1);

checkerboarder(10,8,2);

checkerboarder(8,14,3);

?>
	</body>
</html>