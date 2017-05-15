<?php

include 'common_functions.php';
include 'user_validation.php';

if(is_logged())
{
    $conn = OpenDBconnection();

    // Receive and sanitize input
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    $userid = $_POST['user_id'];
    $date = date('Y-m-d H:i:s');
    $id = $_COOKIE['user_id'];

    // write to db
    $sql = "INSERT INTO articles (title, content, picture, user_id, created_at) VALUES ('$title', '$content', null, '$id', '$date')";
    $result = $conn->query($sql);

    CloseDBconnection($conn);
    RedirectTo('blog.php');
}

?>