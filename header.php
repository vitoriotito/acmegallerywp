<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package acmegallery
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site container-md">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'acmegallery' ); ?></a>

	<header id="masthead" class="site-header navbar navbar-expand-md">
		<div class="site-branding navbar-brand">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$acmegallery_description = get_bloginfo( 'description', 'display' );
			if ( $acmegallery_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $acmegallery_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->


		<!-- NAV -->
		<nav id="site-navigation" class="main-navigation ">
		
		<button class="hamburger hamburger--slider d-md-none" type="button" data-toggle="collapse" data-target="#acmeGallery-menu">
			<span class="hamburger-box">
				<span class="hamburger-inner"></span>
			</span>
		</button>
		<div class="collapse navbar-collapse d-flex-md justify-content-end text-right mt-2" id="acmeGallery-menu" >
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="btn btn-acme " href="<?php echo wp_login_url( site_url() ); ?>">LOGIN</a>
				</li>   
			</ul>
		</div>  
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	<!-- END NAV -->