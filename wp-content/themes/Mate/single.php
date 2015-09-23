<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			/*
			 * Include the post format-specific template for the content. If you want to
			 * use this in a child theme, then include a file called called content-___.php
			 * (where ___ is the post format) and that will be used instead.
			 */
			get_template_part( 'content-single', get_post_format() );

			// Previous/next post navigation.
			// the_post_navigation( array(
			// 	'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentyfifteen' ) . '</span> ' .
			// 		'<span class="screen-reader-text">' . __( 'Next post:', 'twentyfifteen' ) . '</span> ' .
			// 		'<span class="post-title">%title</span>' . get_the_post_thumbnail($next_post->ID,'thumbnail'),

			// 	'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentyfifteen' ) . '</span> ' .
			// 		'<span class="screen-reader-text">' . __( 'Previous post:', 'twentyfifteen' ) . '</span> ' .
   //          		'<span class="post-title">%title</span>' . get_the_post_thumbnail($previous_post->ID,'thumbnail'),
			// ) );



		// End the loop.
		endwhile;
		?>

		<!-- <div class='post-navigation'>
			<p>Previous</p>
			<?php //previous_post_link( '%link', '%title', TRUE ); ?>
			<p>Next</p>
			<?php //next_post_link( '%link', '%title', TRUE ); ?>
		</div> -->

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
