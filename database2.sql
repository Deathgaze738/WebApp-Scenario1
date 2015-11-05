CREATE DATABASE IF NOT EXISTS todolist;
USE todolist;
CREATE TABLE IF NOT EXISTS posts
(
	postid int NOT NULL AUTO_INCREMENT,
	userid int NOT NULL,
	title VARCHAR(55),
	content VARCHAR(255),
	finish BOOLEAN,
	PRIMARY KEY(postid),
	FOREIGN KEY(userid)
);
