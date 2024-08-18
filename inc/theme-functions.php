<?php
    /*
        =====================
            Theme functions
        =====================
    */
    
    /*
        =====================
            Limit excerpt length function
        =====================
    */
    
    function excerpt($limit, $post_id = -1)
    {
        if (-1 === $post_id) :
            $excerpt = explode(' ', get_the_excerpt(), $limit);
        else :
            $excerpt = explode(' ', get_the_excerpt($post_id), $limit);
        endif;
        if (count($excerpt) >= $limit) {
            array_pop($excerpt);
            $excerpt = implode(' ', $excerpt) . '...';
        } else {
            $excerpt = implode(' ', $excerpt);
        }
        $excerpt = preg_replace('`[[^]]*]`', '', $excerpt);
        return $excerpt;
    }
    
    /*
        =====================
            Don't scale down large images
        =====================
    */
    
    add_filter('big_image_size_threshold', '__return_false');
    
    /*
        =====================
            Header nav menu
        =====================
    */
// Nav arrows
    function filter_walker_nav_menu_start_el($item_output, $item, $depth, $args)
    {
        if ((in_array('menu-item-has-children', $item->classes) || ('Events' === $item->title))) {
            return '<div class="menu-item__parent">' . $item_output . '</div>';
        }
        
        return $item_output;
    }
    
    add_filter('walker_nav_menu_start_el', 'filter_walker_nav_menu_start_el', 10, 4);
    
    
    /*
        =====================
            Move Yoast to bottom
        =====================
    */
    function yoasttobottom()
    {
        return 'low';
    }
    
    add_filter('wpseo_metabox_prio', 'yoasttobottom');
    
    
    /*
        =====================
            Remove Gutenberg Block Library CSS from loading on the frontend
        =====================
    */
    function smartwp_remove_wp_block_library_css()
    {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
    }
    
    add_action('wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css');
    
    /*
        =====================
            Get width and height from SVG files
        =====================
    */

    function fix_wp_get_attachment_image_svg($image, $attachment_id, $size, $icon)
    {
        if (is_array($image) && preg_match('/\.svg$/i', $image[0]) && $image[1] <= 1) {
            if (is_array($size)) {
                $image[1] = $size[0];
                $image[2] = $size[1];
            } 
// 			elseif (($xml = simplexml_load_file($image[0])) !== false) {
//                 $attr = $xml->attributes();
//                 $viewbox = explode(' ', $attr->viewBox);
//                 $image[1] = isset($attr->width) && preg_match('/\d+/', $attr->width, $value) ? (int)$value[0] : (count($viewbox) == 4 ? (int)$viewbox[2] : null);
//                 $image[2] = isset($attr->height) && preg_match('/\d+/', $attr->height, $value) ? (int)$value[0] : (count($viewbox) == 4 ? (int)$viewbox[3] : null);
//             } 
		else {
                $image[1] = $image[2] = null;
            }
        }
        return $image;
    }
    
    add_filter('wp_get_attachment_image_src', 'fix_wp_get_attachment_image_svg', 10, 4);
    
    
    /*
        =====================
            Get SVG file content
        =====================
    */
    function get_inline_svg($name)
    {
        if ($name) :
            return file_get_contents(esc_url(get_template_directory() . '/assets/images/' . $name));
        endif;
        return '';
    }
    
    /**
     *
     * WP Query by title
     *
     */
    
    function posts_by_title($where, $query)
    {
        global $wpdb;
        
        $title = $query->get('title_equals');
        
        if ($title) {
            $where .= " AND $wpdb->posts.post_title = '$title'";
        }
        
        return $where;
    }
    
    add_filter('posts_where', 'posts_by_title', 10, 2);


//Remove Comments 
add_action('admin_init', function () {
    global $pagenow;
     
    if ($pagenow === 'edit-comments.php') {
        wp_safe_redirect(admin_url());
        exit;
    }
 
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
 
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});
 
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);
 
add_filter('comments_array', '__return_empty_array', 10, 2);
 
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});
 
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});