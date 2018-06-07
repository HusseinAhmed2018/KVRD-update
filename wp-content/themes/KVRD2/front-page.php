<?php get_header();

if (have_posts()) :
    while (have_posts()) : the_post();

        $id = get_post_meta($post->ID, 'upload')[0];
        $det = get_post_mime_type($id);
        $mime = explode('/', $det);
        $link = get_post_meta($post->ID, 'link')[0];
        $url = wp_get_attachment_url($id);
        $page_id = get_the_ID();
        $muted = get_post_meta($post->ID, 'muted')[0][0];

        if($muted == 'muted'){
            $muted = 'muted';
            $y_muted = '&mute=1';
        }

        $img_id = get_post_meta($post->ID, 'back-ground')[0];
        $back_image = wp_get_attachment_url($img_id);

?>
    <!--start video section-->
    <section class="home-1 position-relative forFixed">
        <?php
        if($link != ''){
            ?>
            <div style="width:100%;height:100%">
                <embed src="<?= $link; ?>?autoplay=1<?=$y_muted;?>&amp;hl=en_US&amp;rel=0&amp;autohide=1&amp;controls=0&amp;showinfo=0&loop=1"
                       wmode="transparent" type="application/x-shockwave-flash" width="100%" height="100%"
                       allowfullscreen="true" title="Adobe Flash Player">
            </div>
        <?php }else{?>
        <video <?=$muted;?> class="myVideo" id="myVideo">
            <source src="<?=$url; ?>" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
        <?php }?>
        <img src="<?= $back_image?>" alt="" class="forVideo">

        <div class="position-absolute play">
            <a href="#" id="myBtn">
                <i class="fas fa-play-circle"></i>
            </a>
        </div>
    </section>
    <!--end video section-->

    <!--start slider section-->
    <section class="mrg-top-xg mrg-btm-xg allWords">
        <div class="myContainer position-relative common-slider-btn">
            <div class="swiper-container home-first-slider ">
                <div class="swiper-wrapper">
                    <?php
                    $slide_args = array(
                        'post_type' => 'slider',
                        "order" => 'ASC',
                        "orderby" => "menu_order ID",
                    );

                    $slide = get_posts($slide_args);

                     foreach ($slide as $slide) {
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($slide->ID), 'full');
                        ?>
                        <div class="swiper-slide">
                                            <div class="imgWrapper">
                                                <img src="<?= $image[0]; ?>" alt="">
                                            </div>
                                            <div class="emptyDiv">
                                                <div class="absoluteDiv">
                                                    <p class="mainColor aperturaRegular singlechar">K</p>
                                                    <div class="mainColorBg around-Words">
                                                        <p class="head white letter-4 text-uppercase"><?= $slide->post_title; ?></p>
                                                        <div class="smallHr"></div>
                                                        <p class="white desc letter-4"><?= $slide->post_content; ?></p>
                                                        <button class="mainColor f-xmd border-0 letter-4 p-3 whiteBg">
                                                            READ MORE
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                    <?php } ?>
                </div>

            </div>
            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev allWordsbtn f-18 mainColor letter-4">PREVIOUS</div>
            <div class="position-absolute f-18 sep lightGray">/</div>
            <div class="swiper-button-next allWordsbtn f-18 mainColor letter-4">NEXT</div>
        </div>
    </section>
    <!--END Slider section-->

    <section class="home-unique d-flex position-relative">
        <div class="grayBg align-self-center">
            <div class="myContainer">
                <div class="uniqueWrapper">
                    <?php
                    $title = get_post_meta($post->ID, 'title', true);

                    $title1 = explode('/', $title);

                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                    ?>
                    <p class="text-uppercase f-lg mainColor"><?=$title = get_post_meta($post->ID, 'title', true);?></p>
                    <div class="smallHr mainColorBg d-none d-md-block"></div>
                    <div class="toChangePos">
                        <p class="f-md mainColor twoLines letter-4"><?= get_post_meta($post->ID, 'text', true); ?></p>
                        <button class="mainColor f-18 border-0 letter-4 p-3 whiteBg d-none d-md-block">
                            READ MORE
                        </button>
                    </div>
                    <div class="uniqueImg centerImg-md">
                        <img src="<?= $image[0]; ?>" alt="" >
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    endwhile;
endif;
?>.
    <!--start project slider -->
    <section class="mrg-hr-130 projectWrapper">
        <div class="myContainer  common-slider-btn position-relative">
            <div class="mrg-btm-xg">
                <p class="mainColor f-lg text-uppercase">OUR</p>
                <p class="mainColor f-lg text-uppercase">Projects</p>
            </div>
            <?php
            $project_args = array(
                'post_type' => 'projects',
                "order" => 'DESC',
                "posts_per_page" => 2
            );
            $projects = get_posts($project_args);
            ?>
            <div class="flexConatiner projects-slider">
                <div class="flexslider">
                    <ul class="slides">
                    <?php
                        foreach ($projects as $project) {
                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($project->ID), 'project-image')[0];
                    ?>
                        <li><img src="<?= $image; ?>" alt=""></li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
            <p class="text-uppercase mainColor f-lg finalName">SIDEWALK</p>
        </div>
    </section>
    <!--end project slider -->
<?php get_footer(); ?>