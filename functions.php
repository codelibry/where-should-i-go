<?php
require get_template_directory().'/inc/theme-setup.php';
require get_template_directory().'/inc/theme-support.php';
require get_template_directory().'/inc/theme-enqueue.php';

require get_template_directory().'/inc/custom-post-types.php';
require get_template_directory().'/inc/custom-taxonomies.php';

require get_template_directory().'/inc/acf.php';
require get_template_directory().'/inc/theme-functions.php';

add_filter('woocommerce_resize_images', static function() {
    return false;
});
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_loop_add_to_cart', 30 );

add_filter( 'wpseo_robots', 'my_robots_func' );
function my_robots_func( $robotsstr ) {
	if ( is_archive() && is_paged() ) {
		return 'noindex,follow';		
	}
	return $robotsstr;
}