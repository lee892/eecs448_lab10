<?php

$userId = $_POST["userId"];
if ($userId == "") {
    echo "<h1>User Id cannot be empty</h1>";
} else {
    $mysqli = new mysqli("mysql.eecs.ku.edu", "m791l749", "Ja4iesh3", "m791l749");
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    
    $query = "INSERT INTO Users (UserId) VALUES ('${userId}');";
    if ($result = $mysqli->query($query)) {
        echo "<h1>User '${userId}' has been successfully added</h1>";
    } else {
        echo "<h1>Could not insert '${userId}'. Check if inserting already existing user</h1>";
    }
    $mysqli->close();
}




?>