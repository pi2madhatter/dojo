<?php
	require("connection.php");

	$query = "SELECT * FROM users ORDER BY id ASC";

	$users = fetch_all($query);

	//var_dump($users);

	foreach ($users as $user)
	{
		echo $user['id']. " - " . $user['firstname'] . " " . $user['lastname'] . "<br />";
	}

	$firstname = "Tyler";
	$lastname = "Durden";
	//$query = "INSERT INTO users (firstname, lastname, created_at) VALUES ('{$firstname}', '{$lastname}', NOW())";

	//mysql_query($query);

	$query = "DELETE FROM users WHERE id = 4";
	mysql_query($query);
?>