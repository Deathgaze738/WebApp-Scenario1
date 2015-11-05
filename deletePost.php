<?php
	include "dbcon.php";
	session_start();
	if(!isset($_SESSION))
	{
		header('Location: index.php?error=2');
	}
	$postid = $_GET['postid'];
	$stmt1 = $dbh->prepare('DELETE FROM todos WHERE postid=:postid');
	$stmt1->bindParam(':postid', $postid);
	$stmt1->execute();
	header('Location: ToDoList.php');
?>

