<?php get_header(); ?>

    <section class="position-relative" id="firstSection"
             style="background-image: url('<?= get_template_directory_uri() . '/asset/images/our-story.jpg'; ?>'); background-size: cover">

        <!--<img class="header-img" src="images/our-story.jpg">-->
        <div class="header-text">
            <p class="text-uppercase title">Search result for:</p>
            <p><?php the_search_query(); ?></p>
        </div>

    </section>
<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        get_template_part('content', get_post_format());
        if(has_post_thumbnail()){ $img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
            $image = $img[0];
//            var_dump($image);
        }else{
            $image = get_template_directory_uri() . '/asset/images/our-story-1.jpg';
        }
//        get_permalink()
    ?>
        <section class="gray-bg">
            <div class="img-text d-lg-flex justify-content-center">
                <div class="img img-centered align-self-center height-360 col-lg-5 on-top mg-right-minus">
                    <img src="<?= $image; ?>">
                </div>
                <div class="text col-lg-7">
                    <p class="text-uppercase title f-28"><?=$post->post_title;?></p>
                    <p class="f-18"><?= $post->post_content; ?></p>
                </div>
            </div>
        </section>
    <?php

    endwhile;

    echo paginate_links();

else : ?>
    <section class="gray-bg">
        <div class="img-text d-lg-flex justify-content-center">
            <div class="text col-lg-12">
                <p class="text-uppercase title f-28 text-center">No search result found</p>
            </div>
        </div>
    </section>
<?php
endif;

get_footer();

?>