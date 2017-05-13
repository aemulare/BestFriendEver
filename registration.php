<!DOCTYPE html>
<html lang="en">

<?php require_once('Header.html') ?>


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

                <div class="bs-callout bs-callout-warning hidden">
                    <h4>This form seems to be invalid!</h4>
                </div>

                <div class="bs-callout bs-callout-info hidden">
                    <h4>Yay! Everything seems to be ok.</h4>
                </div>

                <form id="registration" role="form" action="addUser.php" data-parsley-validate="" method="post">
<!--                <form role="form" action="--><?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?><!--" method="post">-->
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="username">Full Name *</label>
                            <input type="text" name="username" id="username" class="form-control" data-parsley-pattern="/^[a-zA-Z .'-]+$/i" required="">
                        </div>
                        <p><br><small>Your full name will not be shared.</small></p>
                        <div class="clearfix"></div>
                        <div class="form-group col-lg-4">
                            <label for="nickname">Nickname *</label>
                            <input type="text" name="nickname" id="nickname" class="form-control" data-parsley-pattern="/^[a-zA-Z0-9.'-]+$/i" required="">
                        </div>
                        <p><br><small>How do you prefer being called? This name will be posted under your articles and comments.</small></p>
                        <div class="clearfix"></div>
                        <div class="form-group col-lg-4">
                            <label for="email">Email *</label>
                            <input type="email" name="email" id="email" class="form-control" data-parsley-type="email" required="">
                        </div>
                        <p><br><small>Your email address will be used as your login.</small></p>
                        <div class="clearfix"></div>
                        <div class="form-group col-lg-4">
                            <label for="pwd">Your password *</label>
                            <input type="password" name="password" id="pwd" class="form-control" required=""
                                   data-parsley-trigger="keyup" data-parsley-minlength="8" data-parsley-maxlength="12"
                                   data-parsley-minlength-message="Enter at least 8 characters"
                                   data-parsley-validation-threshold="4">
                        </div>
                        <p><br><small>8-12 symbols long, letters and numbers only.</small></p>
                        <div class="clearfix"></div>
                        <div class="form-group col-lg-4">
                            <label for="pwd_match">Please confirm your password *</label>
                            <input type="password" name="password_match" id="pwd_match" class="form-control" required=""
                                   data-parsley-trigger="keyup" data-parsley-minlength="8" data-parsley-maxlength="12"
                                   data-parsley-minlength-message="Enter at least 8 characters"
                                   data-parsley-validation-threshold="4" data-parsley-equalto="#pwd">
                        </div>
                        <div class="form-group col-lg-12">
<!--                            <input type="hidden" name="addUsr" value="user">-->
                            <input type="submit" class="btn btn-default" value="Submit">
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

<!-- form validation scripts -->
<script type="text/javascript">
    $(function () {
        $('#registration').parsley().on('field:validated', function() {
            var ok = $('.parsley-error').length === 0;
            $('.bs-callout-info').toggleClass('hidden', !ok);
            $('.bs-callout-warning').toggleClass('hidden', ok);
        })
            .on('form:submit', function() {
                return true;
            });
    });
</script>

</body>

</html>
