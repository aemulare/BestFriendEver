<!DOCTYPE html>
<html lang="en">

<?php require_once('header.html') ?>

<body>
<div class="brand">Best Friend Ever</div>
<div class="address-bar">Everything about dogs</div>

<?php include 'navigation.php' ?>


<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">User
                    <strong>login</strong>
                </h2>
                <hr>

<!--                <div class="bs-callout bs-callout-warning hidden text-center">-->
<!--                    <h4>Username or password are invalid!</h4>-->
<!--                </div>-->
<!---->
<!--                <div class="bs-callout bs-callout-info hidden text-center">-->
<!--                    <h4>Yay! Everything seems to be ok.</h4>-->
<!--                </div>-->

                <form id="form_login" role="form" action="login.php" data-parsley-validate="" method="post">
                    <div class="row">
                        <div class="text-danger text-center" style="font-size: x-large">
                            <?php if(isset($_GET["error"])) echo $_GET["error"]; ?></div>
                        <br>

                        <!-- Email -->
                        <div class="form-group col-lg-4 col-md-offset-4">
                            <label for="email">Email *</label>
                            <input type="email" name="email" id="email" class="form-control" data-parsley-type="email" required="">
                        </div>
                        <div class="clearfix"></div>

                        <!-- Password -->
                        <div class="form-group col-lg-4 col-md-offset-4">
                            <label for="pwd">Password *</label>
                            <input type="password" name="password" id="pwd" class="form-control" required="">
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group col-lg-4 col-md-offset-4 text-center">
                            <input type="submit" class="btn btn-default btn-primary" value="Login">
                            <a href=index.php class="btn btn-default">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include 'footer.html' ?>
<?php include 'Scripts.html' ?>


    <!-- form validation scripts -->
    <script type="text/javascript">
        $(function () {
            $('#form_login').parsley().on('field:validated', function() {
//                var ok = $('.parsley-error').length === 0;
//                $('.bs-callout-info').toggleClass('hidden', !ok);
//                $('.bs-callout-warning').toggleClass('hidden', ok);
            })
                .on('form:submit', function() {
                    return true;
                });
        });
    </script>

</body>