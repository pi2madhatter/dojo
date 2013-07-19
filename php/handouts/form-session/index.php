<?php
	session_start();
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>User Login</title>
</head>
<body>
	<div id="wrapper">
		<h3 id="validation">
			<?php 
				if(isset($_SESSION['errors']))
				{
					echo $_SESSION['errors'];
				}
			?>
		</h3>
		<form id="user_login" action="process.php" method="post">
			<label> Email </label>
			<input type="text" name="email">
			<label> Password </label>
			<input type="password" name="password">
			<input type="submit" value="Login">
		</form>
	</div>
</body>
</html>
<?php
	unset($_SESSION['errors']);
?>