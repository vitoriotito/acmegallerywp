<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package acmegallery
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class( 'card gallery__card  col-md-4' ); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			// the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

?>

	</header><!-- .entry-header -->

	<?php acmegallery_post_thumbnail( 'card-img-top' ); ?>
	<div class="row card-body__container col-12" >

	<div class=" card-body__image">  
		<?php  echo get_avatar( get_the_author_meta( 'ID' ), 64 ); ?>
	</div>
	<div class="card-body">
		<h6 class="card-title"> <?php echo get_the_author_meta( 'display_name' ) ?> </h6>
		<ul class="card-text">
			<?php echo get_the_term_list( $post->ID, 'hashtags', '<li class="hashtag">', ', ', '</li>' ) ?>
		</ul>
	</div>
</div>	

</article><!-- #post-<?php the_ID(); ?> -->
