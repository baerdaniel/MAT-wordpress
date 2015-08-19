<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

			<section class='page-top'>
				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title trunk gutters">',  '</h1>' );
						the_archive_description( '<div class="taxonomy-description"><div class="trunk gutters">', '</div></div>' );
					?>
				</header><!-- .page-header -->

				<div class='filters trunk gutters'>
					<div class='float-container'>
						<a class='button' href='/category/whats-on/'>Show All</a>
						<button id='exhibitions' class='button dropdown filter-toggle'>Exhibitions<span class='icon'></span></button>
						<button id='events' class='button dropdown filter-toggle'>Events<span class='icon'></span></button>
					</div>
					<div id='filters-exhibitions' class='filter-list float-container'>
						<?php wp_list_categories('exclude=31&title_li=&child_of=7'); ?>
					</div>
					<div id='filters-events' class='filter-list float-container'>
						<?php wp_list_categories('exclude=31&title_li=&child_of=1'); ?>	
					</div>					
				</div>
			</section>



				<?php

					$currentdate = date("Y-m-d",mktime(0,0,0,date("m"),date("d"),date("Y")));
					$cat = get_query_var('cat');
					$yourcat = get_category ($cat);
					$thiscat = $yourcat->slug;


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
					    'category_name' => $thiscat,
					    'meta_key' => 'start_date',
					    'orderby' => 'meta_value',
					    'order' => 'ASC',
					    )
					);

					echo '<section class="whats-on L-1-1">';
						echo '<div class="section-title"><h1 class="trunk gutters">On Now</h1></div>';
						echo '<div class="listing float-container">';
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




					// GET posts that have ended in the past ---------------------------------------

					$future_query = new WP_Query(  array (
					   
					    'meta_query'=> array(
					        array(
					          'key' => 'start_date',
					          'compare' => '>',
					          'value' => $currentdate,
					          'type' => 'DATE',
					        )),
					    'category_name' => $thiscat,
					    'meta_key' => 'start_date',
					    'orderby' => 'meta_value',
					    'order' => 'ASC',
					    )
					);

					echo '<section class="coming-up L-1-1">';
						echo '<div class="section-title"><h1 class="trunk gutters">Coming Up</h1></div>';
						echo '<div class="listing float-container">';
						// Start the Loop.
						while ( $future_query->have_posts() ) : $future_query->the_post();
							get_template_part( 'content', get_post_format() );
						// End the loop.
						endwhile;
						echo '</div>';
					echo '</section>';
					// Restore original Post Data //
					wp_reset_postdata();



					// GET posts that have ended in the past ---------------------------------------

					$past_query = new WP_Query(  array (
					   
					    'meta_query'=> array(
					        array(
					          'key' => 'end_date',
					          'compare' => '<',
					          'value' => $currentdate,
					          'type' => 'DATE',
					        )),
					    'category_name' => $thiscat,
					    'meta_key' => 'start_date',
					    'orderby' => 'meta_value',
					    'order' => 'ASC',
					    )
					);

					echo '<section class="past trunk">';
						echo '<div class="section-title"><h1 class="gutters">Archive</h1></div>';
						echo '<div class="listing float-container">';
						// Start the Loop.
						while ( $past_query->have_posts() ) : $past_query->the_post();
							get_template_part( 'content', 'past' );
						// End the loop.
						endwhile;
						echo '</div>';
					echo '</section>';					
					// Restore original Post Data //
					wp_reset_postdata();









				// If no content, include the "No posts found" template.
				else :

					// get_template_part( 'content', 'none' );
				endif;


				?>








		</main><!-- .site-main -->
	</section><!-- .content-area -->


	<?php get_footer(); ?>

