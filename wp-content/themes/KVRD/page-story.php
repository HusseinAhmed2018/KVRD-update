<?php get_header(); ?>

<?php // Show the selected storypage content.
if (have_posts()) :
    while (have_posts()) : the_post();
        ?>

        <section class="position-relative our-story" id="firstSection"
                 style="background-image: url('<?= get_template_directory_uri() . '/asset/images/our-story.jpg';?>'); background-size: cover">

            <!--<img class="header-img" src="images/our-story.jpg">-->
            <div class="header-text">
                <p class="text-uppercase title">our story</p>
                <p class="sub-title">GET TO KNOW US</p>
                <p><?= get_post_meta($post->ID, 'description1', true); ?></p>
            </div>

        </section>
        <section class="gray-bg">
            <div class="img-text d-lg-flex justify-content-center">
                <div class="img img-centered align-self-center height-360 col-lg-5 on-top mg-right-minus">
                    <img src="<?= get_template_directory_uri() . '/asset/images/our-story-1.jpg'; ?>">
                </div>
                <div class="text col-lg-7">
                    <p class="text-uppercase title f-28">What <br> makes us unique?</p>
                    <p class="f-18"><?= get_post_meta($post->ID, 'description2', true); ?></p>
                </div>
            </div>
        </section>
        <section
                style="background-image: url('<?= get_template_directory_uri() . '/asset/images/our-story-2.png'; ?>'); background-position: center; background-size: cover">
            <div class="img-text d-lg-flex">
                <div class="text col-lg-5">
                    <p class="text-uppercase title f-28 m-b-20">YOUR STRATEGIC PARTNER IN GROWTH</p>
                    <p class="f-18"><?= get_post_meta($post->ID, 'description3', true); ?></p>
                </div>
            </div>
        </section>
    <?php
    endwhile;
endif;
?>


<?php get_footer(); ?>