<?php
	$user = "mysql";
	$pass = "your_password";
	try
	{
		$dbh = new PDO('mysql:host=localhost:3306;dbname=todolist', $user, $pass);
	}
	catch(PDOException $e)
	{
		print "Error: " . $e->getMessage() . "<br/>";
    		die();
	}
?>
