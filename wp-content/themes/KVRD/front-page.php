<?php get_header(); ?>
<?php // Show the selected frontpage content.
if (have_posts()) :
    while (have_posts()) : the_post();
        ?>
        <section class="home-1 position-relative text-center" id="firstSection">
            <?php $id = get_post_meta($post->ID, 'upload')[0];
            $det = get_post_mime_type($id);
            $mime = explode('/', $det);
            $link = get_post_meta($post->ID, 'link')[0];
            //            var_dump($link);
            //            die();
            $url = wp_get_attachment_url($id);?>

            <div id="my-video" class="myVideo" style="display: none">
                <?php
                if($link != ''){
                    ?>
                    <div style="width:100%;height:100%">
                        <embed src="<?=$link;?>?autoplay=1&amp;hl=en_US&amp;rel=0&amp;autohide=1&amp;controls=0&amp;showinfo=0&loop=1" wmode="transparent" type="application/x-shockwave-flash" width="100%" height="100%" allowfullscreen="true" title="Adobe Flash Player">
                    </div>
                <?php }else{?>
                    <video muted class="myVideo" id="myVideo">
                        <source src="<?=$url; ?>" type="video/mp4">
                        Your browser does not support HTML5 video.
                    </video>
                <?php }?>
            </div>

            <div id="image">
                <img src="<?= $url; ?>">
                <div class="position-absolute play">
                    <a href="#" id="myBtn" onclick="myFunction()">
                        <i class="far fa-play-circle"></i>
                    </a>
                </div>
            </div>
        </section>

        <?php
        $slide_args = array(
            'post_type' => 'slider',
            "order" => 'ASC',
            "orderby" => "menu_order ID",
        );

        $slide = get_posts($slide_args);

        ?>

        <section class="home-2 d-flex justify-content-center align-items-center">
            <div class="sliderContainer d-flex align-items-center">
                <div class="swiper-container home-slider">
                    <div class="swiper-wrapper">
                        <?php foreach ($slide as $slide) {
                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($slide->ID), 'full');
                            ?>

                            <div class="swiper-slide knowledge"
                                 style="background-image: url('<?= $image[0]; ?>');">
                                <div class="aroundSlider">
                                    <div class="d-flex justify-content-center inAround">
                                        <p class="aperturaMedium"><?= $slide->post_title; ?></p>
                                        <p class="f-13"><?= $slide->post_content; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                </div>
            </div>
        </section>

        <section class="white-bg">
            <div class="img-text d-lg-flex justify-content-start no-gutters pl-lg-0 pb-lg-0">
                <div class="img img-centered col-lg-8" style="margin-right: -15%">
                    <?php
                    $title = get_post_meta($post->ID, 'title', true);

                    $title1 = explode('/', $title);

                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                    ?>
                    <img src="<?= $image[0]; ?>">
                </div>
                <div class="text col-lg-6 align-self-center height-450 on-top">
                    <p class="text-uppercase title f-28"><span style="color: #306f87;"><?=$title1[0];?> <br> <?=$title1[1];?></span> <?=$title1[2];?>
                    </p>
                    <p class="f-18"><?= get_post_meta($post->ID, 'text', true); ?></p>
                </div>
            </div>
        </section>
    <?php
    endwhile;
endif; ?>

    <section class="home-4">
        <div class="clearfix">
            <?php
            $project_args = array(
                'post_type' => 'projects',
                "order" => 'DESC',
                "posts_per_page" => 2
            );
            $projects = get_posts($project_args);
            foreach ($projects as $project){
                $image = wp_get_attachment_image_src(get_post_thumbnail_id($project->ID), 'full')[0];
                ?>
                <div class="singleImg">
                    <img src="<?= $image; ?>" alt="" class="outerImg">
                    <div class="projectName">
                        <p class="MyriadPro-Regular f-18 firstName"><?=$project->post_title;?></p>
                    </div>
                    <div class="magnification position-absolute text-center d-none">
                        <div class="aroundMagnifier d-flex justify-content-center align-items-center">
                            <a href="#" class="fas fa-search-plus white f-28"></a>
                        </div>
                        <p>
                            <a href="<?=get_post_permalink( $project->ID)?>#description" class="f-11">DESCRIPTION</a>
                            <span class="sep">/</span>
                            <a href="<?=get_post_permalink( $project->ID)?>#location" class="f-11">LOCATION</a>
                            <span class="sep">/</span>
                            <a href="<?=get_post_permalink( $project->ID)?>#plan" class="f-11">FLOOR PLAN</a>
                            <span class="sep">/</span>
                            <a href="<?=get_post_permalink( $project->ID)?>#gallery" class="f-11">PHOTO GALLERY</a>
                        </p>
                    </div>
                    <div class="popUp2">
                        <a href="#" class="white closeMyPopup"> X </a>

                        <div class="d-flex justify-content-center popUpImg img-centered col-6">

                            <img src="<?= get_template_directory_uri() . '/asset/images/overlap.jpg'; ?>" alt=""
                                 class="outerImg">

                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
        <a href="<?php echo get_page_link(6); ?>" class="f-28 text-center footer">
            <span>OUR</span>
            <span class="aperturaMedium">PROJECTS</span>
        </a>
    </section>

<?php get_footer(); ?>