<?php session_start();

require_once 'common_functions.php';

// to prevent direct access to this page
if(!isset($_POST['message']))
    RedirectTo('index.php');
?>

<?php include 'contact-form-handler.php' ?>
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
                <h2 class="intro-text text-center">
                    <strong>Thank you for your submission</strong>
                </h2>
                <hr>
                <p class="text-center">Here is the copy of your message:
                    <div class="text-success text-center" style="font-size: x-large">
                    <strong>
                    <?php echo msg(); ?>
                    </strong>
                </div>
                </p>
                <p class="text-center">We appreciate that you’ve taken the time to write us. We’ll get back to you very soon. Please come back and see us often.</p>
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