<?php

$userId = $_POST["userId"];
$post = $_POST["post"];
if ($post == "") {
    echo "<p>Post cannot be empty</p>";
} else {
    $mysqli = new mysqli("mysql.eecs.ku.edu", "m791l749", "Ja4iesh3", "m791l749");
    $query = "SELECT UserId FROM Users WHERE UserId = '${userId}';";
    if ($result = $mysqli->query($query)) {
        $row = $result->fetch_assoc();
        if ($row["UserId"] != "") {
            $query = "INSERT INTO Posts (Content, AuthorId) VALUES ('$post', '$userId');";
            if ($result = $mysqli->query($query)) {
                echo "<h1>User $userId successfully posted '$post'</h1>";
            } else {
                echo "<h1>Failed to post '$post' for user '$userId'. Make sure user exists.</h1>";
            }
        } else {
            echo "<h1>Could not find user '${userId}'.</h1>";
        }
    } else {
        echo "<h1>Could not find user '${userId}'.</h1>";
    }
    $mysqli->close();
}


?>
