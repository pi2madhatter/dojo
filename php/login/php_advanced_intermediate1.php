<?php
session_start();

//connect to database


if(isset($_SESSION['messages']) &&  $_SESSION['messages'] > 0)
{
	echo "<div id=\"message\">";
	foreach ($_SESSION['messages'] as $login_message)
	{
		echo "	<p>".$login_message."</p>";
	}
	echo "</div>";

	$hightlight_fields_array = array_flip($_SESSION['messages']);

	unset($_SESSION['messages']);
}

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
				$('#message').hide();
				if($('#message').has('p').length)
				{
					$('#message').slideDown();
					if($('#message').has('.success').length)
					{
						$('#message').addClass('success');
						$('.loginbox').fadeOut(800);
					}
					if($('#message > p:contains("First name")').length)
					{
						$('form #first_name').addClass('fieldactive');
					}	
					if($('#message > p:contains("Last name")').length)
					{
						$('form #last_name').addClass('fieldactive');
					}	
					if($('#message > p:contains("Email")').length)
					{
						$('form #email').addClass('fieldactive');
					}	
					if($('#message > p:contains("Passwords do not match")').length)
					{
						$('form #password').addClass('fieldactive');
						$('form #confirm_password').addClass('fieldactive');
					}	
					if($('#message > p:contains("Password")').length)
					{
						$('form #password').addClass('fieldactive');
					}	
				};
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
			if(isset($login_messages_string)) {
				echo $login_messages_string;
			}
		?>

		<div class="loginbox">
			<h2>Log In</h2>
			<p class="note"><span class="asterisk">*</span> denotes a required field</p>
			<form action="includes/process.php" method="post">
				<label for="first_name">First Name<span class="asterisk">*</span></label>
				<input type="text" name="first_name" id="first_name" placeholder="First Name" /><br /><br />
				<label for="last_name">Last Name<span class="asterisk">*</span></label>
				<input type="text" name="last_name" id="last_name" placeholder="Last Name" /><br /><br />
				<label for="email">Email<span class="asterisk">*</span></label>
				<input type="email" name="email" id="email" placeholder="Email" /><br /><br />
				<label for="password">Password<span class="asterisk">*</span></label>
				<input type="password" name="password" id="password" placeholder="******" /><br /><br />
				<label for="confirm_password">Confirm Password<span class="asterisk">*</span></label>
				<input type="password" name="confirm password" id="confirm_password" placeholder="******" /><br /><br />
				<label for="birth_date">Birth Date</label>
				<input type="date" name="birth_date" id="birth_date" placeholder="XX/XX/XXXX" /><br /><br />
				<input type="submit" value="Login" id="submit" />
			</form>
		</div>
	</body>
</html>