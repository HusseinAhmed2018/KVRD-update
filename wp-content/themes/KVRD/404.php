<?php get_header()?>
    <section class="not-found background position-relative d-flex justify-content-center" id="firstSection" >
        <p class="align-self-center white">
            PAGE NOT FOUND
        </p>
    </section>

    <section class="not-found-2 d-flex justify-content-center align-content-center flex-wrap">
        <img src="<?= get_template_directory_uri().'/asset/images/404.jpg';?>" alt="" class="align-self-start">
        <p class="col-12 text-center">
            <span class="mainColor">OOPS, </span>
            <span class="gray">SOMETHING WENT WRONG!!</span>
        </p>
    </section>
<?php get_footer();?>