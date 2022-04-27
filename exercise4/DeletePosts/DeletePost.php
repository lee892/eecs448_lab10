<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "m791l749", "Ja4iesh3", "m791l749");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$query = "SELECT PostId, Content, AuthorId FROM Posts";
if ($result = $mysqli->query($query)) {
    echo "<h1>Posts Deleted:</h1>";
    while ($row = $result->fetch_assoc()) {
        $author = $row['AuthorId'];
        $post = $row['PostId'];
        $content = $row['Content'];
        if ($_POST[$post] != "") {
            $toDelete = "DELETE FROM Posts WHERE PostId = '$post'";
            if ($deleteResult = $mysqli->query($toDelete)) {
                echo "<p>Successfully deleted '$post: $content'</p>";
            } else {
                echo "<p>Delete unsuccessful '$post: $content'</p>";
            }
        }
    }
    $result->free();
} else {
    echo "<p>No posts available</p>";
}
$mysqli->close();



?>