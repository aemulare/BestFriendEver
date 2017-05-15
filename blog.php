<?php session_start(); ?>
<?php include 'header.php' ?>

<body>

<div class="brand">Best Friend Ever</div>
<div class="address-bar">Everything about dogs</div>

<?php include 'navigation.php' ?>

<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                    <div class="col-12-lg text-center">
                        <h2 class="intro-text"><strong>Welcome</strong> to Our <strong>blog</strong></h2>
                        <?php if(is_logged()) echo "<a href='form_new_article.php' class='btn btn-default btn-lg'>Add Article</a>";?>
                    </div>
                <hr>
            </div>

            <?php include('blog-handler.php') ?>

        </div>
    </div>

</div>
<!-- /.container -->

<?php include 'footer.html' ?>
<?php include 'Scripts.html' ?>

</body>

</html>
