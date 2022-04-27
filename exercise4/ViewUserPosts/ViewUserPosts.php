<?php
$user = $_POST['user'];
echo "<link rel='stylesheet' href='styles.css'>";
$mysqli = new mysqli("mysql.eecs.ku.edu", "m791l749", "Ja4iesh3", "m791l749");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT PostId, Content, AuthorId FROM Posts WHERE AuthorId = '$user';";
if ($result = $mysqli->query($query)) {
    echo "<h1>User '$user' posts:</h1>";
    echo "<table>";
    while ($row = $result->fetch_assoc()) {
        
        $content = $row['Content'];
        echo "<tr><td>$content</td></tr>";
    }
    echo "</table>";
    $result->free();
}
$mysqli->close();

?>