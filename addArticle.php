<?php

include "db_connection.php";
$conn = OpenDBconnection();

// Receive and sanitize input
$title = mysqli_real_escape_string($conn, $_POST['title']);
$content = mysqli_real_escape_string($conn, $_POST['content']);
//$picture = mysqli_real_escape_string($conn, $_POST['picture']);
$userid = $_POST['user_id'];
$date = date('Y-m-d H:i:s');

// write to db
$sql = "INSERT INTO articles (title, content, picture, user_id, created_at) VALUES ('$title', '$content', null,  19, '$date')";
$result = $conn->query($sql);

CloseDBconnection($conn);

// Redirect back to blog
$location = 'Location: https://bestfriendever.herokuapp.com/blog.php';
header($location, false);

?>