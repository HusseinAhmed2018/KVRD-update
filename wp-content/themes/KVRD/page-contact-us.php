<?php get_header();?>

<?php // Show the selected contactus content.
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        ?>
        <section class="contact-1 position-relative background" id="firstSection" >

        </section>

        <section class="contact-2 d-flex justify-content-center flex-wrap">
            <p class="f-30 contactHead text-center">
                <span class="firstSpan">MAKE</span>
                <span>QUICK CONTACT</span>
            </p>
            <div class="subContact">
                <div class="title">
                    <i class="fas fa-map-marker"></i>
                    <span class="f-13 aperturaMedium black">OUR LOCATION</span>
                </div>
                <span class="aperturaMedium"><?= get_post_meta($post->ID, 'location', true); ?></span>
            </div>
            <div class="subContact">
                <div class="title">
                    <i class="fas fa-phone"></i>
                    <span class="f-13 aperturaMedium black">TALK WITH US</span>
                </div>
                <span class="aperturaBold"><?= get_post_meta($post->ID, 'phone', true); ?></span>
            </div>
            <div class="subContact">
                <div class="title">
                    <i class="fas fa-envelope"></i>
                    <span class="f-13 aperturaMedium black">SEND YOUR WORDS</span>
                </div>
                <a href="#" class="aperturaMedium"><?= get_post_meta($post->ID, 'e-mail', true); ?></a>
            </div>
        </section>

        <section class="map" id="map">
            <?php gmwd_map( 1, 1); ?>
        </section>

        <section class="contact-4 background" id="contactForm">
            <p class="f-30 contactHead text-center">
                <span class="firstSpan">SEND YOUR</span>
                <span class="mainColor">MESSAGE</span>
            </p>
            <form action="" class="col-10 col-md-6">
                <div class="row">
                    <div class="col-md-6 p-0 input">
                        <input id="first_name" type="text" placeholder="First Name*" class="form-control aperturaMedium" required>
                    </div>
                    <div class="col-md-6 p-0 input">
                        <input id="last_name" type="text" placeholder="Last Name" class="form-control aperturaMedium" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 p-0 input">
                        <input id="email" type="email" placeholder="E-mail*" class="form-control aperturaMedium" required>
                    </div>
                    <div class="col-md-6 p-0 input">
                        <input id="number" type="text" placeholder="Contact Number" class="form-control aperturaMedium" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 p-0">
                        <textarea name="" id="message" rows="10" class="form-control aperturaMedium" placeholder="Your Message"></textarea>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button id="message_Form" class="f-13">
                        SEND MESSAGE
                    </button>
                </div>
            </form>
        </section>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(function() {

                $('#message_Form').click(function (e) {
                    e.preventDefault();
                    var first_name  = $( "#first_name" ).val();
                    var last_name   = $( "#last_name" ).val();
                    var email       = $( "#email" ).val();
                    var number      = $( "#number" ).val();
                    var message     = $( "#message" ).val();

                    var errors = [];

                    if(email == ''){
                        errors.push("email its required");
                    }

                    if(number == ''){
                        errors.push('number its required!');
                    }else{
                        if(number.length < 8 || number.length >15){
                            errors.push('Invalid number format!');
                        }
                    }

                    if(message == ''){
                        errors.push("message its empty");
                    }

                    if(first_name == ''){
                        errors.push("please type your name");
                    }

                    if(errors != ''){
                        $('#alert_danger').empty();

                        for (i = 0; i < errors.length; i++) {
                            // console.log(errors[i]);

                            $('#alert_danger').append('<div id="danger' + i + '" class="alert alert-danger text-center"></div>');
                            $("#danger" + i).append('<strong>Error!</strong> ' + errors[i]);

                        }

                        $("#alert_danger").fadeTo(2000, 5000).slideUp(5000, function () {
                            $("#alert_danger").slideUp(5000);
                        });
                    }

                    if(errors == '') {
                        $.ajax({
                            type: 'POST',
                            dataType: "json",
                            url: ajaxurl,
                            cache: false,
                            data: {
                                "action": "message",
                                email: email,
                                first_name: first_name,
                                last_name: last_name,
                                number: number,
                                message: message
                            },
                            success: function (data) {
                                // console.log(data[0].error);
                                error = data[0].error;
                                success = data[0].success;

                                if (data[0].error != '') {
                                    // $('#alert_danger').css('display', 'block');
                                    $('#alert_danger').empty();

                                    for (i = 0; i < data.length; i++) {
                                        // console.log(data[i].error);

                                        $('#alert_danger').append('<div id="danger' + i + '" class="alert alert-danger text-center"></div>');
                                        $("#danger" + i).append('<strong>Error!</strong> ' + data[i].error);

                                    }

                                    $("#alert_danger").fadeTo(2000, 5000).slideUp(5000, function () {
                                        $("#alert_danger").slideUp(5000);
                                    });

                                } else {

                                    $(".alert-success").fadeTo(2000, 5000).slideUp(5000, function () {
                                        $(".alert-success").slideUp(5000);
                                    });
                                    $(".alert").html('<strong>Success!</strong> ' + success);

                                    $( "#first_name" ).val('');
                                    $( "#last_name" ).val('');
                                    $( "#email" ).val('');
                                    $( "#number" ).val('');
                                    $( "#message" ).val('');
                                }
                            }
                        });
                    }
                });


            });
        </script>
    <?php
    endwhile;
endif;
?>


<?php get_footer(); ?>