<?php
include 'db_connection.php';

// check if field 'picture' for null
function imageSource($picture)
{
    return $picture ? "img/" . $picture : "http://placehold.it/800x400";
}

function article_date($date)
{
    $date = new DateTime($date);
    return $date->format('F d, Y');
}

$conn = OpenDBconnection();


// get the info from the db
$articleID = htmlspecialchars($_GET["articleId"]);
$sql = "SELECT * FROM articles WHERE id = " . $articleID;
$result = $conn->query($sql) or trigger_error("SQL", E_USER_ERROR);


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
    echo "<div class=\"row\">
    <div class=\"box\">
        <div class=\"col-lg-12\">
            <form role=\"form\" action=\"blog_article.php?articleId=$articleID\" method=\"post\">
                <div class=\"row\">
                    <div class=\"clearfix\"></div>
                    <div class=\"form-group col-lg-12\">
                        <label>Comment</label>
                        <textarea class=\"form-control\" rows=\"6\" input type=\"text\" name=\"comment\" ></textarea>
                    </div>
                    <div class=\"form-group col-lg-12\">
                        <button type=\"submit\" class=\"btn btn-default\">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>";
} // end while


include 'viewComments.php';





//echo 'Article ID = ' . htmlspecialchars($_GET["articleId"]);
//echo 'Current page = ' . htmlspecialchars($_GET["currentPage"]);


CloseDBconnection($conn);
?>
