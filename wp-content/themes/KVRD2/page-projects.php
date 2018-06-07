<?php get_header(); ?>

<?php // Show the selected project content.
if (have_posts()) :
    while (have_posts()) : the_post();

        $terms = get_terms('project-type');

        ?>
        <section
                style="background-image: url('<?= get_template_directory_uri() . '/asset/images/carrers.png'; ?>'); background-size: cover"
                class="firstSection ourProject forFixed">
            <div class="myContainer position-relative">
                <div class="mainColorBg position-absolute commonDiv">
                    <h1 class="white letter-4">Our
                        Projects</h1>
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
                        <a href="<?= esc_url(get_term_link($term)); ?>" class="aperturaMedium"><?= $term->name; ?></a>
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
                $postsPerPage = 2;
                $project_args = array(
                    'post_type' => 'projects',
                    'posts_per_page' => $postsPerPage,
                    "order" => 'ASC',
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
            <?php if ($projects->post_count <= 2) { ?>
                <button id="more" class="commonButton white mainColorBg border-0 mx-auto aperturaRegular">
                    More
                </button><?php } ?>
        </section>
        <script>
            var ppp = 2;
            var pageNumber = 1;

            $('#more').click(function () {
                pageNumber++;
                var str = '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax';

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: ajaxurl,
                    data: str,
                    success: function (data) {

                        $('.allProjects .myContainer').append(data.out);
                        if (data.t == false) {
                            $('#more').css("display", "none");
                        }
                    }
                });
            });
        </script>


    <?php
    endwhile;
endif;

?>


<?php get_footer(); ?>