<?php get_header();
if (have_posts()):
    while (have_posts()) : the_post();
        $id = get_the_ID();
        $map = get_post_meta($id, 'loc')[0];

        for ($i = 0; $i < sizeof(get_post_meta($id, 'photo_gallery')); $i++) {

            $images [] = get_post_meta($id, 'photo_gallery')[$i]['guid'];
            $lg_img[] = pods_image_url($images [$i], 'medium', 0, '', true);
        }

        for ($i = 0; $i < sizeof(get_post_meta($id, 'construction_progress')); $i++) {

            $images2 [] = get_post_meta($id, 'construction_progress')[$i]['guid'];
            $con_pro_img[] = pods_image_url($images2 [$i], 'medium', 0, '', true);
        }
//        var_dump($lg_img);
//        echo '<hr>';
//        var_dump($sm_img);

        $back_image = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'full')[0];

        $project_image = get_post_meta($id, 'project_image')[0]['guid'];
        $title = get_post_meta($id, 'text_title');
        $text = get_post_meta($id, 'text');
        $excerpt = get_post_meta($id, 'project_excerpt');

        ?>

        <section style="background-image: url('<?= $project_image;?>'); background-size: cover; background-position: top;" class="firstSection forFixed">
            <div class="myContainer position-relative">
                <div class="mainColorBg position-absolute commonDiv">
                    <h1 class="white letter-4"><?php the_title();?></h1>
                    <div class="smallHr"></div>
                        <p class="f-18 white desc letter-4 twoLines col-10"><?=$excerpt[0]  ?></p>
                </div>
            </div>
        </section>

        <section class="projectPage p-ver-40">
            <div class="myContainer">
                <div class="clearfix d-flex flex-column d-md-block">
                    <p class="mainColor aperturaRegular rightBorder"><?=$title[0];?> </p>
                    <div class="smallHr mainColorBg"></div>
                    <p class="mainColor aperturaRegular target order-3"><?=$text[0]?></p>
                    <div class="projectImage centerImg-md">
                        <img src="<?= get_template_directory_uri().'/asset/images/bottomImg.png';?>" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!-- map -->
        <section class="map position-relative">
            <div id="googleMap" style="height: 100%">

            </div>
            <div class="myContainer">
                <div class="overMap mainColorBg">
                    <p class="f-lg aperturaRegular mb-2">
                        LOCATION
                    </p>
                    <p class="f-md aperturaRegular mb-4">
                        KVRD. California
                        34 Tesla, Ste 100
                        Irvine, Ca, USA 92618
                    </p>
                    <p class="aperturaBold f-md mb-2">
                        For and information:
                    </p>
                    <p class="f-md aperturaRegular">
                        +201093057429
                    </p>
                </div>
            </div>
        </section>
        <!--Floor Plan Section-->
        <section class="floorPlan text-center">
            <div class="myContainer">
                <span class="f-lg mainColor aperturaRegular letter-4">FLOOR PLAN</span>
                <div class="smallHr mainColorBg m-auto"></div>
                <p class="f-normal mainColor aperturaRegular letter-4">It is a long established fact that a reader will be
                    distracted by the readable content of a page when looking at
                    its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as
                    opposed to using ‘Content here, </p>
                <button class="mainColorBg f-normal">
                    Floor Plan
                </button>
                <button class="mainColorBg f-normal">
                    Brochure
                </button>
            </div>
        </section>
        <!--Photo Gallery-->
        <section class="position-relative gallery">
            <div class="grayBg position-absolute"></div>
            <div class="myContainer position-relative">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="galleryData">
                            <p class="f-lg aperturaRegular mainColor">PHOTO
                                GALLERY</p>
                            <a href="javascript:void(0)" class="d-block mainColor" data-index="1">
                                <i class="fas fa-caret-right"></i>Project design
                            </a>
                            <a href="javascript:void(0)" class="d-block" data-index="2">
                                construction progress
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9">

                        <div class="swiper-container design-slider gallerySlider slider-opened" data-index="1">
                            <div class="swiper-wrapper">
                                <?php
                                    foreach ($lg_img as $lg_image) {
                                ?>
                                <div class="swiper-slide">
                                    <div class="centerImg-md">
                                        <img src="<?= $lg_image ?>" alt="">
                                    </div>
                                </div>

                                <?php
                                }
                                ?>

                            </div>
                        </div>
                        <div class="swiper-container construction-slider gallerySlider" data-index="2">
                            <div class="swiper-wrapper">
                                <?php
                                foreach ($con_pro_img as $con_pro_img) {
                                ?>
                                <div class="swiper-slide">
                                    <div class="centerImg-md">
                                        <img src="<?= $con_pro_img;?>" alt="">
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev designBtn f-18 mainColor letter-4 common" data-index="1">PREVIOUS</div>
                    <div class="position-absolute designBtn f-18 sep lightGray common" data-index="1">/</div>
                    <div class="swiper-button-next designBtn f-18 mainColor letter-4 common" data-index="1">NEXT</div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev constructionBtn f-18 mainColor letter-4 common" data-index="2">PREVIOUS</div>
                    <div class="position-absolute constructionBtn f-18 sep lightGray common" data-index="2">/</div>
                    <div class="swiper-button-next constructionBtn f-18 mainColor letter-4 common" data-index="2">NEXT</div>
                </div>
            </div>
        </section>

        <section class="details">
            <div class="myContainer">
                <p class="aperturaRegular f-lg mainColor">More Details</p>
                <form id="message_Form" action="">
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <input id="name" type="text" placeholder="Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <input id="email" type="email" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group">
                            <input id="number" type="text" placeholder="Phone Number" class="form-control">
                        </div>
                        <button class="mainColorBg white">
                            Brochure
                        </button>
                    </div>
                </form>
            </div>
        </section>


    <?php
    endwhile;
endif;
?>


<!--    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCqQm3csno1ZhyxE0Ya7U6IKAe3Dot_EiM"></script>-->
    <script type="text/javascript">
        var myCenter = new google.maps.LatLng(<?=$map['lat']?>,<?=$map['lng']?>);

       function initialize() {
           var mapProp = {
               center: myCenter,
               zoom: 10,
               mapTypeId: google.maps.MapTypeId.ROADMAP
           };
           var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
           var marker = new google.maps.Marker({
               position: myCenter,
           });
           marker.setMap(map);
       }

       google.maps.event.addDomListener(window, 'load', initialize);
       (function () {
           var support = {transitions: Modernizr.csstransitions},
               // transition end event name
               transEndEventNames = {
                   'WebkitTransition': 'webkitTransitionEnd',
                   'MozTransition': 'transitionend',
                   'OTransition': 'oTransitionEnd',
                   'msTransition': 'MSTransitionEnd',
                   'transition': 'transitionend'
               },
               transEndEventName = transEndEventNames[Modernizr.prefixed('transition')],
               onEndTransition = function (el, callback) {
                   var onEndCallbackFn = function (ev) {
                       if (support.transitions) {
                           if (ev.target != this) return;
                           this.removeEventListener(transEndEventName, onEndCallbackFn);
                       }
                       if (callback && typeof callback === 'function') {
                           callback.call(this);
                       }
                   };
                   if (support.transitions) {
                       el.addEventListener(transEndEventName, onEndCallbackFn);
                   }
                   else {
                       onEndCallbackFn();
                   }
               };
       })();
    </script>
    <script type="text/javascript">
        $(function() {

            $('#message_Form').click(function (e) {
                e.preventDefault();
                var name        = $( "#name" ).val();
                var email       = $( "#email" ).val();
                var number      = $( "#number" ).val();

                var errors = [];

                if(email == ''){
                    errors.push("email its required");
                }else {
                    var atpos = email.indexOf("@");
                    var dotpos = email.lastIndexOf(".");
                    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {
                        errors.push('Not a valid e-mail address!');
                    }
                }

                if(number == ''){
                    errors.push('number its required!');
                }else{
                    if(isNaN(number) == true){
                        errors.push('invalid number only contain number!');
                    }else{
                        if(number.length < 8 || number.length >15){
                            errors.push('valid number must be between 8 and 15 numbers !');
                        }
                    }
                }

                if(name == ''){
                    errors.push("please type your name");
                }

                if(errors != ''){
                    $('#alert_danger').empty();

                    for (i = 0; i < errors.length; i++) {

                        $('#alert_danger').append('<div id="danger' + i + '" class="alert alert-danger text-center"></div>');
                        $("#danger" + i).append('<strong>Error!</strong> ' + errors[i]);

                    }

                    $("#alert_danger").fadeTo(9000, 9000).slideUp(9000, function () {
                        $("#alert_danger").slideUp(9000);
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
                            name: name,
                            number: number,
                        },
                        success: function (data) {
                            console.log(data);
                            error = data[0].error;
                            success = data[0].success;

                            if (data[0].error != '') {
                                $('#alert_danger').empty();

                                for (i = 0; i < data.length; i++) {
                                    // console.log(data[i].error);

                                    $('#alert_danger').append('<div id="danger' + i + '" class="alert alert-danger text-center"></div>');
                                    $("#danger" + i).append('<strong>Error!</strong> ' + data[i].error);

                                }

                                $("#alert_danger").fadeTo(9000, 9000).slideUp(9000, function () {
                                    $("#alert_danger").slideUp(9000);
                                });

                            } else {

                                $(".alert-success").fadeTo(9000, 9000).slideUp(9000, function () {
                                    $(".alert-success").slideUp(9000);
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


<?php get_footer(); ?>