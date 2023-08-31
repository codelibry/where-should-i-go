<?php

/*
	=====================
		Theme support
	=====================	
*/

/*
* Add support of excerpts for pages to use on page.php 
	and show content under page title
*/ 

add_post_type_support( 'page', 'excerpt' );



/*
	=====================
		Svg and json support
	=====================	
*/
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['json'] = 'application/json';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

