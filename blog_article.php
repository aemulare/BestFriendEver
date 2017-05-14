<!DOCTYPE html>
<html lang="en">

<?php include 'header.html' ?>

<body>

<div class="brand">Best Friend Ever</div>
<div class="address-bar">Everything about dogs</div>

<?php include 'navigation.html' ?>

<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">Our
                    <strong>blog</strong>
                </h2>
                <hr>
            </div>

            <?php include 'blog-article-handler.php' ?>

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

<?php include 'footer.html' ?>
<?php include 'Scripts.html' ?>

</body>

</html>
