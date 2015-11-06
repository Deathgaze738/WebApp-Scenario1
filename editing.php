<?php
        include 'dbcon.php';
        $title = $_POST['postTitle'];
        $content = $_POST['postContent'];
        $id = $_POST['postid'];
        echo $title.$content.$id;
        $stmt = $dbh->prepare("UPDATE todos SET title=:title, post=:post WHERE postid=:id");
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":post", $content);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        header("Location: ToDoList.php");
?>
