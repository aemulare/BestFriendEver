<?php

// get the info from the db
$sql = "SELECT cm.id, users.nickname, cm.comment, cm.article_id, cm.created_at FROM comments as cm 
        INNER JOIN users ON cm.user_id = users.id 
        WHERE cm.article_id =" . htmlspecialchars($_GET["articleId"]).
" ORDER BY cm.created_at";
$result = $conn->query($sql) or trigger_error("SQL", E_USER_ERROR);


// while there are rows to be fetched...
while ($list = $result->fetch_assoc())
{
    // echo data
    echo "<div class='box col-lg-12'>
            <p><small><strong>". $list["nickname"] ."</strong>&nbsp;&nbsp;&nbsp;". $list["created_at"]."</small><br>" .$list["comment"] ."</p>
          </div>";
} // end while

?>