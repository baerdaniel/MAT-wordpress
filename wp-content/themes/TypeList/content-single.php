<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" class='post trunk'>
<!-- <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> -->

	

	<!-- get post thumbnail url -->
	<?php global $post; ?>
	<?php
		$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
	?>
	<div class='poster' style="background: url(<?php echo $src[0]; ?> )">
	</div>

	<header class="entry-header">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>
				<?php the_field('subtitle') ?>
		<?php the_category() ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content() ?>

<!-- 		<?php 

				// check for rows (parent)
				if( have_rows('participants') ): ?>
					<div class="participants">
					<?php 

					// loop through rows (parent)
					while( have_rows('participants') ): the_row(); ?>

						
						<div>


							<h3><?php the_sub_field('name'); ?></h3>
							<h3><?php the_sub_field('bio'); ?></h3>
							<?php the_sub_field('image'); ?>
							
							
						</div>	

					<?php endwhile; ?>
					</div>
				<?php endif; ?>
 -->


		<?php

			    // various
			    while ( have_rows('participants') ) : the_row();

					$image = get_sub_field('image');
					$title = get_sub_field('title');
					$bio = get_sub_field('bio');

			        if( get_row_layout() == 'participant' ):

			        	echo '<div class="participant">';
			        		echo '<div class="portrait"><img src="' . $image['sizes']['large'] . '"></div>';
			        		echo '<h3 class="">' . $name . '</h3>';
			        		echo '<p>' . $bio . '</p>';
			        	echo '</div>';

			        endif;

			    endwhile;

		?>


     	<?php 

		$images = get_field('gallery');

		if( $images ): ?>
		    <ul class='main-gallery'>
		        <?php foreach( $images as $image ): ?>
		            <li>
		                <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
		                <?php echo $image['caption']; ?>
		            </li>
		        <?php endforeach; ?>
		    </ul>
		<?php endif; ?>

		<?php

			    // video embed
			    while ( have_rows('videos') ) : the_row();

					$video = get_sub_field('video');

			        if( get_row_layout() == 'youtube' ):
			        	echo '<div class="video">';
			        		echo '<iframe width="100%" height="auto" src="https://www.youtube.com/embed/' . $video . '?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>';
			        	echo '</div>';
			        endif;

			        if( get_row_layout() == 'vimeo' ):
			        	echo '<div class="video">';
			        		echo '<iframe width="100%" height="auto" src="https://player.vimeo.com/video/' . $video . '?color=ffffff&title=0&byline=0&portrait=0 frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
			        	echo '</div>';
			        endif;

			    endwhile;

		?>



		<?php

			    // various
			    while ( have_rows('content_boxes') ) : the_row();

					$image = get_sub_field('image');
					$title = get_sub_field('title');
					$body = get_sub_field('body');

			        if( get_row_layout() == 'narrow' ):

			        	echo '<div class="narrow">';
			        		echo '<div class="image">' . $image . '</div>';
			        		echo '<h3 class="">' . $title . '</h3>';
			        		echo '<p>' . $body . '</p>';
			        	echo '</div>';

			        endif;
			        if( get_row_layout() == 'wide' ):

			        	echo '<div class="wide">';
			        		echo '<div class="image">' . $image . '</div>';
			        		echo '<h3 class="">' . $title . '</h3>';
			        		echo '<p>' . $body . '</p>';
			        	echo '</div>';

			        endif;


			    endwhile;

		?>
	</div><!-- .entry-content -->


</article><!-- #post-## -->
