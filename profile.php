
<?php require_once 'header.html' ?>

<body>

<div class="brand">Best Friend Ever</div>
<div class="address-bar">Everything about dogs</div>

<?php include 'navigation.php' ?>

<?php
include 'common_functions.php';

$num_comments = $num_articles = $email = $username = $nickname = $member_since = $num_articles = $num_comments = null;

if(isset($_COOKIE['user_id'])) {
    $id = $_COOKIE['user_id'];
    $conn = OpenDBconnection();

    // retrieving personal info
    $sql = " SELECT email, username, nickname, created_at FROM users WHERE id = '$id'";
    $result = $conn->query($sql);

    $usr_info = $result->fetch_assoc();
    $email = $usr_info['email'];
    $username = $usr_info['username'];
    $nickname = $usr_info['nickname'];
    $member_since = $usr_info['created_at'];
    $result->free();


    // retrieving number of articles and comments
    $sql = " SELECT 
              (SELECT COUNT(*) FROM articles WHERE user_id = '$id') as articles,
              (SELECT COUNT(*) FROM comments WHERE user_id = '$id') as comments; ";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
    $num_articles = $data['articles'];
    $num_comments = $data['comments'];
    $result->free();


    echo "<!--Display Profile Data-->
<div class='container'>
    <div class='row'>
        <div class='box'>
            <div class='col-lg-12'>
                <hr>
                <h2 class='intro-text text-center'>Welcome
                    <strong>$nickname</strong>
                </h2>
                <hr>
                <h1>&nbsp;</h1>

                <div class='col-lg-4'>
                    <h4>Personal info</h4>
                    <p><strong>Full name:&Tab;</strong>$username</p>
                    <p><strong>Nickname:&Tab;</strong>$nickname</p>
                    <p><strong>Email:&Tab;</strong>$email</p>
                    <br>
                </div>
                <div class='col-lg-4'>
                <h4>Statistics</h4>
                    <p><strong>Joined:&Tab;</strong>$member_since</p>
                    <p><strong>Total number of articles:&Tab;</strong>$num_articles</p>
                    <p><strong>Total number of comments:&Tab;</strong>$num_comments</p>
                    <br>
                </div>          
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='box'>
            <div class='col-lg-12'>
                <hr>
                <h2 class='intro-text text-center'>YOUR
                    <strong>articles</strong>
                </h2>
                <hr>
                <div class=\"clearfix\"></div>
                <div class='col-lg-12'>";

    // user articles
    $sql = " SELECT a.id, a.created_at, a.title, COUNT(c.article_id) as comments
                        FROM articles a
	                    LEFT JOIN comments c ON a.id = c.article_id
                        WHERE a.user_id = '$id'
                        GROUP BY a.id
                        ORDER BY a.created_at DESC";
    $result = $conn->query($sql);

    // while there are rows to be fetched...
    while ($list = $result->fetch_assoc()) {
        echo "
              <div class='col-lg-12'>
                  <p>".$list['created_at']."&nbsp;&nbsp;&nbsp;<strong>".$list['title']."</strong>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;".$list['comments']."&nbsp;&nbsp;". pluralize($list['comments'], 'comment')."</pre>
              </div>";
    }
    $result->free();

    echo "</div>      
            </div>
        </div>
    </div>
</div>
<!-- /.container -->
";

}
?>



<?php include 'footer.html' ?>
<?php include 'Scripts.html' ?>

</body>

