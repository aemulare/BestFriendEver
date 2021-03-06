<?php

include 'common_functions.php';


// display only 365 symbols for big articles
function truncate_article($string)
{
    return $truncated = (strlen($string) > 365) ? substr($string, 0, 365) . '...' : $string;
}

function isTruncated($string)
{
    if(strlen($string) > 365) return true;
}


$conn = OpenDBconnection();

// ********** PAGING SCRIPT ******************************************************************

// find out how many rows are in the table
$sql = "SELECT COUNT(*) AS SUM FROM articles";
$result = $conn->query($sql);
$num =  mysqli_fetch_assoc($result);
$numrows = $num['SUM'];
$result->close();

// number of rows to show per page
$rowsperpage = 3;

// find out total pages
$totalpages = ceil($numrows / $rowsperpage);

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
$sql = "SELECT a.id, a.title, a.content, a.picture, a.user_id, a.created_at, usr.nickname 
        FROM articles as a
        INNER JOIN users as usr ON a.user_id = usr.id
        ORDER BY a.created_at DESC LIMIT   $offset , $rowsperpage";
$result = $conn->query($sql);


// while there are rows to be fetched...
while ($list = $result->fetch_assoc())
{
    // echo data
    echo "<div class='col-lg-12 text-center'>
                <img class='img-responsive img-border img-full' src='".imageSource($list["picture"])."' alt=''>
                <h2>" . $list["title"] ."
                    <br>
                    <small>by <strong>".$list["nickname"]."</strong>,&nbsp;". article_date($list["created_at"]). "</small>
                </h2>
                <p>". truncate_article($list["content"]) ."</p>
                <a href='article.php?articleId=".$list["id"]. "' class='btn btn-default btn-lg'>Read More</a>
               <hr>
            </div>";
} // end while




/******  build the pagination links ******/
$prevpage = $currentpage - 1;
$nextpage = $currentpage + 1;

function disabledClass($currentPage, $totalpages, $forNext)
{
    $result = $forNext ? 'next' : 'previous';
    $disabled = ($currentPage == 1 && $forNext) || ($currentPage == $totalpages && !$forNext) ? ' disabled' : '';
    return $result . $disabled;
}


echo "<div class='col-lg-12 text-center'>
                <ul class='pager'>
                    <li class='". disabledClass($currentpage, $totalpages, false) ."'><a href=\"{$_SERVER['PHP_SELF']}?currentpage=$nextpage\">&larr; Older</a></li>
                    <li class='". disabledClass($currentpage, $totalpages, true) ."'><a href=\"{$_SERVER['PHP_SELF']}?currentpage=$prevpage\">Newer &rarr;</a>
                    </li>
                </ul>
            </div>";
/****** end build pagination links ******/


CloseDBconnection($conn);
?>
