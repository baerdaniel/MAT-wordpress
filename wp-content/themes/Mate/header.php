<?php
/**
 * The template for displaying the header
 * 
 * @package WordPress
 * @subpackage Mate
 * @since Mate 0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>

<!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="assets/ico/favicon.png">
	
	
<!-- Style -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/framework.css" type="text/css">  
  <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/style.css" type="text/css"> 
  <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/flickity.css" type="text/css"> 

<!-- Plugins -->
  <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/jquery-1.11.2.min.js"></script> <!-- find latest version on http://code.jquery.com/ -->
  <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/scripts.js"></script>
  <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/flickity.pkgd.min.js"></script>



</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

		<!-- <header class="site-header" role="banner">
			<div class="site-branding">
				<?php
					if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif;
				?>
			</div>
		</header>  .site-header -->

		<?php

			if ( has_nav_menu( 'primary' ) ) : ?>
				<div id="secondary" class="secondary">

					<?php if ( has_nav_menu( 'primary' ) ) : ?>
						<nav id="site-navigation" class="main-navigation L-1-1" role="navigation">
							<?php
								// Primary navigation menu.
								wp_nav_menu( array(
									'menu_class'     => 'nav-menu inline-block-container',
									'theme_location' => 'primary',
								) );
							?>
						</nav><!-- .main-navigation -->
					<?php endif; ?>

				</div><!-- .secondary -->

		<?php endif; ?>
		<ul><?php pll_the_languages( array('display_names_as'=>'slug')); ?></ul>

	<div id="content" class="site-content">
