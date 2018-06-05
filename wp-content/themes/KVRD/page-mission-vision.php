<?php get_header();?>

<?php // Show the selected Mission content.
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
?>
        <section class="position-relative mission" id="firstSection" style="background-image: url('<?= get_template_directory_uri().'/asset/images/mission-1.jpg';?>'); background-size: cover;">

            <!--<img class="header-img" src="images/our-story.jpg">-->
            <div class="header-text text-center w-75">
                <p class="text-uppercase title large"><?= get_post_meta($post->ID, 'title1', true); ?></p>
                <p class="col-lg-6 m-auto f-28 gray-text"><?= get_post_meta($post->ID, 'description1', true); ?></p>
            </div>
        </section>

    <section class="white-bg">
        <div class="img-text d-lg-flex justify-content-center">
            <div class="img img-centered col-lg-8 mg-right-minus large">
                <img src="<?= get_template_directory_uri().'/asset/images/mission-vision-1.jpg'?>">
            </div>
            <div class="text col-lg-5 align-self-center height-360 on-top">
                <p class="text-uppercase text-center title large white"><?= get_post_meta($post->ID, 'title2', true); ?></p>
                <p class="f-22"><?= get_post_meta($post->ID, 'description2', true); ?></p>
            </div>
        </div>
    </section>
<?php
    endwhile;
endif; ?>

<?php get_footer(); ?>