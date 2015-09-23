<?php
/**
 * PAGE WITH LOOPS
 *
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>


	<div id="primary" class="content-area">
	
		<main id="main" class="site-main" role="main">

			<?php
				// Start the loop for feature boxes.
				query_posts('page_id=129');
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

				// End the loop.
				endwhile;
				wp_reset_postdata();
			?>

			<div class='whats-on'>



			</div> <!-- .whats-on -->


			
		</main><!-- .site-main -->
	</div><!-- .content-area -->


	<?php get_footer(); ?>



