<?php
	include 'dbcon.php';
				$id = $_POST['id'];
				$stmt = $dbh->prepare('SELECT title, post FROM todos WHERE postid=:postid');
				$stmt->bindParam(':postid', $id);
				$stmt->execute();
				$row = $stmt->fetch();

                                echo '<form id="newPost" action="editing.php" method="POST">
				<div id="title"><label for="postTitle">Title</label><input type="text" name="postTitle" value="'.$row["title"].'"></div>
				<div id="post"><label for="postContent">Content</label><input type="textarea" name="postContent" value="'.$row["post"].'"></div>
                                <input type="hidden" value="'.$id.'" name="postid">
				<input type="submit">
				</form>';
?>
