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

<?php include 'navigation.html' ?>

<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">
                    <strong>Welcome to BestFriendEver!</strong>
                </h2>
                <hr>
                <p class="text-center">Your user account registration failed.</p>
                <div class="text-danger text-center">
                    <strong>
                        <?php echo "The email ". $_GET["email"]. " already exists."; ?>
                    </strong>
                </div>

                <p class="text-center">Please try again with different email.
                    <br>You can log in and start writing articles and comments after registration only.</p>
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