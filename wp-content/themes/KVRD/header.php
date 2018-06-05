<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--    <title>Title</title>-->
    <?php wp_head(); ?>
    <script type="text/javascript" src="<?= get_template_directory_uri().'/asset/js/jquery-3.3.1.min.js';?>"></script>
    <script type="text/javascript" src="<?= get_template_directory_uri().'/asset/js/bootstrap.min.js';?>"></script>
    <script type="text/javascript" src="<?= get_template_directory_uri().'/asset/js/swiper.min.js';?>"></script>
    <script type="text/javascript" src="<?= get_template_directory_uri().'/asset/js/jquery.flexslider-min.js';?>"></script>
    <script type="text/javascript" src="<?= get_template_directory_uri().'/asset/js/main.js';?>"></script>


    <style type="text/css">
        .current_page_item > a {
            color: white !important;
        }
        .sub-menu .current_page_item > a {
            color: #173b49 !important;
        }
    </style>
</head>
<body>
<header class="position-absolute">
    <div class="myContainer d-flex">
        <div class="logo">
            <a href="<?=home_url();?>">
                <img src="<?= get_template_directory_uri().'/asset/images/logo.png';?>" alt="">
            </a>
        </div>
        <?php

            $facebook = get_post_meta(21,'facebook',true);
            $instagram = get_post_meta(21,'instagram',true);
            $twitter = get_post_meta(21,'twitter',true);
            $Linkedin = get_post_meta(21,'linkedin',true);

        ?>
        <div class="content">
            <div class="socialIcons clearfix">
                <a href="<?=$Linkedin;?>" class="item d-flex justify-content-center align-items-center">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="<?=$instagram;?>" class="item d-flex justify-content-center align-items-center">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="<?=$twitter;?>" class="item d-flex justify-content-center align-items-center">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="<?=$facebook;?>" class="item d-flex justify-content-center align-items-center">
                    <i class="fab fa-facebook-f"></i>
                </a>

            </div>
            <hr>
            <div class="topBar d-flex justify-content-center">
                <div class="menu">

                    <?php
                    $args = array(
                        'menu'  => 'main',
                        'container' => 'ul',
                        'walker' => new WPDocs_Walker_Nav_Menu()
//                           'menu_class' => 'policyFooter liFooter displayInSmall',
                    );
                    wp_nav_menu( $args );

                    ?>
                </div>
                <?php get_search_form(); ?>

                <i class="<?=(( get_the_ID() == 21 )? 'current_page_item':'')?>">
                    <a href="<?php echo get_page_link( 21 ); ?>">CONTACT US</a>
                </i>
            </div>
        </div>
        <div class="side-menu">
            <i class="fa fa-bars f-22"></i>
            <div class="menu">

                <?php
                $args = array(
                    'menu'  => 'side Menu',
                    'container' => 'ul',
                    'items_wrap' => '<ul class="d-flex flex-column justify-content-around h-75 f-22">%3$s</ul>',
                    'walker' => new WPDocs_Walker_Nav_Menu(),
//                           'menu_class' => '',
                );
                wp_nav_menu( $args );

                ?>
            </div>
        </div>
    </div>



</header>
<div class="fixedDiv">
    <a href="<?=home_url();?>" class="d-block">
        <i class="fas fa-home"></i>
    </a>
    <a href="<?php echo get_page_link( 21 ); ?>" class="d-block">
        <i class="fas fa-comments"></i>
    </a>
</div>
<div class="alert alert-success text-center" style="display: none; position: fixed;z-index: 100000;">
    <strong>Success!</strong> This alert box could indicate a successful or positive action.
</div>
<div id="alert_danger" style="display: none; position: fixed;z-index: 100000; min-width: 29%">
    
</div>



