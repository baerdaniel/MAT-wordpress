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
			<div class='whats-on float-container'>
				<?php


					// GET posts in ‘what’s on’ ---------------------------------------

					// WP_Query arguments
					$args = array (
						'category_name'          => 'whats-on',
						'meta_query'             => array(
							array(
								'key'       => 'featured',
								'value'     => '1',
							),
						),
					);


					$whatson_query = new WP_Query( $args );


					echo '<section class="whats-on L-1-1">';
						echo '<div class="section-title"><h1 class="trunk gutters">On Now</h1></div>';
						echo '<div class="listing float-container">';
						// Start the Loop.
						while ( $whatson_query->have_posts() ) : $whatson_query->the_post();

							get_template_part( 'content', get_post_format() );

						// End the loop.
						endwhile;
						echo '</div>';
					echo '</section>';

					// Restore original Post Data //
					wp_reset_postdata();

				?>
			</div> <!-- .whats-on -->


			<?php
			// Start the loop for feature boxes.
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



