<?php
	include "dbcon.php";
	session_start();
	if(!isset($_SESSION))
	{
		header('Location: index.php?error=2');
	}
	$name = $_SESSION['username'];
	$id = $_SESSION['id'];
	
?>
<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>
	<div id="mainWrapper">
		<div id="topNav">
				<?php echo "<h1>Welcome ".$name."!</h1>" ?>
				<a href="logout.php">
					<div id="logoutBox">
						Logout
					</div>
				</a>
		</div>
		<div id="list">
				<div id='doItem'>
					<form id="newPost" action="createPost.php" method="POST">
					<div id='title'><label for="postTitle">Title</label><input type="text" name="postTitle"></div>
					<div id='post'><label for="postContent">Content</label><input type="textarea" name="postContent"></div>
					<input type="submit">
					</form>
				</div>
			<?php
				$stmt = $dbh->prepare('SELECT title, post, postid FROM todos WHERE userid=:userid');
				$stmt->bindParam(':userid', $id);
				$stmt->execute();
				$rows = $stmt->fetchAll();
				foreach($rows as $row)
				{
					echo "<div id='doItem'>
						<div id='title'><h1>".$row['title']."</h1></div>
						<div id='post'>".$row['post']."</div>
						<a href='deletePost.php?postid=".$row['postid']."'>Delete Post</a>
                                                <form action='editPost.php' method='POST'>
                                                <input type='hidden' name='id' value='".$row['postid']."'>
                                                <input type='submit' value='Edit Post'>
                                                </form>
                                               </div>
                                        </div>";
				}
			?>
		</div>
	</div>
</body>
