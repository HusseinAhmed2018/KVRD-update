<?php get_header(); ?>

<?php // Show the selected project content.
if (have_posts()) :
    while (have_posts()) : the_post();
?>

        <section class="projects1 position-relative d-flex justify-content-center background" id="firstSection">
            <p class="white">OUR PROJECTS</p>

        </section>
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
        <section class="projects2 position-relative" id="firstProject">
            <img src="<?= $image; ?>" alt="" class="outerImg">

            <!--<div class="projectImg text-center">-->
            <!--</div>-->
            <div class="magnification position-absolute text-center">
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
                <div class="d-flex justify-content-center popUpImg img-centered col-6">
                    <img src="" alt="">
                </div>
            </div>
            <img src="<?= $logo;?>" alt="" class="upperImg">
        </section>
        <?php } ?>


<?php
    endwhile;
endif;

?>


<?php get_footer(); ?>