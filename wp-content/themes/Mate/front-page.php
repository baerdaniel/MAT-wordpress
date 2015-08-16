<?php
/**
 * The FRONT PAGE
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>


	<div id="primary" class="content-area">
	
		<main id="main" class="site-main" role="main">
			<div class='whats-on float-container'>
				<?php if ( have_posts() ) : ?>

					<?php
					// Start the loop.
					query_posts('cat=7,1');
					while (have_posts()) : the_post();

						get_template_part( 'content', get_post_format() );

					// End the loop.
					endwhile;

				// If no content, include the "No posts found" template.
				else :
					get_template_part( 'content', 'none' );
				endif;
				wp_reset_query();
				?>
			</div> <!-- .whats-on -->


			<?php
			// Start the loop.
			query_posts('page_id=211');
			while ( have_posts() ) : the_post();

				// Include the page content template.
				get_template_part( 'content', 'page' );

			// End the loop.
			endwhile;
			?>

			
		</main><!-- .site-main -->
	</div><!-- .content-area -->


	<?php get_footer(); ?>



