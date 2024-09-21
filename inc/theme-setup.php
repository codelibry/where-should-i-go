<?php
/*
=====================
	Theme Setup Function
=====================
*/

function theme_setup(){
	load_theme_textdomain( 'theme_slug', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'menus' );
	add_theme_support( 'woocommerce' );

	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 640;

	//main menu
	register_nav_menus(
		array( 
			'main-menu' => __( 'Main Menu', 'theme_slug' ),
			'footer-menu-1' => __( 'Footer Menu 1', 'theme_slug'),
			'footer-menu-2' => __( 'Footer Menu 2', 'theme_slug'),
            'footer-bottom-menu' => __( 'Footer Bottom Menu', 'theme_slug'),  
		)
    );
    
}

add_action( 'after_setup_theme', 'theme_setup' );


add_action( 'admin_enqueue_scripts', 'load_admin_style' );
function load_admin_style() {
    wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/inc/admin/admin-style.css', false, '1.0.0' );
}

function login_enqueue_scripts() {
	wp_enqueue_style( 'login_css', get_template_directory_uri() . '/inc/admin/login-style.css', false, '1.0.0' );
}
add_action('login_head', 'login_enqueue_scripts');

/* Redirect from product single page */

add_action( 'template_redirect', 'redirect_product_single' );
function redirect_product_single(){
    if ( ! is_singular( 'product' ) )
        return;
        wp_redirect( get_home_url() . '/packages/', 301 );
    exit;
}

// Register Post Sidebar
function register_post_sidebar() {
    register_sidebar( array(
        'name'          => __( 'Blog Sidebar', 'wsig' ),
        'id'            => 'blog-sidebar',
        'description'   => __( 'Widgets in this area will be shown on single post pages.', 'wsig' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'register_post_sidebar' );