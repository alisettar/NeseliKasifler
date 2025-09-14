<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Ccircle cx='50' cy='50' r='25' fill='%23FFD700'/%3E%3Cpath d='M50 10 L50 20 M50 80 L50 90 M10 50 L20 50 M80 50 L90 50 M21.7 21.7 L28.3 28.3 M71.7 71.7 L78.3 78.3 M21.7 78.3 L28.3 71.7 M71.7 28.3 L78.3 21.7' stroke='%23FFD700' stroke-width='4' stroke-linecap='round'/%3E%3C/svg%3E">
    <link rel="apple-touch-icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Ccircle cx='50' cy='50' r='25' fill='%23FFD700'/%3E%3Cpath d='M50 10 L50 20 M50 80 L50 90 M10 50 L20 50 M80 50 L90 50 M21.7 21.7 L28.3 28.3 M71.7 71.7 L78.3 78.3 M21.7 78.3 L28.3 71.7 M71.7 28.3 L78.3 21.7' stroke='%23FFD700' stroke-width='4' stroke-linecap='round'/%3E%3C/svg%3E">
    
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" />
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- Floating Shapes -->
    <div class="floating-shapes">
        <div class="floating-shape shape1"></div>
        <div class="floating-shape shape2"></div>
        <div class="floating-shape shape3"></div>
    </div>

    <!-- Header -->
    <header class="header">
        <div class="container">
            <nav class="navbar">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
                    <?php 
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    if ( $custom_logo_id ) {
                        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
                    } else {
                        echo '<img src="' . get_template_directory_uri() . '/assets/img/logo.png" alt="Neşeli Kaşifler Logo">';
                    }
                    ?>
                    <div class="logo-text">
                        <div class="logo-main"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></div>
                        <div class="logo-sub"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></div>
                    </div>
                </a>
                
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'nav-menu',
                    'container'      => false,
                    'fallback_cb'    => 'neseli_kasifler_fallback_menu',
                    'walker'         => new Neseli_Kasifler_Walker_Nav_Menu()
                ) );
                ?>
                
                <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'kayit' ) ) ); ?>" class="register-btn">Hemen Kayıt Ol</a>
                
                <div class="mobile-contact">
                    <a href="tel:+905514975313" class="phone-icon" title="Ara"><i class="fas fa-phone"></i></a>
                    <a href="https://instagram.com/neselikasifler_" class="instagram-icon" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
                
                <button class="mobile-menu-toggle">
                    <i class="fas fa-bars"></i>
                </button>
            </nav>
        </div>
    </header>