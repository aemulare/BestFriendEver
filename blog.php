<!DOCTYPE html>
<html lang="en">

<?php include 'Header.html' ?>

<body>

<div class="brand">Best Friend Ever</div>
<div class="address-bar">Everything about dogs</div>

<?php include 'Navigation.html' ?>

<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                    <div class="col-12-lg text-center">
                        <h2 class="intro-text"><strong>Welcome</strong> to Our <strong>blog</strong></h2>
                        <a href="addArticle.php" class="btn btn-default btn-lg">Add Article</a>
                    </div>

                <hr>
            </div>

            <?php include('blog-handler.php') ?>

            <!--<div class="col-lg-12 text-center">
                <ul class="pager">
                    <li class="previous"><a href="#">&larr; Older</a>
                    </li>
                    <li class="next"><a href="#">Newer &rarr;</a>
                    </li>
                </ul>
            </div>-->
        </div>
    </div>

</div>
<!-- /.container -->

<?php include 'Footer.html' ?>
<?php include 'Scripts.html' ?>

</body>

</html>
