<?php

include 'common_functions.php';
include 'user_validation.php';

if(is_logged())
{
    $conn = OpenDBconnection();

    // Receive and sanitize input
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);

    // receive article ID to jump back to the same article page after adding new comment
    $articleID = $_POST['article_id'];

    $id = $_COOKIE['user_id'];

    // write to db
    $sql = "INSERT INTO comments (user_id, comment, article_id) VALUES ($id, '$comment',$articleID)";
    $result = $conn->query($sql);

    CloseDBconnection($conn);

    RedirectTo('blog_article.php?articleId='.$articleID);
}

?>

