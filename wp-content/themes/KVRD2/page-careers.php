<?php get_header(); ?>

<?php // Show the selected careers content.
if (have_posts()) :
?>

    <section style="background-image: url('<?= get_template_directory_uri().'/asset/images/carrers.png';?>'); background-size: cover" class="firstSection forFixed">
        <div class="myContainer position-relative">
            <div class="mainColorBg position-absolute commonDiv">
                <h1 class="white letter-4 text-uppercase">CAREERS</h1>
                <div class="smallHr"></div>
                <div class="row">
                    <p class="f-normal white desc letter-4 twoLines col-10">
                        It is a long established fact that a reader will be distracted by the readable content of a page when
                        looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution
                        of letters, as opposed to using ‘Content here, content here’, making it look like readable English. Many
                        desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a
                        search for ‘lorem ipsum’ will uncover many web sites still in their infancy. Various versions have
                        evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="p-ver-40">
        <div class="myContainer">
            <div class="row">
                <?php
                    $careers_args = array(
                        'post_type' => 'careers',
                        "order" => 'ASC',
                    );
                    $careers = get_posts($careers_args);
                    foreach ($careers as $career):
                        $excerpt = get_post_meta($career->ID, 'career_excerpt');
                ?>
                <div class="col-md-6 col-xl-4">
                    <div class="singleCarer">
                        <p class="f-big2 aperturaRegular letter-4"><?= $career->post_title;?></p>
                        <p class="aperturaRegular twoLines letter-4 explain f-normal"><?=$excerpt[0];?>.</p>
                        <a href="<?= get_post_permalink($career->ID);?>">
                        <button class="aperturaRegular border-0 commonButton">
                            Apply now
                        </button>
                        </a>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
            <button class="commonButton white mainColorBg mx-auto mt-20 border-0 moreCarers">
                More
            </button>
        </div>
    </section>
    <?php
    while (have_posts()) : the_post();
endwhile;
endif;
?>


<?php get_footer(); ?>