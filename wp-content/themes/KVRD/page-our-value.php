<?php get_header();?>

<?php // Show the selected value content.
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
?>
        <section class="value-1 position-relative d-flex background" id="firstSection">

            <p class="align-self-center white pageHead">
                <span class="d-block">OUR</span>
                <span class="d-block">VALUES</span>
            </p>
        </section>

        <section class="value-2">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">

                    <div class="valueContent">
                        <img src="<?= get_template_directory_uri().'/asset/images/excellence.png';?>" alt="" class="d-block m-t-8">
                        <p class="f-22 mainColor"><?= get_post_meta($post->ID, 'excellence', true); ?></p>
                        <p class="desc"><?= get_post_meta($post->ID, 'excellence-description', true); ?></p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">

                    <div class="valueContent">
                        <img src="<?= get_template_directory_uri().'/asset/images/innovation.png';?>" alt="" class="d-block">
                        <p class="f-22 mainColor"><?= get_post_meta($post->ID, 'innovation', true); ?></p>
                        <p class="desc"><?= get_post_meta($post->ID, 'innovation-description', true); ?></p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">

                    <div class="valueContent">
                        <img src="<?= get_template_directory_uri().'/asset/images/reliability.png';?>" alt="" class="d-block">
                        <p class="f-22 mainColor"><?= get_post_meta($post->ID, 'reliability', true); ?></p>
                        <p class="desc"><?= get_post_meta($post->ID, 'reliability-description', true); ?></p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">

                    <div class="valueContent">
                        <img src="<?= get_template_directory_uri().'/asset/images/empower.png';?>" alt="" class="d-block m-t-12">
                        <p class="f-22 mainColor"><?= get_post_meta($post->ID, 'empowerment', true); ?></p>
                        <p class="desc"><?= get_post_meta($post->ID, 'empowerment-description', true); ?></p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">

                    <div class="valueContent">
                        <img src="<?= get_template_directory_uri().'/asset/images/focus.png';?>" alt="" class="d-block">
                        <p class="f-22 mainColor"><?= get_post_meta($post->ID, 'research-focused', true); ?></p>
                        <p class="desc"><?= get_post_meta($post->ID, 'research-description', true); ?></p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">

                    <div class="valueContent">
                        <img src="<?= get_template_directory_uri().'/asset/images/futureFocus.png';?>" alt="" class="d-block">
                        <p class="f-22 mainColor"><?= get_post_meta($post->ID, 'future-focused', true); ?></p>
                        <p class="desc"><?= get_post_meta($post->ID, 'future-description', true); ?></p>
                    </div>
                </div>
            </div>
        </section>
<?php
    endwhile;
endif;
?>


<?php get_footer(); ?>