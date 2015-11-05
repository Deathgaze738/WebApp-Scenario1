<?php
	$user = "root";
	$pass = "your_password";
	try
	{
		$dbh = new PDO('mysql:host=localhost:3306;dbname=todolist', $user);
	}
	catch(PDOException $e)
	{
		print "Error: " . $e->getMessage() . "<br/>";
    		die();
	}
?>
