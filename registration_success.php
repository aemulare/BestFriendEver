<?php
include 'common_functions.php';

// to prevent direct access to this page
if(!isset($_GET["nickname"]))
    RedirectTo('index.php');

?>


<!DOCTYPE html>
<html lang="en">

<?php include 'header.html' ?>


<body>
<div class="brand">Best Friend Ever</div>
<div class="address-bar">Everything about dogs</div>

<?php include 'navigation.php' ?>

<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">
                    <strong>Welcome to BestFriendEver!</strong>
                </h2>
                <hr>
                <p class="text-center">Your user account has been created successfully.</p>
                <div class="text-success text-center" style="font-size: x-large">
                    <strong>
                        <?php echo "You are registered with nickname: ". $_GET["nickname"]; ?>
                    </strong>
                </div>
                <br>
                <p class="text-center">We appreciate that you’ve chosen to join us.
                    <br>Now you can log in and start writing articles and comments.</p>
                <hr>
                <p class="text-center">
                    <a href="index.php" class="btn btn-default btn-lg">Back to Home page</a>
                </p>
            </div>
        </div>
    </div>
</div>


<?php include 'footer.html' ?>
<?php include 'Scripts.html' ?>
</body>