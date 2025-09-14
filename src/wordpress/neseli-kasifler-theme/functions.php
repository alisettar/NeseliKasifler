<?php
/**
 * Neşeli Kaşifler Anaokulu Theme Functions
 */

// Theme support
function neseli_kasifler_theme_setup() {
    // Theme support
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
    
    // Menus
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'neseli-kasifler' ),
    ) );
}
add_action( 'after_setup_theme', 'neseli_kasifler_theme_setup' );

// Enqueue styles and scripts
function neseli_kasifler_scripts() {
    // Font Awesome - priority yüksek
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0' );
    
    // Google Fonts
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap', array(), null );
    
    // Ana CSS dosyası - en son yüklenir
    wp_enqueue_style( 'neseli-kasifler-style', get_template_directory_uri() . '/assets/css/style.css', array('font-awesome', 'google-fonts'), '1.0.0' );
    
    // JavaScript dosyası
    wp_enqueue_script( 'neseli-kasifler-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'neseli_kasifler_scripts' );

// Custom Nav Walker for active states
class Neseli_Kasifler_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        // Add active class for current page
        if ( in_array('current-menu-item', $classes) || in_array('current_page_item', $classes) ) {
            $classes[] = 'active';
        }
        
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
        
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        
        $output .= $indent . '<li' . $class_names .'>';
        
        $attributes = ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';
        
        // Check if current page matches menu item
        $current_url = home_url( $_SERVER['REQUEST_URI'] );
        $menu_url = $item->url;
        $active_class = ( $current_url == $menu_url || in_array('current-menu-item', $classes) ) ? ' active' : '';
        
        $output .= '<a' . $attributes . ' class="' . $active_class . '">';
        $output .= apply_filters( 'the_title', $item->title, $item->ID );
        $output .= '</a>';
    }
}
