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


// ********** PAGING SCRIPT ******************************************************************


// find out how many rows are in the table
$sql = "SELECT COUNT(*) AS SUM FROM articles";
$result = $conn->query($sql) or trigger_error("SQL", E_USER_ERROR);
$num =  mysqli_fetch_assoc($result);
$numrows = $num['SUM'];
$result->close();

// number of rows to show per page
$rowsperpage = 1;

// find out total pages
$totalpages = $numrows;

// get the current page or set a default
if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
    // cast var as int
    $currentpage = (int) $_GET['currentpage'];
} else {
    // default page num
    $currentpage = 1;
} // end if

// if current page is greater than total pages...
if ($currentpage > $totalpages) {
    // set current page to last page
    $currentpage = $totalpages;
} // end if
// if current page is less than first page...
if ($currentpage < 1) {
    // set current page to first page
    $currentpage = 1;
} // end if

// the offset of the list, based on current page
$offset = ($currentpage - 1) * $rowsperpage;

// get the info from the db
$sql = "SELECT * FROM articles WHERE id = " . htmlspecialchars($_GET["articleId"]);
$result = $conn->query($sql) or trigger_error("SQL", E_USER_ERROR);

// get the info from the db
//$sql = "SELECT * FROM articles ORDER BY date DESC LIMIT $offset , $rowsperpage";
//$result = $conn->query($sql) or trigger_error("SQL", E_USER_ERROR);


// while there are rows to be fetched...
while ($list = $result->fetch_assoc())
{
    //$list["id"] = htmlspecialchars($_GET["articleId"]);
    // echo data
    echo "<div class=\"col-lg-12 text-center\">
                <img class=\"img-responsive img-border img-full\" src=\"" . imageSource($list["picture"]) . "\" alt=\"\">
                <h2>" . $list["title"] ."
                    <br>
                    <small>" . article_date($list["date"] ) . "</small>
                </h2>
                <p>". $list["content"] ."</p>
                <a href=blog.php class=\"btn btn-default btn-lg\">Back to articles</a>
                <hr>
            </div>";
} // end while



//echo 'Article ID = ' . htmlspecialchars($_GET["articleId"]);
//echo 'Current page = ' . htmlspecialchars($_GET["currentPage"]);

/******  build the pagination links ******/
//$prevpage = $currentpage - 1;
//$nextpage = $currentpage + 1;
//
//function disabledClass($currentPage, $totalpages, $forNext)
//{
//    $result = $forNext ? 'next' : 'previous';
//    $disabled = ($currentPage == 1 && $forNext) || ($currentPage == $totalpages && !$forNext) ? ' disabled' : '';
//    return $result . $disabled;
//}
//
//
//echo "<div class=\"col-lg-12 text-center\">
//                <ul class=\"pager\">
//                    <li class='". disabledClass($currentpage, $totalpages, false) ."'><a href=\"{$_SERVER['PHP_SELF']}?currentpage=$nextpage\">&larr; Older</a></li>
//                    <li class='". disabledClass($currentpage, $totalpages, true) ."'><a href=\"{$_SERVER['PHP_SELF']}?currentpage=$prevpage\">Newer &rarr;</a>
//                    </li>
//                </ul>
//            </div>";
/****** end build pagination links ******/


CloseDBconnection($conn);
?>
