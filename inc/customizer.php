<?php
/**
 * acmegallery Theme Customizer
 *
 * @package acmegallery
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function acmegallery_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'acmegallery_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'acmegallery_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'acmegallery_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function acmegallery_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function acmegallery_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function acmegallery_customize_preview_js() {
	wp_enqueue_script( 'acmegallery-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'acmegallery_customize_preview_js' );



function tcx_register_theme_customizer( $wp_customize ) {
 
	$wp_customize->add_setting(
			'tcx_link_color',
			array(
					'default'     => '#000000'
			)
	);

	$wp_customize->add_control(
			new WP_Customize_Color_Control(
					$wp_customize,
					'link_color',
					array(
							'label'      => __( 'Link Color', 'tcx' ),
							'section'    => 'colors',
							'settings'   => 'tcx_link_color'
					)
			)
	);

}
add_action( 'customize_register', 'tcx_register_theme_customizer' );