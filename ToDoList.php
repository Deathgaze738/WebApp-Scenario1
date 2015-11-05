<?php
	include "dbcon.php";
	/**if(!isset($_SESSION))
	{
		header('Location: index.php?error=2');
	}**/
	$name = $_SESSION['username'];
	$id = $_SESSION['id'];

	$stmt = $dbh->prepare('SELECT title, post FROM posts WHERE (userid) VALUES (:userid)');
	$stmt->bindParam(':userid', $id);
	$result = $stmt->fetchAll();
	
?>
<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>
	<div id="mainWrapper">
		<div id="topNav">
			<ul id="navigation stuff">
				<?php echo "<h1>Welcome ".$name."!</h1>" ?>
				<a src="logout.php">
					<div id="logoutBox">
						<li>Logout</li>
					</div>
				</a>
			</ul>
		</div>
		<div id="list">
			<?php
				foreach($result as $row)
				{
					echo "<div id='doItem'>
						<div id='title'>".$row['title']."</div>
						<div id='post'>".$row['post']."</div>
					</div>"
				}
			?>
		</div>
	</div>
</body>
