<!DOCTYPE html>
<html lang="en">

<<?php include 'Header.html' ?>

<body>

<div class="brand">Best Friend Ever</div>
<div class="address-bar">Everything about dogs</div>

<<?php include 'Navigation.html' ?>

<div class="container">

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">New
                    <strong>article</strong>
                </h2>
                <hr>
                <h2></h2>




                <form role="form" action="info.php" method="post">
                    <div class="row">
<!--                        <div class="col-lg-12 text-center">-->
<!--                            <img class="img-responsive img-border img-full" src="http://placehold.it/800x400">-->
<!--                        </div>-->
                        <div class="form-group col-lg-4">
                            <label>Tttle</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group col-lg-12">
                            <label>Content</label>
                            <textarea class="form-control" rows="20" input type="text" name="message" ></textarea>
                        </div>
                        <div class="form-group col-lg-12">
                            <input type="hidden" name="save" value="contact">
                            <button type="submit" class="btn btn-default">Submit</button>
                            <button type="button" class="btn btn-default">Cancel</button>
                            <span>&nbsp;&nbsp;&nbsp;</span>
                            <button type="button" class="btn btn-default">Upload image</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container -->

<?php include 'Footer.html' ?>
<?php include 'Scripts.html' ?>

</body>

</html>
