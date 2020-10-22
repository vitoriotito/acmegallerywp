<?php 



// CPT Acmegallery Setup

function create_acme_gallery_posttype() {
    
  register_post_type( 'acme_gallery',
      array(
          'labels' => array(
              'name'          => __( 'Acme Posts' ),
              'singular_name' => __( 'Acme Post' )
          ),
          'public'       => true,
          'has_archive'  => true,
          'rewrite'      => array( 'slug' => 'acme_posts' ),
          'supports'     => array( 
              'title', 'author', 'thumbnail', 
            ),

      )
  );
}

add_action( 'init', 'create_acme_gallery_posttype' );


//Acme Gallery theme configuration 



  function acmegallery_configuration() {
    if ( !get_option( 'acme_ga_role_created' ) ) {
      add_role( 'gallery_author', 'Gallery author' );
    }
   update_option( 'acme_ga_role_created', true );
  }


  // Include Bootstrap nav walker 
  include_once( get_template_directory()  . '/inc/class-wp-bootstrap-navwalker.php' );

  add_action( 'after_setup_theme', 'acmegallery_configuration', $author );



//Add Hashtag taxonomy to gallery author CPT

 
add_action( 'init', 'create_hashtag_taxonomy', 0 );
 
function create_hashtag_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Hashtags', 'taxonomy general name' ),
    'singular_name' => _x( 'Hashtag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Hashtags' ),
    'popular_items' => __( 'Popular Hashtags' ),
    'all_items' => __( 'All Hashtags' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Hashtag' ), 
    'update_item' => __( 'Update Hashtag' ),
    'add_new_item' => __( 'Add New Hashtag' ),
    'new_item_name' => __( 'New Hashtag Name' ),
    'separate_items_with_commas' => __( 'Separate hashtags with commas' ),
    'add_or_remove_items' => __( 'Add or remove hashtags' ),
    'choose_from_most_used' => __( 'Choose from the most used hashtags' ),
    'menu_name' => __( 'Hashtags' ),
  ); 
 
 
  register_taxonomy('hashtags','acme_gallery', array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'hashtag' ),
  ));
}





//Filter authors

function filter_authors( $args, $r) {
  
	if ( isset( $args['who'])) {
    $args['role'] = ['gallery_author'];   
    $args['role__in'] = ['gallery_author'];    
    $args['role__not_in'] = ['administrator'];  
		unset( $args['who']);
  }
   
	return $args;
}

add_action('wp_dropdown_users_args', 'filter_authors', 10, 2);



//QUERY FOR ACMEGALLERY CPT IN FRONT PAGE

function custom_pre_get_posts($query, $posttype='acme_gallery', $poststatus='publish' ) {

  // Filters request only in front page
  if( is_front_page() ) {

      $args = array(
          'post_type' => $posttype,
          'post_status' => array( $poststatus ),
          'posts_per_page' => 3,
      );

      $query->query_vars = $args;
  }
}
add_action('pre_get_posts', 'custom_pre_get_posts');





//Acme Customizer

function acme_customizer_settings($wp_customize)
{
  $wp_customize->add_section('acme_settings', array(
    'title'      => 'Acme Theme Settings',
    'priority'   => 20,
  ));


  $wp_customize->add_setting('acme_footer_image', array(
      'type' => 'theme_mod', 
      'capability' => 'edit_theme_options',
      'default' => '', 
      'transport' => 'refresh', 
  ));

  $wp_customize->add_control(
    new WP_Customize_Media_Control(
      $wp_customize,
      'acme_footer_image',
      array(
        'label' => 'Footer image',
        'section' => 'acme_settings',
        'settings' => 'acme_footer_image',
      )
    )
  );


  $wp_customize->add_setting('acme_footer_text', array(
    'type' => 'theme_mod', 
    'capability' => 'edit_theme_options',
    'default' => '© All rights reserved 2020', 
    'transport' => 'refresh', 
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control('acme_footer_text', array(
    'type' => 'text',
    'section' => 'acme_settings',
    'label' => __('Footer text', 'acme_gallery'),
    'settings' => 'acme_footer_text',
  ));
}

add_action('customize_register', 'acme_customizer_settings');



//Customize search form

function custom_search_form( $form ) {
  $form = '
    <form role="search" method="get" id="searchform" class="search__form" action="' . home_url( '/' ) . '" >
        <div class="input-group">
          <label class="screen-reader-text" for="s">' . __( 'Search:' ) . '</label>
          <label class="control-label search__label d-none d-md-block ">Search by # </label>
          <input type="text" value="' . get_search_query() . '" name="s" id="s" class="form-control py-2 border-right-0 border search__input" type="search" id="example-search-input">
          <span class="input-group-append">
              <button class="input-group-text" type="submit"  value="'. esc_attr__( 'Search' ) .'" ><i class="fa fa-search"></i></button>
          </span>
      </div>
    </form> ';
  return $form;
}

add_filter( 'get_search_form', 'custom_search_form', 100 );


//Add login btn at the end of the list

add_filter( 'wp_nav_menu_items', 'add_login_to_nav', 10, 2 );

function add_login_to_nav( $items, $args )
{
    $items .= '<a class="btn btn-acme " href="' . wp_login_url( site_url() ) . '">LOGIN</a>';
    return $items;
}
