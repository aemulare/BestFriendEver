<!DOCTYPE html>
<html lang="en">

<?php include 'Header.html' ?>

<body>

<div class="brand">Best Friend Ever</div>
<div class="address-bar">Everything about dogs</div>

<?php include 'Navigation.html' ?>
<?php include 'db_connection.php';?>


<?php
/******** Carousel Controller ****************************/
$conn = OpenDBconnection();

// select slides for 3 most recent blog articles
$sql = "SELECT * FROM articles ORDER BY created_at DESC LIMIT 3";
$result = $conn->query($sql);
$slides = array();

while($row = $result->fetch_assoc())
    $slides[] = $row["picture"];

CloseDBconnection($conn);
/******** End Carousel Controller ****************************/
?>


<div class="container">

    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-center">
                <div id="carousel-example-generic" class="carousel slide">
                    <!-- Indicators -->
                    <ol class="carousel-indicators hidden-xs">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                    <?php
                    echo "<!-- Wrapper for slides -->
                    <div class=\"carousel-inner\">
                        <div class=\"item active\">
                            <img class=\"img-responsive img-full\" src=\"img/" . $slides[0]. "\" alt=\"\">
                        </div>
                        <div class=\"item\">
                            <img class=\"img-responsive img-full\" src=\"img/" . $slides[1]. "\" alt=\"\">
                        </div>
                        <div class=\"item\">
                            <img class=\"img-responsive img-full\" src=\"img/" . $slides[2]. "\" alt=\"\">
                        </div>
                    </div>"
                    ?>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="icon-prev"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="icon-next"></span>
                    </a>
                </div>
                <h2 class="brand-before">
                    <small>Welcome to</small>
                </h2>
                <h1 class="brand-name">Best Friend Ever</h1>
                <hr class="tagline-divider">

            </div>
        </div>
    </div>

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">Dog
                    <strong> - this is happiness!</strong>
                </h2>
                <hr>
                <img class="img-responsive  img-left" src="img/intro-breeds.png" alt="">
                <hr class="visible-xs">
                <p>Welcome to the portal about dogs! Read the news and a lot of useful information about dogs.<br>On our
                    site you will find everything about dogs: information about the sizes and breeds, their description
                    and characteristics. Details of dog care. Bright photos and interesting video.</p>
                <p>Our blog will help you understand how your dog thinks, how to train, live next to and feed your dog.
                    We will tell you what kind of medical problems your dog can have, how to prevent these problems, how
                    to provide first aid and when to call a veterinarian.</p>
                <p>In addition, we have a lot of interesting information about traveling with a dog and dog shows. We
                    are happy to share these materials with visitors of our site.</p>
            </div>
        </div>
    </div>

   <!-- <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">Beautiful boxes
                    <strong>to showcase your content</strong>
                </h2>
                <hr>
                <p>Use as many boxes as you like, and put anything you want in them! They are great for just about
                    anything, the sky's the limit!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc placerat diam quis nisl vestibulum
                    dignissim. In hac habitasse platea dictumst. Interdum et malesuada fames ac ante ipsum primis in
                    faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                    egestas.</p>
            </div>
        </div>
    </div>-->

</div>
<!-- /.container -->



<?php include 'Footer.html' ?>
<?php include 'Scripts.html' ?>

<!-- Script to Activate the Carousel -->
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
</script>



</body>

</html>
