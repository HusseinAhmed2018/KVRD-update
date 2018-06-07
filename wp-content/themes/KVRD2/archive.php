<?php get_header(); ?>

<?php // Show the selected project content.
if (have_posts()) :

    $name = get_queried_object()->name;
    $terms = get_terms('project-type');
    $term_id = get_queried_object()->term_id;
    ?>
    <section
            style="background-image: url('<?= get_template_directory_uri() . '/asset/images/carrers.png'; ?>'); background-size: cover"
            class="firstSection ourProject forFixed">
        <div class="myContainer position-relative">
            <div class="mainColorBg position-absolute commonDiv">
                <h1 class="white letter-4"><?= strtoupper($name); ?> Projects</h1>
            </div>
        </div>
    </section>

    <section class="allProjects mrg-btm-lg">
        <div class="myContainer">
            <p class="text-center text-md-right mrg-btm-xg">
                <?php
                $numItems = count($terms);
                $i = 0;
                foreach ($terms as $term) {

                    ?>
                    <a href="<?= esc_url(get_term_link($term)); ?>"
                       class="aperturaMedium <?= (($term_id == $term->term_id) ? 'active' : '') ?>"><?= $term->name; ?></a>
                    <?php
                    if (++$i != $numItems) {
                        ?>
                        <span class="sep">|</span>
                        <?php
                    }
                }
                ?>

            </p>
            <?php

            $project_args = array(
                'post_type' => 'projects',
                "order" => 'ASC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'project-type',
                        'terms' => $term_id
                    )
                )
            );
            $projects = get_posts($project_args);

            foreach ($projects as $project) {
                $image = wp_get_attachment_image_src(get_post_thumbnail_id($project->ID), 'full')[0];
                $logo = get_post_meta($project->ID, 'logo')[0]['guid'];
                $excerpt = get_post_meta($project->ID, 'project_excerpt');
                ?>
                <div class="singleProject clearfix position-relative mrg-btm-lg">
                    <div class="col-md-9 image centerImg-md p-0">
                        <img src="<?= $image; ?>" alt="">
                    </div>
                    <div class="mainColorBg commonDiv float-right">
                        <div class="projectLogo m-auto">
                            <img src="<?= $logo; ?>" alt="">
                            <p class="aperturaRegular text-uppercase desc">
                                <?= $excerpt[0] ?>
                            </p>
                            <div class="text-center">
                                <a href="<?= get_post_permalink($project->ID) ?>"
                                   class="aperturaRegular d-inline-block">MORE</a>
                            </div>
                        </div>

                    </div>
                </div>
            <?php } ?>

        </div>

    </section>

<?php

endif;

?>


<?php get_footer(); ?>
