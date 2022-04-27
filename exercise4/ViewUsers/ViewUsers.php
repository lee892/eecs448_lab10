<?php
echo "<link rel='stylesheet' href='styles.css'>";
$mysqli = new mysqli("mysql.eecs.ku.edu", "m791l749", "Ja4iesh3", "m791l749");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$query = "SELECT UserId FROM Users";
if ($result = $mysqli->query($query)) {
    echo "<table>";
    while ($row = $result->fetch_assoc()) {
        printf("<tr><td>%s</td></tr>", $row["UserId"]);
    }
    echo "</table>";
    $result->free();
}
$mysqli->close();

?>