<?php

function KVRD2_resources_style(){

    wp_enqueue_style('bootstrap', get_template_directory_uri().'/asset/css/bootstrap.min.css');
    wp_enqueue_style('swiper', get_template_directory_uri().'/asset/css/swiper.min.css');
    wp_enqueue_style('fontawesome', get_template_directory_uri().'/asset/css/fontawesome-all.min.css');
    wp_enqueue_style('reset', get_template_directory_uri().'/asset/css/reset.css');
    wp_enqueue_style('basics', get_template_directory_uri().'/asset/css/common.css');
    wp_enqueue_style('style', get_template_directory_uri().'/asset/css/style.css');
    wp_enqueue_style('flexslider', get_template_directory_uri().'/asset/css/flexslider.css');

}

add_action('wp_enqueue_scripts', 'KVRD2_resources_style');


#-------------------------SetUP-------------------------------
function KVRD_setup(){


    //Add featured image support
    add_theme_support('post-thumbnails');
    add_image_size('small-thumbnail',200, 300,array('left', 'top'), true); //size of image
    add_image_size('banner-image', 920,210, array('left', 'top')); //size of image and postion

}

add_action('after_setup_theme', 'KVRD_setup');

add_image_size('medium',907,705, true);
add_image_size('small',250, 100, true);

/**
 * ACF Google Map Custom Field.
 */

function my_acf_google_map_api( $api ){

    $api['key'] = 'AIzaSyChnW9yL0blmoJM1zQ98N9P5UXlStjtDDg';

    return $api;

}

#-----------------------------Menu------------------------------
function add_menu(){
    register_nav_menus(array(
        'main' => 'Main Menu',
        'side' => 'side Menu',
    ));

}
add_action('init', 'add_menu');

function nav_menu(){
    wp_nav_menu(array(
        'menu' => 'main',
        'container_class'      => false,
    ));
}

add_filter('nav_menu_css_class', 'menu_item_classes', 10, 4);
//mainHover

function menu_item_classes( $classes, $item, $args, $depth ) {

//    unset($classes);
    if ( 'main Menu' === $args->menu ) {
        $classes[] = 'text-uppercase d-inline-block head-padding';
    }

    return $classes;
}

#-----------------------------Mail------------------------
function wpse27856_set_content_type(){
    return "text/html";
}
add_filter( 'wp_mail_content_type','wpse27856_set_content_type' );

#----------------------------------AJax newsLetters -------------------------------

add_action("wp_ajax_news_letter", "news_letter_function");
add_action("wp_ajax_nopriv_news_letter", "news_letter_function");

function news_letter_function() {


    global $wpdb;

    $email = $email = $_POST[ 'email' ];
    $arr = [];
    $index = 0;

    $date = new DateTime();
    $created_at = $date->getTimestamp();


    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = 'Invalid email format!';

    }else{

        $table_name = $wpdb->prefix . "wysija_user";
        $test = $wpdb->insert($table_name, array('email' => $email , 'created_at' => $created_at, 'status'=> 1) );

        $sql = "INSERT INTO 'wp_wysija_user' ('email', 'created_at', 'status') VALUES ($email,  '0',  '1')";

        if($test == false){
            $errors[] = 'You are already subscribed!';
        }
    }

    if(!empty($errors)){

        foreach ($errors as $key => $all) {
            $arr[$index]['error'] = $all;
        }

    }else{
        $arr[$index]['success'] =   'Thank You!';
        $arr[$index]['error']   =   '';
    }


    header('Content-Type: application/json');
    $text = json_encode($email);
    die(json_encode($arr)) ;

}

function add_ajaxurl_cdata_to_front(){ ?>
    <script type="text/javascript"> //<![CDATA[
        ajaxurl = '<?php echo admin_url( 'admin-ajax.php'); ?>';
        //]]> </script>
<?php }
add_action( 'wp_head', 'add_ajaxurl_cdata_to_front', 1);

