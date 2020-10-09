<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package acmegallery
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function acmegallery_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'acmegallery_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function acmegallery_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'acmegallery_pingback_header' );



function acme_front_banner( $post_type = 'acme_gallery' ) {

	if ( 'acme_gallery' == $post_type && is_front_page() ) {
			get_template_part('template-parts/banner', $post_type);
	};

}

add_action('acme_header_banner', 'acme_front_banner');



//Change logo brand css class

function change_logo_class( $html ) {

    $html = str_replace( 'custom-logo', 'navbar-brand__image', $html );
    $html = str_replace( 'custom-logo-link', 'navbar-brand', $html );

    return $html;
}

add_filter( 'get_custom_logo', 'change_logo_class' );



//Load more posts


function load_more_posts()
{
  $next_page = $_POST['current_page'] + 1;
  $query = new WP_Query([
		'post_type' => 'acme_gallery',
    'posts_per_page' => 3,
    'paged' => $next_page
	]);
	

  if ($query->have_posts()) :

			ob_start();

			while ($query->have_posts()) : $query->the_post();

				get_template_part('template-parts/content', get_post_type() );

			endwhile;

				wp_send_json_success(ob_get_clean());

	else :

			wp_send_json_error('
			<span class="gallery__no-more-posts">No more posts</span>
			');

  endif;
}
add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');