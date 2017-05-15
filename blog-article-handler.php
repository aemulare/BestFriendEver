<?php

include 'common_functions.php';

$conn = OpenDBconnection();

// get the info from the db
$articleID = htmlspecialchars($_GET["articleId"]);
$sql = "SELECT * FROM articles WHERE id = " . $articleID;
$result = $conn->query($sql);


// while there are rows to be fetched...
while ($list = $result->fetch_assoc())
{
    // echo data
    echo "<div class=\"col-lg-12 text-center\">
                <img class=\"img-responsive img-border img-full\" src=\"" . imageSource($list["picture"]) . "\" alt=\"\">
                <h2>" . $list["title"] ."
                    <br>
                    <small>" . article_date($list["created_at"] ) . "</small>
                </h2>
                <p>". $list["content"] ."</p>
                <hr>
                <a href=blog.php class=\"btn btn-default btn-lg\">Back to articles</a>
            </div>";

} // end while



// New Comment Form ------------------------------------------------------
if(is_logged())
{
    echo "<div class='row'>
    <div class='box'>
        <div class='col-lg-12'>
            <form role='form' action='addComment.php' method='post'>
                <div class='row'>
                    <div class='clearfix'></div>
                    <div class='form-group col-lg-12'>
                        <label>Comment</label>
                        <textarea class='form-control' rows='6' input type='text' name='comment' ></textarea>
                    </div>
                    <div class='form-group col-lg-12'>
                        <input type='hidden' name='article_id' value=$articleID>
                        <button type='submit' class='btn btn-default'>Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>";
}

include 'viewComments.php';
CloseDBconnection($conn);
?>
