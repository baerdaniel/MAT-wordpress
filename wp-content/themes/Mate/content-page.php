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
		// Post thumbnail.
		twentyfifteen_post_thumbnail();
	?>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>

		<?php the_field('address') ?>
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

		if( have_rows('feature_boxes') ):

			echo '<section class="feature-boxes float-container">';

		    // Feature boxes all pages
		    while ( have_rows('feature_boxes') ) : the_row();

				$title = get_sub_field('title');
				$content = get_sub_field('content');
				$images = get_sub_field('gallery');
				$video = get_sub_field('video');
				$singleImage = get_sub_field('image');

					// small boxes
			        if( get_row_layout() == 'small_box' ):
			        	echo '<div class="feature-box small gutters L-1-3">';
				        	echo '<h2>'.$title.'</h2>';
				        	echo '<div>'.$content.'</div>';
				        	echo '<div>'.$video.'</div>';
				        	echo '<img src="' . $singleImage['url'] . '" alt="' . $singleImage['alt'] . '" />';


							if( $images ):
							    echo '<ul class="main-gallery">';
							        foreach( $images as $image ):
							            echo '<li class="gallery-cell">';
							        	echo '<img src="' . $image['url'] . '" alt="' . $image['alt'] . '" />';
							            echo '</li>';
							        endforeach;
							    echo '</ul>';
							endif;
						echo '</div>'; 
			        endif;

			        // medium boxes
			        if( get_row_layout() == 'medium_box' ):
			        	echo '<div class="feature-box medium gutters L-1-2">';
				        	echo '<h2>'.$title.'</h2>';
				        	echo '<div>'.$content.'</div>';
				        	echo '<div>'.$video.'</div>';
				        	echo '<img src="' . $singleImage['url'] . '" alt="' . $singleImage['alt'] . '" />';

					        if( $images ):
							    echo '<ul class="main-gallery">';
							        foreach( $images as $image ):
							            echo '<li class="gallery-cell">';
							        	echo '<img src="' . $image['url'] . '" alt="' . $image['alt'] . '" />';
							            echo '</li>';
							        endforeach;
							    echo '</ul>';
							endif;
						echo '</div>';
			        endif;

			        // large boxes
			        if( get_row_layout() == 'large_box' ):
			        	echo '<div class="feature-box large gutters L-2-3">';
				        	echo '<h2>'.$title.'</h2>';
				        	echo '<div>'.$content.'</div>';
				        	echo '<div>'.$video.'</div>';
				        	echo '<img src="' . $singleImage['url'] . '" alt="' . $singleImage['alt'] . '" />';

					        if( $images ):
							    echo '<ul class="main-gallery">';
							        foreach( $images as $image ):
							            echo '<li class="gallery-cell">';
							        	echo '<img src="' . $image['url'] . '" alt="' . $image['alt'] . '" />';
							            echo '</li>';
							        endforeach;
							    echo '</ul>';
							endif;
						echo '</div>';
			        endif;

		    endwhile;

		    echo '</section> ';
		endif;

		?>



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

