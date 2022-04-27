<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "m791l749", "Ja4iesh3", "m791l749");
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$users = "CREATE TABLE IF NOT EXISTS Users(
    UserId VARCHAR(255) NOT NULL UNIQUE,
    PRIMARY KEY (UserId)
    );";
$posts = "CREATE TABLE IF NOT EXISTS Posts(
    PostId INT NOT NULL AUTO_INCREMENT,
    Content TEXT(5000),
    AuthorId VARCHAR(255) NOT NULL,
    PRIMARY KEY (PostId),
    FOREIGN KEY (AuthorId) REFERENCES Users(UserId)
);";

$mysqli->query($users);
$mysqli->query($posts);
$mysqli->close();
?>