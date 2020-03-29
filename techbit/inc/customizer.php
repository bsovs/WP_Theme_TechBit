<?php
/**
 * TechBit Theme Customizer
 *
 * @package TechBit
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function techbit_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'techbit_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'techbit_customize_partial_blogdescription',
		) );
	}
	
	// HOMEPAGE SPLIT IMAGES //
	
	//section
	$wp_customize->add_section( 'split_images' , array(
		'title'      => __( 'Split Images', 'techbit' ),
		'priority'   => 30,
	) );
	
	//LEFT IMG//
	// add a setting for the site logo
	$wp_customize->add_setting('left_image');
	// Add a control to upload the logo
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'left_image',
	array(
	'label' => 'Left Image',
	'section' => 'split_images',
	'settings' => 'left_image',
	) ) );
	
	//Image Tint Left
	$wp_customize->add_setting('left_tint_color');
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'left_tint_color',
	array(
	'label' => 'Tint Image Left',
	'section' => 'split_images',
	'settings' => 'left_tint_color',
	) ) );
	
	//LEFT COLOR//
	$wp_customize->add_setting('left_color');
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'left_color',
	array(
	'label' => 'Left Color',
	'section' => 'split_images',
	'settings' => 'left_color',
	) ) );
	
	//RIGHT IMG//
	// add a setting for the site logo
	$wp_customize->add_setting('right_image');
	// Add a control to upload the logo
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'right_image',
	array(
	'label' => 'Right Image',
	'section' => 'split_images',
	'settings' => 'right_image',
	) ) );
	
	//Image Tint Right
	$wp_customize->add_setting('right_tint_color');
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'right_tint_color',
	array(
	'label' => 'Tint Image Right',
	'section' => 'split_images',
	'settings' => 'right_tint_color',
	) ) );
	
	//RIGHT COLOR//
	$wp_customize->add_setting('right_color');
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'right_color',
	array(
	'label' => 'Right Color',
	'section' => 'split_images',
	'settings' => 'right_color',
	) ) );
	
	$wp_customize->get_setting( 'left_image' )->transport = 'postMessage';
	$wp_customize->get_setting( 'left_tint_color' )->transport = 'postMessage';
	$wp_customize->get_setting( 'left_color' )->transport = 'postMessage';
	$wp_customize->get_setting( 'right_image' )->transport = 'postMessage';
	$wp_customize->get_setting( 'right_tint_color' )->transport = 'postMessage';
	$wp_customize->get_setting( 'right_color' )->transport = 'postMessage';
	
}
add_action( 'customize_register', 'techbit_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function techbit_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function techbit_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function techbit_customize_preview_js() {
	wp_enqueue_script( 'techbit-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'techbit_customize_preview_js' );
