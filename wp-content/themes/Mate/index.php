<?php
/**
 * The main template file
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
					//$cat = get_category_by_slug('exhibitions'); // get category object
					//$cat = pll_get_term($cat->term_id); // get id of translation
					//query_posts("cat=$cat&order=asc");
					while (have_posts()) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );

					// End the loop.
					endwhile;

					// Previous/next page navigation.
					// the_posts_pagination( array(
					// 	'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
					// 	'next_text'          => __( 'Next page', 'twentyfifteen' ),
					// 	'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
					// ) );

				// If no content, include the "No posts found" template.
				else :
					get_template_part( 'content', 'none' );

				endif;
				?>
			</div> <!-- .whats-on -->

			<?php include 'content-page-php';?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->


	<!-- language footers -->
	<?php
		$currentlang = get_bloginfo('language');
		if($currentlang=="en-US"):
			get_footer();
	?>
	<?php else: 
		include 'footer-spanish.php';
	?>
	<?php endif; ?>



