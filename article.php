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
                <h2 class="intro-text text-center">Our
                    <strong>blog</strong>
                </h2>
                <hr>
            </div>

            <?php include 'article-handler.php' ?>

        </div>
    </div>

</div>
<!-- /.container -->

<?php include 'footer.html' ?>
<?php include 'Scripts.html' ?>

</body>

</html>
