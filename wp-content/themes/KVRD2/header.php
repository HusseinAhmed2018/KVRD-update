<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
    <script type="text/javascript" src="<?= get_template_directory_uri().'/asset/js/jquery-3.3.1.min.js';?>"></script>
    <script type="text/javascript" src="<?= get_template_directory_uri().'/asset/js/bootstrap.min.js';?>"></script>
    <script type="text/javascript" src="<?= get_template_directory_uri().'/asset/js/swiper.min.js';?>"></script>
    <script type="text/javascript" src="<?= get_template_directory_uri().'/asset/js/main.js';?>"></script>
    <script type="text/javascript" src="<?= get_template_directory_uri().'/asset/js/jquery.flexslider-min.js';?>"></script>

</head>
<body>
<header>
    <?php

    $facebook = get_post_meta(21,'facebook',true);
    $instagram = get_post_meta(21,'instagram',true);
    $twitter = get_post_meta(21,'twitter',true);
    $Linkedin = get_post_meta(21,'linkedin',true);

    ?>
    <div class="top">
        <div class="myContainer clearfix">
            <a href="">
                <img src="<?= get_template_directory_uri().'/asset/images/logo.png';?>" alt="" class="float-left logo">
            </a>

            <?php get_search_form(); ?>
        </div>
    </div>
    <hr>
    <div class="bottom">
        <div class="myContainer clearfix position-relative">
            <a href="javascript:(void(0))" class="float-left navIcon">
                <i class="fas fa-bars mainColor f-18"></i>
                <i class="fas fa-times f-20 mainColor mainHover closeSubMenu"></i>
            </a>
            <?php
            $args = array(
                'menu'  => 'main Menu',
                'container' => 'ul',
                'items_wrap' => '<ul class="float-left d-in-large">%3$s</ul>',

            );
            wp_nav_menu( $args );

            ?>
            <div class="chat mainColorBg float-right d-flex justify-content-center align-items-center position-absolute">
                <a href="">
                    <i class="fas fa-comment mr-1"></i>
                    LIVE CHAT
                </a>
            </div>
        </div>
    </div>

</header>
<div class="responsiveMenu whiteBg position-fixed">
    <div class="px-4">
        <?php
        $args = array(
            'menu'  => 'side Menu',
            'container' => 'ul',
            'items_wrap' => '<ul >%3$s</ul>',

        );
        wp_nav_menu( $args );

        ?>

    </div>
</div>
<div class="alert alert-success text-center" style="display: none; position: fixed;z-index: 100000;">
    <strong>Success!</strong> This alert box could indicate a successful or positive action.
</div>
<div id="alert_danger" class="wrongEmail alert-danger text-center" style="display: none; position: fixed;z-index: 100000; min-width: 29%">

</div>
