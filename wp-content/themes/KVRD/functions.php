<?php

function KVRD_resources_style(){

    wp_enqueue_style('bootstrap', get_template_directory_uri().'/asset/css/bootstrap.min.css');
    wp_enqueue_style('swiper', get_template_directory_uri().'/asset/css/swiper.min.css');
    wp_enqueue_style('reset', get_template_directory_uri().'/asset/css/reset.css');
    wp_enqueue_style('fontawesome', get_template_directory_uri().'/asset/css/fontawesome-all.min.css');
    wp_enqueue_style('basics', get_template_directory_uri().'/asset/css/basics.css');
    wp_enqueue_style('main', get_template_directory_uri().'/asset/css/main.css');
    wp_enqueue_style('style', get_template_directory_uri().'/asset/css/style.css');
    wp_enqueue_style('flexslider', get_template_directory_uri().'/asset/css/flexslider.css');

//    wp_register_script('jquery', get_template_directory_uri() . '/asset/js/jquery-3.3.1.min.js', array() );
//    wp_enqueue_script('jquery');

//    wp_register_script('bootstrap', get_template_directory_uri() . '/asset/js/bootstrap.min.js', array() );
//    wp_enqueue_script('bootstrap');
//
//    wp_register_script('swiper', get_template_directory_uri() .'/asset/js/swiper.min.js', array() );
//    wp_enqueue_script('swiper');
//
//    wp_register_script('main', get_template_directory_uri() .'/asset/js/main.js', array() );
//    wp_enqueue_script('main');

//    wp_register_script('flexslider', get_template_directory_uri() .'/asset/js/jquery.flexslider-min.js', array() );
//    wp_enqueue_script('flexslider');

}

add_action('wp_enqueue_scripts', 'KVRD_resources_style');

#------------------------SetUp-------------------------------------

function KVRD_setup(){


    //Add featured image support
    add_theme_support('post-thumbnails');
    add_image_size('small-thumbnail',200, 300,array('left', 'top'), true); //size of image
    add_image_size('banner-image', 920,210, array('left', 'top')); //size of image and postion

}

add_image_size('medium',1140,470, true);
add_image_size('small',250, 100, true);

add_action('after_setup_theme', 'KVRD_setup');

function wpdocs_dequeue_script() {
    wp_dequeue_script( 'jquery' );
}
add_action( 'wp_print_scripts', 'wpdocs_dequeue_script', 100 );


add_filter('upload_mimes', 'pixert_upload_types');
function pixert_upload_types($existing_mimes=array()){
    $existing_mimes['mp4'] = 'video/x-mp4';
    $existing_mimes['swf'] = 'video/x-swf';
    $existing_mimes['flv'] = 'video/x-flv';
    $existing_mimes['mid'] = 'audio/midi';
    $existing_mimes['webm'] = 'video/webm';
    $existing_mimes['png'] = 'image/png';
    $existing_mimes['jpeg'] = 'image/jpeg';
    $existing_mimes['jpg'] = 'image/jpeg';
    return $existing_mimes;
}


/**
 * ACF Google Map Custom Field.
 */

function my_acf_google_map_api( $api ){

    $api['key'] = 'AIzaSyA1hilSN_ofajUQZwnvQyZHU6ylNIE5K4Y';

    return $api;

}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
#-----------------------display Page Editor----------------------------------

add_action('init', 'my_remove_editor_from_post_type');

function my_remove_editor_from_post_type() {
    remove_post_type_support( 'page', 'editor' );
}


add_filter( 'mime_types', 'aco_extend_mime_types' );

#-----------------------------Mail------------------------
function wpse27856_set_content_type(){
    return "text/html";
}
add_filter( 'wp_mail_content_type','wpse27856_set_content_type' );


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
        'walker' => new wp_bootstrap_navwalker()
    ));
}

add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);

add_theme_support( 'title-tag' );


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


#----------------------------------AJax message-------------------------------

add_action("wp_ajax_message", "message_function");
add_action("wp_ajax_nopriv_message", "message_function");

function message_function() {


    global $wpdb;

    $first_name = $_POST[ 'first_name' ];
    $last_name  = $_POST[ 'last_name' ];
    $email      = $_POST[ 'email' ];
    $number     = $_POST[ 'number' ];
    $message    = $_POST[ 'message' ];

    $arr = [];
    $index = 0;

    $headers = array('Content-Type: text/html; charset=UTF-8');
    $full_message = 'From: ' . $first_name . ',<br/>' . $_POST['text'];

    $required = array($email , $message, $first_name);
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
                        name    : $first_name . $last_name<br/>
 						Subject : $subject<br/>
 						Message : $message<br/>
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


#----------------------------------AJax Property-------------------------------

add_action("wp_ajax_property", "property_function");
add_action("wp_ajax_nopriv_property", "property_function");

function property_function() {


    global $wpdb;

    $name       = $_POST[ 'name' ];
    $mobile     = $_POST[ 'mobile' ];
    $email      = $_POST[ 'email' ];
    $owner      = $_POST[ 'owner' ];
    $project    = $_POST[ 'project' ];
    $type       = $_POST[ 'type' ];
    $bedroom    = $_POST[ 'bedroom' ];


    $arr = [];
    $index = 0;

    $headers = array('Content-Type: text/html; charset=UTF-8');
    $full_message = 'From: ' . $name . ',<br/>' . $_POST['text'];

    $required = array($email , $name, $project);
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
        $subject = 'KVRD details';
        $full_message = "
                        Email   : $email<br/>
                        name    : $name <br/>
 						Subject : $subject<br/>
 						project : $project<br/>
 						mobile  : $mobile
		";

        $send_email = wp_mail( $to, $subject, $full_message, $headers);

        $arr[$index]['success'] = 'Thank You';
        $arr[$index]['error']   =   '';
    }


    header('Content-Type: application/json');
    $text = json_encode($type);
    die(json_encode($arr)) ;

}

function add_ajaxurl_cdata_to_front(){ ?>
    <script type="text/javascript"> //<![CDATA[
        ajaxurl = '<?php echo admin_url( 'admin-ajax.php'); ?>';
        //]]> </script>
<?php }
add_action( 'wp_head', 'add_ajaxurl_cdata_to_front', 1);

?>
<?php


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
            ->to('info@kvrd.com.eg')
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



#----------------------------------Walker Class ----------------------------------


class WPDocs_Walker_Nav_Menu extends Walker_Nav_Menu {

    /**
     * Starts the list before the elements are added.
     *
     * Adds classes to the unordered list sub-menus.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     */
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        // Depth-dependent classes.
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
        $display_depth = ( $depth + 1); // because it counts the first submenu as 0
        $classes = array(
            'sub-menu',
            ( $display_depth % 2  ? 'mydropDown' : 'menu-even' ),
            ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
            'menu-depth-' . $display_depth
        );
        $class_names = implode( ' ', $classes );

        // Build HTML for output.
        $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
    }

    /**
     * Start the element output.
     *
     * Adds main/sub-classes to the list items and links.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item   Menu item data object.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     * @param int    $id     Current item ID.
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;
        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

        // Depth-dependent classes.
        $depth_classes = array(
            ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
            ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
            ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
            'menu-item-depth-' . $depth
        );
        $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

        // Passed classes.
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

        // Build HTML.
        $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

        // Link attributes.
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

        // Build HTML output and pass through the proper filter.
        $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters( 'the_title', $item->title, $item->ID ),
            $args->link_after,
            $args->after
        );
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}