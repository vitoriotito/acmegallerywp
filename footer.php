<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package acmegallery
 */

?>


  <!-- FOOTER -->
  

	<footer id="colophon" class="site-footer footer">
		<div class="site-info container">
			<div class="row">
					<div class="col-12 d-flex justify-content-center align-items-end">
						<?php echo wp_get_attachment_image( 
							get_theme_mod( 'acme_footer_image' ), 
							'medium', "", 
							array( "class" => 'd-none d-md-block')
							);  
						?>
						<!-- <img class="d-none d-md-block" src=" <?php echo esc_url( get_theme_mod( 'acme_footer_image' ) ); ?>" alt="Acme Gallery Logo"> -->
						<span class="footer__copy"> <?php echo get_theme_mod( 'acme_footer_text' ); ?> </span>  
					</div>
				</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
