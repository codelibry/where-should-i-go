<?php
/*
=====================
	ACF functions
=====================
*/

function my_acf_google_map_api( $api ) {
	$api['key'] = 'AIzaSyD4vlOj_3G-ErfM6ey5qeGcTjjoE58cH4w';
	return $api;
}
add_filter( 'acf/fields/google_map/api', 'my_acf_google_map_api' );


/*
=====================
	ACF options page
=====================
*/
function my_acf_op_init() {

	// Check function exists.
	if ( function_exists( 'acf_add_options_page' ) ) {

		// Add parent.
		$parent = acf_add_options_page(
			array(
				'page_title' => __( 'Theme Options' ),
				'menu_title' => __( 'Theme Options' ),
				'redirect'   => false,
			)
		);

		// Add sub page.
		$headerOptions    = acf_add_options_page(
			array(
				'page_title'  => __( 'Header Options' ),
				'menu_title'  => __( 'Header' ),
				'parent_slug' => $parent['menu_slug'],
			)
		);
		$footerOptions    = acf_add_options_page(
			array(
				'page_title'  => __( 'Footer Options' ),
				'menu_title'  => __( 'Footer' ),
				'parent_slug' => $parent['menu_slug'],
			)
		);
	}
}
add_action( 'acf/init', 'my_acf_op_init' );


/*
=====================
	ACF Flexible Template Loop
=====================
*/
function the_acf_loop() {
	get_template_part( 'template-parts/loop/acf-blocks', 'loop' );
}


/*
=====================
	ACF Section Options Handler
=====================
*/

function get_acf_block_options() {
	$options = get_sub_field( 'options' );

	$params = array(
		'id'    => '',
		'class' => '',
		'style' => '',
	);

	if ( $options ) :

		//Block spacings
		if ( $options['change_topbottom_spacings'] ) :

			//spacings desktop
			$params['class'] .= ' pt-lg-' . $options['spacing_top_desktop'];
			$params['class'] .= ' pb-lg-' . $options['spacing_bottom_desktop'];

			//spacings tablet
			$params['class'] .= ' pt-md-' . $options['spacing_top_tablet'];
			$params['class'] .= ' pb-md-' . $options['spacing_bottom_tablet'];

			//spacings mobile
			$params['class'] .= ' pt-' . $options['spacing_top_mobile'];
			$params['class'] .= ' pb-' . $options['spacing_bottom_mobile'];

		endif;

		//Block custom classes
		if ( $options['block_custom_classes'] ) :
			$params['class'] .= ' ' . $options['block_custom_classes'];
		endif;

		//Block background color
		if ( $options['change_background_color'] ) :
			$params['style'] .= 'background-color:' . $options['background_color'] . ';';
		endif;

		//Block background image
		if ( $options['background_image'] ) :
			$params['style'] .= 'background-image: url(' . $options['background_image'] . ');';
			$params['style'] .= 'background-repeat: no-repeat;';
			$params['style'] .= 'background-size: cover;';
		endif;

		//Block text color
		if ( $options['text_color'] != 'default' ) :
			$params['class'] .= ' text--color--' . $options['text_color'];
		endif;

		//Block ID
		$params['id'] = $options['block_id'] ? $options['block_id'] : '';
	endif;

	return $params;
}

/**
 * Dynamically populate ACF select field with Ninja Forms
 *
 * https://www.advancedcustomfields.com/resources/dynamically-populate-a-select-fields-choices/
 *
 * There are 4 ways to hook into `acf_load_field`
 * https://www.advancedcustomfields.com/resources/acfload_field/
 *
 * ---------------------------------------------
 * @return array    $field
 * ---------------------------------------------
 **/
function acf_load_ninja_forms_field_choices( $field ) {

	if ( function_exists( 'ninja_forms_get_all_forms' ) ) {
		$choices = ninja_forms_get_all_forms();
	}

	// loop through array and add to field 'choices'
	if ( is_array( $choices ) ) {

		foreach ( $choices as $choice ) {

			$value = $choice['id'];
			$label = $choice['data']['title'];

			$field['choices'][ $value ] = $label;

		}
	}

	// add empty option
	$field['choices'] = array( '' => 'Select...' ) + $field['choices'];

	// return the field
	return $field;
}

add_filter( 'acf/load_field/name=ninja_form', 'acf_load_ninja_forms_field_choices' );
