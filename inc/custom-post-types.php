<?php
    
    /*
	=====================
		Custom Post Types
	=====================	
    */
    
    /**
     * Post Type: Products
     */
    function cptui_register_my_cpts_product()
    {
        $labels = array(
            'name' => __('Products', 'theme_slug'),
            'singular_name' => __('Product', 'theme_slug'),
        );
        
        $args = array(
            'label' => __('Products', 'theme_slug'),
            'labels' => $labels,
            'description' => '',
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_rest' => true,
            'rest_base' => '',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
            'has_archive' => false,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'delete_with_user' => false,
            'exclude_from_search' => false,
            'capability_type' => 'post',
            'map_meta_cap' => true,
            'hierarchical' => false,
            'rewrite' => array(
                'slug' => 'product',
                'with_front' => true,
            ),
            'query_var' => true,
            'supports' => array('title', 'editor', 'custom-fields', 'thumbnail', 'excerpt'),
            'show_in_graphql' => false,
        );
        
        register_post_type('product', $args);
    }
    
    add_action('init', 'cptui_register_my_cpts_product');


