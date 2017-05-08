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
                <h2 class="intro-text text-center">
                    <strong>Welcome to BestFriendEver!</strong>
                </h2>
                <hr>
                <p class="text-center">Your user account has been created successfully.
                <div class="text-success text-center">
                    <strong>
                        <?php echo "Here will be some message for new user"; ?>
                    </strong>
                </div>
                </p>
                <p class="text-center">We appreciate that you’ve chosen to join us.</p>
                <hr>
                <p class="text-center">
                    <a href="index.php" class="btn btn-default btn-lg">Back to Home page</a>
                </p>
            </div>
        </div>
    </div>
</div>


<?php include 'Footer.html' ?>
<?php include 'Scripts.html' ?>
</body>