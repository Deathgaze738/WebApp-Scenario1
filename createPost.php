<?php
	include "dbcon.php";
	session_start();
	if(!isset($_SESSION))
	{
		header('Location: index.php?error=2');
	}
	$id = $_SESSION['id'];
	$title = $_POST['postTitle'];
	$content = $_POST['postContent'];

	$stmt = $dbh->prepare('INSERT INTO todos (userid, title, post) VALUES (:userid, :title, :post)');
	$stmt->bindParam(':userid', $id);
	$stmt->bindParam(':title', $title);
	$stmt->bindParam(':post', $content);
	$stmt->execute();
	header('Location: ToDoList.php');
?>

