<!DOCTYPE html>
<html lang="en">

<<?php include 'header.html' ?>

<body>

<div class="brand">Best Friend Ever</div>
<div class="address-bar">Everything about dogs</div>

<<?php include 'navigation.php' ?>

<div class="container">

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">Contact
                    <strong>Best Friend Ever</strong>
                </h2>
                <hr>
            </div>
            <div class="col-md-8">
                <!-- Embedded Google Map using an iframe - to select your location find it on Google maps and paste the link as the iframe src. If you want to use the Google Maps API instead then have at it! -->
                <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>
            </div>
            <div class="col-md-4">
                <p>Phone:
                    <strong>718.477.3782</strong>
                </p>
                <p>Email:
                    <strong><a href="mailto:name@example.com">contact@bestfriendever.com</a></strong>
                </p>
                <p>Address:
                    <strong>811 Carolina Avenue
                        <br>Staten Island, NY 10314</strong>
                </p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">Contact
                    <strong>form</strong>
                </h2>
                <hr>
                <p class="text-center">Thank you for your interest in our web site!<br>
                    If you would like to ask a question or suggest a new topic, please fill out the following information.
                    We are happy to hear from you.
                    Please note your information is kept confidential and we will NOT sell or give your information to another party.
                </p>
                <br>
                <br>

                <!--for testing purpose only -->
                <!--                <div class="bs-callout bs-callout-warning hidden">-->
                <!--                    <h4>This form seems to be invalid!</h4>-->
                <!--                </div>-->
                <!---->
                <!--                <div class="bs-callout bs-callout-info hidden">-->
                <!--                    <h4>Yay! Everything seems to be ok.</h4>-->
                <!--                </div>-->


                <form id="contact" role="form" action="info.php" data-parsley-validate="" method="post">
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="name">Name *</label>
                            <input id="name" type="text" name="name" class="form-control" data-parsley-pattern="/^[a-zA-Z .'-]+$/i" required="">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="email">Email Address *</label>
                            <input id="email" type="email" name="email" class="form-control" data-parsley-type="email" required="">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="phone">Phone Number</label><span>&nbsp;(example: +1 555 555 5555)</span>
                            <input id="phone" type="text" name="phone" class="form-control"
                                   data-parsley-trigger='keyup' data-parsley-pattern="^\+(?:[0-9] ?){6,14}[0-9]$" >

                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group col-lg-12">
                            <label for="message">Message *</label>
                            <textarea id="message" class="form-control" rows="6" name="message" required=''
                                      data-parsley-trigger='keyup' data-parsley-maxlength='5000'
                                      data-parsley-maxlength-message='Your message is too large.' data-parsley-validation-threshold='1'></textarea>
                        </div>
                        <div class="form-group col-lg-12">
                            <input type="hidden" name="save" value="contact">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container -->


<!-- form validation script -->
<script type="text/javascript">
    $(function () {
        $('#contact').parsley().on('field:validated', function() {
            var ok = $('.parsley-error').length === 0;
            $('.bs-callout-info').toggleClass('hidden', !ok);
            $('.bs-callout-warning').toggleClass('hidden', ok);
        })
            .on('form:submit', function() {
                return true;
            });
    });
</script>

<?php include 'footer.html' ?>
<?php include 'Scripts.html' ?>

</body>

</html>
