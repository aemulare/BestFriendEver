<!DOCTYPE html>
<html lang="en">

<?php require_once('header.html') ?>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">

    function checknickname()
    {
        var name=document.getElementById( "nickname" ).value;

        if(name)
        {
            $.ajax({
                type: 'post',
                url: 'checkdata.php',
                data: {
                    nickname:name,
                },
                success: function (response) {
                    $( '#nickname_status' ).html(response);
                    if(response=="OK")
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                }
            });
        }
        else
        {
            $( '#nickname_status' ).html("");
            return false;
        }
    }

    function checkemail()
    {
        var usr_email=document.getElementById( "email" ).value;

        if(email)
        {
            $.ajax({
                type: 'post',
                url: 'checkdata.php',
                data: {
                    email:usr_email,
                },
                success: function (response) {
                    $( '#email_status' ).html(response);
                    if(response=="OK")
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                }
            });
        }
        else
        {
            $( '#email_status' ).html("");
            return false;
        }
    }

    function checkall()
    {
        var namehtml=document.getElementById("nickname_status").innerHTML;
        var emailhtml=document.getElementById("email_status").innerHTML;

        if((namehtml && emailhtml)=="OK")
        {
            return true;
        }
        else
        {
            return false;
        }
    }

</script>

<body>

<div class="brand">Best Friend Ever</div>
<div class="address-bar">Everything about dogs</div>

<?php include 'navigation.html' ?>


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

<!--                <div class="bs-callout bs-callout-warning hidden">-->
<!--                    <h4>This form seems to be invalid!</h4>-->
<!--                </div>-->
<!---->
<!--                <div class="bs-callout bs-callout-info hidden">-->
<!--                    <h4>Yay! Everything seems to be ok.</h4>-->
<!--                </div>-->

                <form id="registration" role="form" action="addUser.php" data-parsley-validate="" method="post" onkeyup="return checkall();">
                    <div class="row">

                        <!-- Full Name -->
                        <div class="form-group col-lg-4">
                            <label for="username">Full Name *</label>
                            <input type="text" name="username" id="username" class="form-control" data-parsley-pattern="/^[a-zA-Z .'-]+$/i" required="">
                        </div>
                        <p><br><small>Your full name will not be shared.</small></p>
                        <div class="clearfix"></div>

                        <!-- Nickname -->
                        <div class="form-group col-lg-4">
                            <label for="nickname">Nickname *</label>
                            <input type="text" name="nickname" id="nickname" class="form-control"
                                   data-parsley-pattern="/^[a-zA-Z0-9.'-]+$/i" required="" onkeyup="checknickname();">
                            <span id="nickname_status"></span>
                        </div>
                        <p><br><small>How do you prefer being called? This name will be posted under your articles and comments.</small></p>
                        <div class="clearfix"></div>

                        <!-- Email -->
                        <div class="form-group col-lg-4">
                            <label for="email">Email *</label>
                            <input type="email" name="email" id="email" class="form-control" data-parsley-type="email"
                                   required="" onkeyup="checkemail();">
                            <span id="email_status"></span>
                        </div>
                        <p><br><small>Your email address will be used as your login.</small></p>
                        <div class="clearfix"></div>

                        <!-- Password -->
                        <div class="form-group col-lg-4">
                            <label for="pwd">Your password *</label>
                            <input type="password" name="password" id="pwd" class="form-control" required=""
                                   data-parsley-trigger="keyup" data-parsley-minlength="8" data-parsley-maxlength="12"
                                   data-parsley-minlength-message="Enter at least 8 characters"
                                   data-parsley-validation-threshold="1">
                        </div>
                        <p><br><small>8-12 symbols long, letters and numbers only.</small></p>
                        <div class="clearfix"></div>

                        <!-- Password confirmation-->
                        <div class="form-group col-lg-4">
                            <label for="pwd_match">Please confirm your password *</label>
                            <input type="password" name="password_match" id="pwd_match" class="form-control" required=""
                                   data-parsley-trigger="keyup" data-parsley-minlength="8" data-parsley-maxlength="12"
                                   data-parsley-minlength-message="Enter at least 8 characters"
                                   data-parsley-validation-threshold="1" data-parsley-equalto="#pwd">
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


<?php include 'footer.html' ?>
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
