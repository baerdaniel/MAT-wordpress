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

<!-- 			<div class='section-title'>
				<div class='trunk gutters'>
					<h1>Upcoming</h1>
				</div>
			</div> -->
			<div class='whats-on'>

				<?php if ( have_posts() ) : ?>

				<?php

						$currentdate = date("Y-m-d",mktime(0,0,0,date("m"),date("d"),date("Y")));
						$category = 'learn';


						// GET posts started in the past, ending in the future ---------------------------------------

						$now_query = new WP_Query(  array (
						   
						    'meta_query'=> array(
						    	'relation' => 'AND',
						        array(
						          'key' => 'start_date',
						          'compare' => '<',
						          'value' => $currentdate,
						          'type' => 'DATE',
						        ),
						        array(
						          'key' => 'end_date',
						          'compare' => '>',
						          'value' => $currentdate,
						          'type' => 'DATE',
						        )

						        ),
						    'category_name'	=> $category,
						    'meta_key' 		=> 'start_date',
						    'orderby' 		=> 'meta_value',
						    'order' 		=> 'ASC',
						    )
						);
						if ( $now_query->have_posts() ) :
							echo '<section class="whats-on L-1-1">';
								echo '<div class="section-title"><h1 class="trunk gutters">On Now</h1></div>';
								echo '<div class="listing">';
								// Start the Loop.
								while ( $now_query->have_posts() ) : $now_query->the_post();

									/*
									 * Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
									get_template_part( 'content', get_post_format() );

								// End the loop.
								endwhile;
								echo '</div>';
							echo '</section>';

							// Restore original Post Data //
							wp_reset_postdata();

						else :
						endif;



						// GET posts that have ended in the past ---------------------------------------

						$future_query = new WP_Query(  array (
						   
						    'meta_query'=> array(
						        array(
						          'key' => 'start_date',
						          'compare' => '>',
						          'value' => $currentdate,
						          'type' => 'DATE',
						        )),
						    'category_name'	=> $category,
						    'meta_key' => 'start_date',
						    'orderby' => 'meta_value',
						    'order' => 'ASC',
						    )
						);
						if ( $future_query->have_posts() ) :
							echo '<section class="coming-up L-1-1">';
								echo '<div class="section-title"><h1 class="trunk gutters">Coming Up</h1></div>';
								echo '<div class="listing">';
								// Start the Loop.
								while ( $future_query->have_posts() ) : $future_query->the_post();
									get_template_part( 'content', get_post_format() );
								// End the loop.
								endwhile;
								echo '</div>';
							echo '</section>';
							// Restore original Post Data //
							wp_reset_postdata();
						else :
						endif;


						// GET posts that have ended in the past ---------------------------------------

						$past_query = new WP_Query(  array (
						   
						    'meta_query'=> array(
						        array(
						          'key' => 'end_date',
						          'compare' => '<',
						          'value' => $currentdate,
						          'type' => 'DATE',
						        )),
						    'category_name'	=> $category,
						    'meta_key' => 'start_date',
						    'orderby' => 'meta_value',
						    'order' => 'ASC',
						    )
						);

						if ( $past_query->have_posts() ) :
							echo '<section class="past trunk">';
								echo '<div class="section-title"><h1 class="gutters">Archive</h1></div>';
								echo '<div class="listing inline-block-container">';
								// Start the Loop.
								while ( $past_query->have_posts() ) : $past_query->the_post();
									get_template_part( 'content', 'past' );
								// End the loop.
								endwhile;
								echo '</div>';
							echo '</section>';					
							// Restore original Post Data //
							wp_reset_postdata();
						else :
						endif;



					// If no content, include the "No posts found" template.
					else :
						// get_template_part( 'content', 'none' );
					endif;

					?>

				</div> <!-- .whats-on -->

			
		</main><!-- .site-main -->
	</div><!-- .content-area -->


	<?php get_footer(); ?>



