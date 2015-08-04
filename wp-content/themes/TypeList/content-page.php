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

		    // Feature boxes all pages
		    while ( have_rows('feature_boxes') ) : the_row();

				$title = get_sub_field('title');
				$content = get_sub_field('content');
				$images = get_field('gallery');

				// small box
		        if( get_row_layout() == 'small_box' ):
		        	echo '<div class="small">';
			        	echo '<h2>'.$title.'</h2>';
			        	echo '<div>'.$content.'</div>';
			        echo '</div>';
		        endif;

		        // medium box
		        if( get_row_layout() == 'medium_box' ):
		        	echo '<div class="small">';
			        	echo '<h2>'.$title.'</h2>';
			        	echo '<div>'.$content.'</div>';
			        echo '</div>';
		        endif;




		    endwhile;

		?>

     	<?php 

		$images = get_field('gallery');

		if( $images ): ?>
		    <div class='main-gallery'>
		        <?php foreach( $images as $image ): ?>
		            <div class='gallery-cell'>
		                <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
		            </div>
		        <?php endforeach; ?>
		    </div>
		<?php endif; ?>


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

