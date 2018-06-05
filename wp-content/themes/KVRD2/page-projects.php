<?php get_header(); ?>

<?php // Show the selected project content.
if (have_posts()) :
    while (have_posts()) : the_post();
?>

        <section style="background-image: url('<?= get_template_directory_uri().'/asset/images/carrers.png';?>'); background-size: cover" class="firstSection ourProject">
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
                    <a href="#" class="aperturaMedium active">Commercial</a>
                    <span class="sep">|</span>
                    <a href="#" class="aperturaMedium">Residential</a>
                </p>
                <?php
                $project_args = array(
                    'post_type' => 'projects',
                    "order" => 'DESC',
                );
                $projects = get_posts($project_args);
                foreach ($projects as $project){
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($project->ID), 'full')[0];
                    $logo = get_post_meta($project->ID, 'logo')[0]['guid'];

                    ?>
                    <div class="singleProject clearfix position-relative mrg-btm-lg">
                        <div class="col-md-9 image centerImg-md p-0">
                            <img src="<?= $image; ?>" alt="">
                        </div>
                        <div class="mainColorBg commonDiv float-right">
                            <div class="projectLogo m-auto">
                                <img src="<?= $logo; ?>" alt="">
                                <p class="aperturaRegular text-uppercase desc">
                                    <?= $project->post_content;?>

                                </p>
                                <a href="<?=get_post_permalink( $project->ID)?>" class="aperturaRegular d-inline-block">MORE</a>
                            </div>

                        </div>
                    </div>
                <?php } ?>

                <button class="commonButton white mainColorBg border-0 mx-auto aperturaRegular">
                    More
                </button>

            </div>
        </section>


<?php
    endwhile;
endif;

?>


<?php get_footer(); ?>