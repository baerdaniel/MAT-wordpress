<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		twentyfifteen_post_thumbnail();
	?>

	<header class="page-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		
	</header><!-- .entry-header -->

	<div class="entry-content">

		
		<?php 
			$map = get_field('map');
			$address = get_field('address');

			if ( $map ):
				echo '<div class="map">' . do_shortcode( $map ) . '</div>';
			endif;

			if ( $address ):
				echo '<div class="address">' . $address . '</div>';
			endif;
		?>

		<?php

		    // Visit page opening
		    while ( have_rows('opening_times') ) : the_row();

				$day = get_sub_field('day');
				$opening = get_sub_field('opening');
				$closing = get_sub_field('closing');

		        if( get_row_layout() == 'days' ):
		        	echo '<div class="day">';
		        		echo $day;
		        	echo '</div>';
		        	echo '<div class="times">';
		        		echo $opening;
		        		echo '–';
		        		echo $closing;
		        	echo '</div>';
		        endif;


		    endwhile;

		?>







				<?php 

				// check for rows (parent repeater)
				if( have_rows('section') ): ?>
					<div id="to-do-lists">
					<?php 

					// loop through rows (parent repeater)
					while( have_rows('section') ): the_row(); ?>
						<div>
							<h3><?php the_sub_field('title'); ?></h3>
							<?php 

							// check for rows (sub repeater)
							if( have_rows('small_box') ): ?>
								<ul>
								<?php 

								// loop through rows (sub repeater)
								while( have_rows('small_box') ): the_row();

									// display each item as a list - with a class of completed ( if completed )
									?>
									<li <?php if( get_sub_field('small_box') ){ echo 'class="completed"'; } ?>>
										<?php the_sub_field('content'); ?>
										<?php the_sub_field('title'); ?>
									</li>
								<?php endwhile; ?>
								</ul>
							<?php endif; //if( get_sub_field('items') ): ?>
						</div>	

					<?php endwhile; // while( has_sub_field('to-do_lists') ): ?>
					</div>
				<?php endif; // if( get_field('to-do_lists') ): ?>











		<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>

	</div><!-- .entry-content -->

	<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

</article><!-- #post-## -->

