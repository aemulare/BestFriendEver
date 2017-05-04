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
                <h2 class="intro-text text-center">Registration
                    <strong>form</strong>
                </h2>
                <hr>
                <p class="text-center">All the fields below are required.<br>After submitting this form you will receive an email
                    with activation link. Please, follow that link in order to finish your registration.<br></p>
                <hr>
                <h1>&nbsp;</h1>

                <form role="form" action="info.php" method="post">
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label>Full Name</label>
                            <input type="text" name="username" class="form-control" placeholder="John Doe">
                        </div>
                        <p><br><small>Your full name will not be shared.</small></p>
                        <div class="clearfix"></div>
                        <div class="form-group col-lg-4">
                            <label>Nickname</label>
                            <input type="text" name="nickname" class="form-control" placeholder="Doglover123">
                        </div>
                        <p><br><small>How do you prefer being called? This name will be posted under your articles and comments.</small></p>
                        <div class="clearfix"></div>
                        <div class="form-group col-lg-4">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="someone@example.com">
                        </div>
                        <p><br><small>Your email address will be used as your login.</small></p>
                        <div class="clearfix"></div>
                        <div class="form-group col-lg-4">
                            <label>Your password</label>
                            <input type="password" name="password" class="form-control" placeholder="**********">
                        </div>
                        <p><br><small>8-12 symbols long, letters and numbers only.</small></p>
                        <div class="clearfix"></div>
                        <div class="form-group col-lg-4">
                            <label>Please confirm your password</label>
                            <input type="password" name="password_match" class="form-control" placeholder="**********">
                        </div>
                        <div class="form-group col-lg-12">
                            <input type="hidden" name="save" value="contact">
                            <button type="submit" class="btn btn-default">Submit</button>
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
