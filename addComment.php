<?php

include "db_connection.php";
$conn = OpenDBconnection();

// Receive and sanitize input
$comment = mysqli_real_escape_string($conn, $_POST['comment']);

// receive article ID to jump back to the same article page after adding new comment
$articleID = $_POST['article_id'];

// write to db
$sql = "INSERT INTO comments (user_id, comment, article_id) VALUES (1, '$comment',$articleID)";
$result = $conn->query($sql);

if (!mysqli_query($conn,$sql)) {
    die('Error: ' . mysqli_error($conn));
}

CloseDBconnection($conn);

// Redirect back to blog article page
$location = 'Location: https://bestfriendever.herokuapp.com/blog_article.php?articleId='.$articleID;
header($location, false);

?>

