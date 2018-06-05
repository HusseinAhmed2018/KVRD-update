<?php get_header();
if (have_posts()):
    while (have_posts()) : the_post();
        $id = get_the_ID();
        $map = get_post_meta($id, 'loc')[0];

        for ($i = 0; $i < sizeof(get_post_meta($id, 'photo_gallery')); $i++) {

            $images [] = get_post_meta($id, 'photo_gallery')[$i]['guid'];
            $lg_img[] = pods_image_url($images [$i], 'medium', 0, '', true);
            $sm_img[] = pods_image_url($images [$i], 'small', 0, '', true);
        }
//        var_dump($lg_img);
//        echo '<hr>';
//        var_dump($sm_img);

        $back_image = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'full')[0];

        $floor = get_post_meta($id, 'floor_plan')[0]['guid'];

        ?>

        <section class="inner background"
                 style="background-image: url('<?= $back_image; ?>')">

        </section>
        <section>
            <div class="allInner">
                <div class="myContainer">
                    <ul class="d-md-flex d-block">
                        <li class="text-uppercase"><a href="#description">Description</a></li>
                        <li class="text-uppercase"><a href="#location">location</a></li>
                        <li class="text-uppercase"><a href="#plan">floor plans</a></li>
                        <li class="text-uppercase"><a href="#gallery">photo gallery</a></li>
                    </ul>
                </div>
            </div>
            <div id="description" class="innerDesc background d-flex  align-items-center"
                 style="background-image: url('<?= get_template_directory_uri() . '/asset/images/desc.jpg'; ?>')">
                <?php the_content(); ?>
            </div>
            <div class="location" id="location">
                <p class="aperturaBold innerText">
                    <span>
                        Location
                    </span>
                </p>
                <div id="googleMap" class="mapLocation">

                </div>
            </div>

            <div id="plan" class="floor clearfix" style="background-image: url('<?= get_template_directory_uri() . '/asset/images/inner1.jpg'; ?>')">

                <p class="aperturaBold innerText float-left">
                    <span>Floor </span>
                    <span>Plan</span>
                </p>
                <img src="<?= $floor;?>" alt="" class="d-inline-block float-right">

            </div>
            <div id="gallery" class="gallery">
                <p class="aperturaBold innerText">
                    <span>photo </span>
                    <span>gallery</span>
                </p>


                <div id="slider" class="flexslider">
                    <ul class="slides">
                        <?php
                            foreach ($lg_img as $lg_image) {
                        ?>
                            <li>
                                <img src="<?= $lg_image ?>"/>
                            </li>
                        <?php
                            }
                        ?>


                        <!-- items mirrored twice, total of 12 -->
                    </ul>
                </div>
                <div id="carousel" class="flexslider">
                    <ul class="slides">
                        <?php
                            foreach ($sm_img as $sm_image) {
                        ?>
                            <li>
                                <img src="<?= $sm_image ?>"/>
                            </li>
                        <?php
                            }
                        ?>
                        <!-- items mirrored twice, total of 12 -->
                    </ul>
                </div>

            </div>
        </section>

        <script type="text/javascript" charset=”utf-8″>
            // The slider being synced must be initialized first

            $(function() {
                // console.log($('#carousel'));
                $('#carousel').flexslider({
                    animation: "slide",
                    controlNav: false,
                    animationLoop: false,
                    slideshow: false,
                    itemWidth: 210,
                    // itemMargin: 5,
                    asNavFor: '#slider'
                });

                $('#slider').flexslider({
                    animation: "slide",
                    controlNav: false,
                    animationLoop: false,
                    slideshow: false,
                    sync: "#carousel"
                });
                $('.flex-next').empty();
                $('.flex-prev').empty();
            });

        </script>

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



<?php get_footer(); ?>