#----------------------------------AJAX see more ------------------------------------
function more_post_ajax(){

    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 3;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;

    header("Content-Type: text/html");

    $args = array(
        'suppress_filters' => true,
        'post_type' => 'post',
        'posts_per_page' => $ppp,
        'post_type' => 'projects',
        'paged'    => $page,
        "order" => 'ASC',
    );

    $loop = new WP_Query($args);
    $conut = $loop->post_count;
    $x = 0;
    $out = '';

    if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post();
        $id = get_the_ID();
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'full')[0];
        $logo = get_post_meta($id, 'logo')[0]['guid'];
        $excerpt = get_post_meta($id, 'project_excerpt');
        $url = get_post_permalink($id);

        $out .= '<div class="singleProject clearfix position-relative mrg-btm-lg">
                        <div class="col-md-9 image centerImg-md p-0">
                            <img src="'.$image.'" alt="">
                        </div>
                        <div class="mainColorBg commonDiv float-right">
                            <div class="projectLogo m-auto">
                                <img src="'. $logo.'" alt="">
                                <p class="aperturaRegular text-uppercase desc">
                                    '.$excerpt[0].'
                                </p>
                                <a href="'.$url.'" class="aperturaRegular d-inline-block">MORE</a>
                            </div>

                        </div>
                    </div>';

    endwhile;
    endif;
    $t = true;
    if($loop->max_num_pages - $page ==  0) $t = false;
    wp_reset_postdata();
//    wp_send_json(['t' => $t,'out' => $out]);
    die(json_encode(['t' => $t,'out' => $out])) ;
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');

#----------------------------------Ajax project-email ---------------------------------
add_action("wp_ajax_message", "message_function");
add_action("wp_ajax_nopriv_message", "message_function");

function message_function() {


    global $wpdb;

    $name       = $_POST[ 'name' ];
    $email      = $_POST[ 'email' ];
    $number     = $_POST[ 'number' ];

    $arr = [];
    $index = 0;

    $headers = array('Content-Type: text/html; charset=UTF-8');

    $required = array($email , $number, $name);
    foreach ($required as $field) {
        if ($field == '') {
            $errors[] = 'All Fields are required.';
            break;
        }
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format!';

    }

    if(!empty($errors)){

        foreach ($errors as $key => $all) {
            $arr[$index]['error'] = $all;
            $index ++ ;
        }

    }else{
        $to = 'info@kvrd.com.eg';
        $subject = 'KVRD';
        $full_message = "
                        Email   : $email<br/>
                        name    : $name <br/>
 						Subject : $subject<br/>
 						Number  : $number
		";

        $send_email = wp_mail( $to, $subject, $full_message, $headers);

        $arr[$index]['success'] = 'Thank You';
        $arr[$index]['error']   =   '';
    }


    header('Content-Type: application/json');
    $text = json_encode($email);
    die(json_encode($arr)) ;

}

#----------------------------------AJax Careers-------------------------------

add_action("wp_ajax_careers", "careers_function");
add_action("wp_ajax_nopriv_careers", "careers_function");

function careers_function() {


    require_once(ABSPATH. "/vendor/anthonybudd/wp_mail/src/WP_Mail.php");


    $data = $_POST['datastring'];

    for ($i=0; $i<= sizeof($data); $i++ ){

        $field[$data[$i]['name']] = $data[$i]['value'];
    }

    $index = 0;
    $name = $field['name'];
    $email = $field['carrer_email'];
    $phone = $field['phone'];
    $military = $field['military'];

//    for($i =17; $i<= sizeof($data); $i++){
//        $exp[$data[$i]['name']] = $data[$i]['value'];
//    }

    $required = array($email , $name, $phone, $military);
    foreach ($required as $field) {
        if ($field == '') {
            $errors[] = 'All Fields are required.';
            break;
        }
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format!';
    }

    if(!empty($errors)) {

        foreach ($errors as $key => $all) {
            $arr[$index]['error'] = $all;
            $index ++ ;
        }
    }else{
        $send_email = WP_Mail::init()
            ->to('hr@kvrd.com.eg')
            ->subject('KVRD careers!')
            ->template(get_template_directory() .'/emails/template.php', [
                'data' => $data
            ])
            ->send();

        $arr[$index]['success'] = 'Thank You';
        $arr[$index]['error']   =   '';
    }

    header('Content-Type: application/json');
    die(json_encode( $arr)) ;

}