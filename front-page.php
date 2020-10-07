<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package acmegallery
 */

get_header();
global $wp_query;
?>


		
	<main 
		id="primary" 
		class="site-main posts-list"
		data-page=" <?php echo get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1  ?>"
		data-max=" <?php echo $wp_query->max_num_pages  ?>"
		>

		<?php
		if ( have_posts() ) :

			if ( is_home() && is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;


			do_action('acme_header_banner',get_post_type());

			?>

		<!-- SEARCH -->
		<section class="search justify-content-center justify-content-md-end">
			<div class="row col-12 col-md-6 justify-content-center justify-content-md-end">

					<?php get_search_form(); ?>
					
			</div>
		</section>


		<section class="gallery">
			<div class="gallery__container row">
					<?php

					/* Start the Loop */
					while ( have_posts() ) :
						the_post();


						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;

		

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

			</div> <!--gallery__container row -->
		</section> <!--gallery -->
		
		  <!-- LOAD MORE -->

			<section class="load-more">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<button class="btn load-more__btn">Load more</button>
					</div>
				</div>
			</section>
	
	</main><!-- #main -->

<?php
get_footer();
