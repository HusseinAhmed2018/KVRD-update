<?php get_header(); ?>

<?php // Show the selected beyond content.
if (have_posts()) :
    while (have_posts()) : the_post();

?>

        <section class="position-relative essence" id="firstSection" style="background-image: url('<?= get_template_directory_uri() . '/asset/images/essence.jpg';?>'); background-size: cover">
            <!--<img class="header-img" src="images/our-story.jpg">-->
            <div class="header-text w-75" style="line-height: 1">
                <p class="text-uppercase title">T H E</p>
                <p class="text-uppercase title">E S S E N C E</p>
                <p class="text-uppercase title">B E Y O U N D</p>
                <div class="row pt-5">
                    <div class="col-lg-6">
                        <p class="text-uppercase f-30 sub-title">
                            K V R D &ensp; N A M E
                        </p>
                        <p class="text-uppercase f-30 sub-title">
                            I N S P I R A T I O N .
                        </p>

                    </div>
                    <div class="col-lg-6">
                        <p>Originaly the name KVRD was not just a name that outlines the
                            company, it also represents all our values, mission and vision, It has
                            become our fingerprint in the real-estate world.
                        </p>
                        <p class="text-uppercase pt-4">K &ensp; Knowledge</p>
                        <p class="text-uppercase">V &ensp; Vision</p>
                        <p class="text-uppercase">R &ensp; Research</p>
                        <p class="text-uppercase">D &ensp; Development</p>
                    </div>
                </div>
                <!--<p class="col-lg-6 m-auto f-28 gray-text">To become a unique real estate developer, renowned for developing
                    innovative concepts that stand out in every
                    sector, while becoming the first choice residence for our clients.</p>-->
            </div>

        </section>
        <section class="gray-bg">
            <div class="img-text d-lg-flex justify-content-end pr-lg-0">
                <?php
                    $det = get_post_meta($post->ID, 'title1', true);
                    $title1 = explode('/', $det);
                    $letter1 = $title1[0][0];
                ?>
                <div class="text col-lg-5 align-self-center height-360 on-top mg-right-minus large p-lg-0 d-flex flex-column justify-content-center">
                    <p class="text-uppercase text-center title white f-30"><?=$title1[0]?></p>
                    <p class="text-uppercase text-center title large white f-30"><?=$letter1;?></p>
                    <p class="text-uppercase text-center title white f-30"><?=$title1[1]?></p>
                </div>
                <div class="img img-centered col-lg-7">
                    <img src="<?= get_template_directory_uri() . '/asset/images/essence-1.png'?>">
                    <p class="text-over-img position-absolute"><?= get_post_meta($post->ID, 'description1', true); ?></p>
                </div>
            </div>
        </section>
        <section style="background-image: url('<?= get_template_directory_uri() . '/asset/images/essence-2.jpg';?>'); background-position: center; background-size: cover">
            <?php
            $det = get_post_meta($post->ID, 'title2', true);
            $title2 = explode('/', $det);
            $letter2 = $title2[0][0];
            ?>
            <div class="row no-gutters justify-content-center" style="padding: 180px 5% 320px 5%;">
                <div class="col-lg-3 text-center align-self-center" style="line-height: 1">
                    <p class="text-uppercase title white f-30"><?=$title2[0]?></p>
                    <p class="text-uppercase title white large" style="font-size: 100px"><?=$letter2;?></p>
                    <p class="text-uppercase title white f-30"><?=$title2[1]?></p>
                </div>
                <div class="col-lg-6">
                    <p class="f-22 white"><?= get_post_meta($post->ID, 'description2', true); ?></p>
                </div>
            </div>
        </section>
        <section class="white-bg">
            <?php
            $det = get_post_meta($post->ID, 'title3', true);
            $title3 = explode('/', $det);
            $letter3 = $title3[0][0];
            ?>
            <div class="img-text d-lg-flex justify-content-start pl-lg-0">
                <div class="img img-centered col-lg-7  mg-right-minus large ">
                    <img src="<?= get_template_directory_uri() . '/asset/images/essence-3.jpg';?>">
                    <p class="text-over-img position-absolute white"><?= get_post_meta($post->ID, 'description3', true); ?></p>
                </div>
                <div class="text col-lg-5 align-self-center height-360 on-top p-lg-0 d-flex flex-column justify-content-center">
                    <p class="text-uppercase text-center title white f-30"><?=$title3[0]?></p>
                    <p class="text-uppercase text-center title large white f-30"><?=$letter3;?></p>
                    <p class="text-uppercase text-center title white f-30"><?=$title3[1]?></p>
                </div>
            </div>
        </section>
        <section style="background-image: url('<?= get_template_directory_uri() . '/asset/images/essence-4.jpg';?>'); background-position: center; background-size: cover">
            <?php
            $det = get_post_meta($post->ID, 'title4', true);
            $title4 = explode('/', $det);
            $letter4 = $title4[0][0];
            ?>
            <div class="row no-gutters justify-content-start" style="padding: 350px 5% 50px 5%">
                <div class="col-lg-3 text-center align-self-center" style="line-height: 1">
                    <p class="text-uppercase title white f-30"><?=$title4[0]?></p>
                    <p class="text-uppercase title white large" style="font-size: 100px"><?=$letter4;?></p>
                    <p class="text-uppercase title white f-30"><?=$title4[1]?></p>
                </div>
                <div class="col-lg-6">
                    <p class="f-22 white"><?= get_post_meta($post->ID, 'description4', true); ?></p>
                </div>
            </div>
        </section>
<?php
    endwhile;
endif;
?>


<?php get_footer(); ?>