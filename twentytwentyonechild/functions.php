<?php 

add_action('wp_enqueue_scripts', 'thr_enqueue_styles');

function thr_enqueue_styles() {
    wp_enqueue_style( 'twenty-twenty-one-style', get_template_directory_uri() . '/style.css',);
    wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style( 'animate-style', get_stylesheet_directory_uri() . '/assets/css/animate.css' );
    wp_enqueue_style( 'flex-slider-style', get_stylesheet_directory_uri() . '/assets/css/flex-slider.css' );
    wp_enqueue_style( 'fontawesome-style', get_stylesheet_directory_uri() . '/assets/css/fontawesome.css' );
    wp_enqueue_style( 'owl-style', get_stylesheet_directory_uri() . '/assets/css/owl.css' );
    wp_enqueue_style( 'templatemo-lugx-gaming-style', get_stylesheet_directory_uri() . '/assets/css/templatemo-lugx-gaming.css' );
    wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/vendor/bootstrap/js/bootstrap.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'isotope', get_stylesheet_directory_uri() . '/assets/js/isotope.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'owl-carousel', get_stylesheet_directory_uri() . '/assets/js/owl-carousel.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'counter', get_stylesheet_directory_uri() . '/assets/js/counter.js', array( 'jquery' ), 
    '1.0', true );
    wp_enqueue_script( 'custom', get_stylesheet_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), '1.0', true );

}


add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}
function get_YouTube_EmbedURL($actualURL) {
    // Extract the video ID from the actual URL
    $urlParts = parse_url($actualURL);
    parse_str($urlParts['query'], $queryParams);
    $videoID = isset($queryParams['v']) ? $queryParams['v'] : '';
    if (empty($videoID)) {
        return false; // Unable to extract video ID
    }
    // Create the embeddable iframe URL
    $embedURL = "https://www.youtube.com/embed/{$videoID}";
    return $embedURL;
}