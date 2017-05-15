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
    echo "<div class='col-lg-12 text-center'>
                <img class='img-responsive img-border img-full' src='" .imageSource($list["picture"]). "' alt=''>
                <h2>" . $list["title"] ."
                    <br>
                    <small>" . article_date($list["created_at"] ) . "</small>
                </h2>
                <p>". $list["content"] ."</p>
                <hr>
                <a href=blog.php class='btn btn-default btn-lg'>Back to articles</a>
            </div>";

} // end while



// New Comment Form ------------------------------------------------------
if(is_logged())
{
    echo "<div class='row'>
    <div class='box'>
        <div class='col-lg-12'>
        
        <!--for testing purpose only -->
<!--                <div class=\"bs-callout bs-callout-warning hidden\">-->
<!--                    <h4>This form seems to be invalid!</h4>-->
<!--                </div>-->
<!---->
<!--                <div class=\"bs-callout bs-callout-info hidden\">-->
<!--                    <h4>Yay! Everything seems to be ok.</h4>-->
<!--                </div>-->

            <form id='comment' role='form' action='addComment.php' data-parsley-validate='' method='post'>
                <div class='row'>
                    <div class='clearfix'></div>
                    <div class='form-group col-lg-12'>
                        <label>Comment</label>
                        <textarea class='form-control' rows='6' name='comment' 
                                   required=''
                                   data-parsley-trigger='keyup' data-parsley-maxlength='512'
                                   data-parsley-maxlength-message='Your comment is too large.' data-parsley-validation-threshold='1'></textarea>
                    </div>
                    <div class='form-group col-lg-12'>
                        <input type='hidden' name='article_id' value=$articleID>
                        <button type='submit' class='btn btn-primary'>Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>";
}


//form validation script
echo "
<script type=\"text/javascript\">
    $(function () {
        $('#comment').parsley().on('field:validated', function() {
            var ok = $('.parsley-error').length === 0;
            $('.bs-callout-info').toggleClass('hidden', !ok);
            $('.bs-callout-warning').toggleClass('hidden', ok);
        })
            .on('form:submit', function() {
                return true;
            });
    });
</script>

";

include 'viewComments.php';
CloseDBconnection($conn);
?>
