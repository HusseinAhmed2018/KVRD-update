<?php get_header(); ?>

<?php // Show the selected media content.
if (have_posts()) :
    while (have_posts()) : the_post();
?>

        <section class="position-relative" id="firstSection">
            <img class="header-img" src="<?= get_template_directory_uri() . '/asset/images/media-center.png';?>">

        </section>

        <?php

            $query_images_args = array(
                'post_type' => 'gallery',
                'posts_per_page' => 1,
            );
            $media = get_posts($query_images_args)[0];

            $images = array();

            for ($i = 0; $i < sizeof(get_post_meta($media->ID, 'upload')); $i++) {

                $images [] = get_post_meta($media->ID, 'upload')[$i]['guid'];

            }

            $all = get_post_meta($media->ID, 'upload');

        ?>

        <section class="photos padded gray-bg">
            <p class="f-30 text-center mb-5 text-uppercase">Photo Gallery</p>
            <div class="images clearfix">
                <?php for ($i = 0; $i < 6; $i++) { ?>

                    <div class="img col-lg-4 col-md-6 col-12 h-lg float-left">
                        <img src="<?= $images[$i];?>" data-index="0">
                    </div>
                    <div class="img col-lg-8 col-md-6 col-12 h-md float-right">
                        <img src="<?= $images[++$i];?>" data-index="1">
                    </div>
                    <div class="img col-lg-4 col-md-6 col-12 h-lg float-right">
                        <img src="<?= $images[++$i];?>" data-index="3">
                    </div>
                    <div class="img col-lg-4 col-md-6 col-12 h-sm">
                        <img src="<?= $images[++$i];?>" data-index="2">
                    </div>
                    <div class="img col-lg-4 col-md-6 col-12 h-md float-left">
                        <img src="<?= $images[++$i];?>" data-index="4">
                    </div>
                    <div class="img col-lg-4 col-md-6 col-12 h-md">
                        <img src="<?= $images[++$i];?>" data-index="5">
                    </div>

                <?php } ?>
            </div>

            <div class="pop-up f-30">
                <div class="swiper-container photo-slider">
                    <div class="swiper-wrapper">
                        <?php foreach ($all as $all) { ?>

                            <div class="swiper-slide swiper-slide-active row justify-content-center">
                                <div class="col-lg-4 img-centered">
                                    <img src="<?= $all['guid']?>">
                                </div>
                                <div class="text col-lg-4">
                                    <p>Title</p>
                                    <p><?=$all['post_title']?></p>
                                </div>
                            </div>

                        <?php } ?>
                    </div>

                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                </div>
            </div>
        </section>

        <?php

            $query_video_args = array(
                'post_type' => 'test',
                'posts_per_page' => -1,
            );
            $video_media = get_posts($query_video_args);

        ?>

        <section class="videos padded white-bg">
            <p class="f-30 text-center mb-5 text-uppercase">Video Gallery</p>
            <div class="row">
            <?php foreach ($video_media as $videos) {
                $id = $videos->ID;
                $image = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'full');
                $video = get_post_meta($id, 'media');

            ?>
                <div class="video col-lg-3 col-md-6 col-12 position-relative">
                    <div class="img-centered">
                        <img src="<?= $image[0];?>">
                        <div class="position-absolute play white">
                            <i class="far fa-play-circle" data-url="<?=$video[0]['guid'];?>"></i>
                        </div>
                    </div>
                </div>
            <?php }?>
            </div>

            <div class="pop-up">
                <div class="h-100 d-flex justify-content-center">
                    <video muted loop class="myVideo" id="myVideo">
                        <source src="images/small.webm" type="video/mp4">
                        Your browser does not support HTML5 video.
                    </video>
                </div>
            </div>

        </section>

        <?php

            $query_press_args = array(
                'post_type' => 'press',
                'posts_per_page' => -1,
            );
            $press = get_posts($query_press_args);


        ?>

        <section class="press-release gray-bg padded">
            <p class="f-30 text-center mb-5 text-uppercase">Press Releases</p>
            <div class="swiper-container press-slider">
                <div class="swiper-wrapper">
                <?php foreach ($press as $press) {

                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($press->ID), 'full');
                    $no_of_photo = sizeof(get_post_meta($press->ID, 'gallery'));
                    $date = get_the_date( 'F Y', $press->ID );
                ?>
                    <div class="swiper-slide">
                        <div class="img-centered">
                            <img src="<?= $image[0]?>">
                            <div class="hover">
                                <p class="f-18 text-uppercase"><?=$press->post_title;?></p>
                                <p>in <?=$date;?> - <?=$no_of_photo;?> Photos</p>
                                <p><?=$press->post_excerpt;?> <span class="lightColor">Read more</span></p>
                            </div>
                        </div>
                    </div>
                <?php }?>

                </div>
            </div>
            <div class="arrows d-flex justify-content-between">
                <div class="swiper-button-prev"><i class="fa fa-long-arrow-alt-left"></i></div>
                <div class="swiper-button-next"><i class="fa fa-long-arrow-alt-right"></i></div>
            </div>
        </section>
<?php
    endwhile;
endif;
?>


<?php get_footer(); ?>