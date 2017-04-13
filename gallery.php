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
                <h2 class="intro-text text-center">Our
                    <strong>Breeds Gallery</strong>
                </h2>
                <hr>
            </div>

            <div class="row">
                <?php include('gallery-handler.php') ?>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>



</div>
<!-- /.container -->

<?php include 'Footer.html' ?>
<?php include 'Scripts.html' ?>

</body>

</html>
