<?php
session_start();
?>

<!DOCTYPE HTML>
<html>
	<head>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="php, tutorial, advanced, sample page, forms, sessions" />
		<meta name="description" content="PHP Advanced: Sessions Tutorial" />
		<title>PHP Advanced: Intermediate I Assignment</title>
		<script>
			$(document).ready(function()
			{
				$('input').focus(function()
				{
					$placeholder = $(this).attr('placeholder')
					$(this).attr("placeholder", "");
				});
				$('input').blur(function()
				{
					$(this).attr("placeholder", $placeholder);
				});
			});
		</script>
	</head>
	<body>
		<?php

			if(isset($_SESSION['message']))
			{
				echo "<div class=\"message\">".$_SESSION['message']."</div>";
				unset($_SESSION['message']);
			}

		?>
		<div class="loginbox">
			<form action="process.php" method="post">
				<label for="username">User Name</label>
				<input type="text" name="username" id="username" placeholder="User Name" /><br /><br />
				<label for="password">Password</label>
				<input type="password" name="password" id="password" placeholder="******" /><br /><br />
				<input type="submit" value="Login" id="submit" />
			</form>
		</div>
	</body>
</html>