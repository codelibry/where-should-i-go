<?php
    /*
        =====================
            Custom Taxonomies
        =====================	
    */
    
    function cptui_register_my_taxes_event_country()
    {
        
        /**
         * Taxonomy: Countries.
         */
        
        $labels = [
            "name" => __("Countries", "theme_slug"),
            "singular_name" => __("Country", "theme_slug"),
        ];
        
        
        $args = [
            "label" => __("Countries", "theme_slug"),
            "labels" => $labels,
            "public" => false,
            "publicly_queryable" => false,
            "hierarchical" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => ['slug' => 'event_country', 'with_front' => true,],
            "show_admin_column" => false,
            "show_in_rest" => true,
            "show_tagcloud" => false,
            "rest_base" => "event_country",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "rest_namespace" => "wp/v2",
            "show_in_quick_edit" => false,
            "sort" => false,
            "show_in_graphql" => false,
        ];
        register_taxonomy("event_country", ["event"], $args);
        


        /**
         * Taxonomy: Countries.
         */
        
         $labels = [
            "name" => __("Packages Country", "theme_slug"),
            "singular_name" => __("Packages Country", "theme_slug"),
        ];
        
        
        $args = [
            "label" => __("Packages Countries", "theme_slug"),
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => ['slug' => 'packages_country', 'with_front' => true,],
            "show_admin_column" => true,
            "show_in_rest" => true,
            "show_tagcloud" => false,
            "rest_base" => "packages_country",
            "show_in_quick_edit" => false,
        ];
        register_taxonomy("packages_country", ["product"], $args);
    }
    
    add_action('init', 'cptui_register_my_taxes_event_country');
