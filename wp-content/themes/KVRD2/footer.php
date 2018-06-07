<footer>
    <div class="top ">
        <div class="myContainer d-lg-flex align-items-center justify-content-between">
            <div class="footerElem clearfix">
                <a href="">
                    <img src="<?= get_template_directory_uri() . '/asset/images/logo.png'; ?>" alt=""
                         class="float-left logo">
                </a>
            </div>
            <div class="footerElem ">
                <!--                <p class="f-18 font-weight-bold white">OUR LOCATION</p>-->
                <!--                <div class="smallHr mt-3 mb-2"></div>-->
                <!--                <p class="f-12 white">KVRD. California-->
                <!--                    34 Tesla, Ste 100-->
                <!--                    Irvine, Ca, USA 9261</p>-->
            </div>
            <div class="footerElem ">
                <p class="f-18 font-weight-bold white">OUR LOCATION</p>
                <div class="smallHr mt-3 mb-2"></div>
                <p class="f-12 white">KVRD. California
                    34 Tesla, Ste 100
                    Irvine, Ca, USA 9261</p>
            </div>

            <div class="footerElem ">
                <p class="f-18 font-weight-bold white">Email Us</p>
                <div class="smallHr mt-3 mb-2"></div>
                <p class="f-12 white">kvrd@wearekvrd.com</p>
            </div>
            <div class="d-inline-block footerElem ">
                <p class="f-18 font-weight-bold white">FOR NEWSLETTER</p>
                <div class="smallHr mt-3 mb-2"></div>

                <form action="" class="position-relative">
                    <input id="news_email" type="text" placeholder="your email" class="letter-4 border-0">
                    <button id="idForm" class="position-absolute border-0 ">
                        <i class="fas fa-arrow-right white"></i>
                    </button>
                </form>


            </div>
        </div>
    </div>
    <?php

    $facebook = get_post_meta(21,'facebook',true);
    $instagram = get_post_meta(21,'instagram',true);
    $twitter = get_post_meta(21,'twitter',true);
    $Linkedin = get_post_meta(21,'linkedin',true);

    ?>
    <div class="bottom mainColorBg">
        <div class="myContainer clearfix">
            <span class="float-md-left d-block white f-12">© 2018 Envoy. All Rights Reserved.</span>
            <div class="socialIcons float-md-right d-inline-block">
                <a href="<?=$Linkedin;?>" class="">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="<?=$instagram;?>" class="">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="<?=$twitter;?>" >
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="<?=$facebook;?>" class="">
                    <i class="fab fa-facebook-square"></i>
                </a>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript">
    $(function () {

        $('#idForm').click(function (e) {
            e.preventDefault();
            var email = $("#news_email").val();

            if (email == '') {
                $('#alert_danger').empty();

                $('#alert_danger').append('<div id="danger" class="alert alert-danger text-center"></div>');
                $("#danger").append('<strong>Error!</strong> ' + 'enter your E-mail');

                $("#alert_danger").fadeTo(9000, 9000).slideUp(9000, function () {
                    $("#alert_danger").slideUp(9000);
                });
            }
            else {
                $.ajax({
                    type: 'POST',
                    dataType: "json",
                    url: ajaxurl,
                    cache: false,
                    data: {"action": "news_letter", email: email},
                    success: function (data) {

                        // console.log(data[0].error);
                        error = data[0].error;
                        success = data[0].success;
                        console.log(data[0].error);

                        if (data[0].error != '') {

                            $('#alert_danger').empty();

                            $('#alert_danger').append('<div id="danger" class="alert alert-danger text-center"></div>');
                            $("#danger").append('<strong>Error!</strong> ' + error);

                            $("#alert_danger").fadeTo(9000, 9000).slideUp(9000, function () {
                                $("#alert_danger").slideUp(9000);
                            });
                        } else {
                            // console.log(data[0].success);
                            $('.wrongEmail').css('display', 'none');
                            $(".alert-success").fadeTo(20000, 50000).slideUp(50000, function () {
                                $(".alert-success").slideUp(50000);
                            });
                            $(".alert").html('<strong>Success!</strong> ' + success);

                        }

                    }
                });
            }

        });


    });
</script>
</body>
</html>