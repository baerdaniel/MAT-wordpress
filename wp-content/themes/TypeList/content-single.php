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
		<?php

			     
			    // Galleries
			    while ( have_rows('gallery') ) : the_row();

			        // check if the nested repeater field has rows of data
		        	if( have_rows('gallery') ):

					 	echo '<ul>';

					 	// loop through the rows of data
					    while ( have_rows('images') ) : the_row();

							$image = get_sub_field('image');

							echo '<li><img src="' . $image['url'] . '" alt="' . $image['alt'] . '" /></li>';

						endwhile;

						echo '</ul>';

					endif;

			    endwhile;

			    // participants
			    while ( have_rows('participants') ) : the_row();

					$image = get_sub_field('image');
					$name = get_sub_field('name');
					$bio = get_sub_field('bio');

			        if( get_row_layout() == 'participant' ):


			        	echo '<div class="portrait"><img src="' . $image['url'] . '" alt="' . $image['alt'] . '" /></div>';
			        	echo "<h3>" . $name . "</h3>";
			        	echo "<p>" . $bio . "</p>";

			        endif;

			    endwhile;


			    // various
			    while ( have_rows('content_boxes') ) : the_row();

					$image = get_sub_field('image');
					$title = get_sub_field('title');
					$body = get_sub_field('body');

			        if( get_row_layout() == 'narrow' ):

			        	echo '<div class="narrow">';
			        		echo '<div class="image">' . $image . '</div>';
			        		echo '<h3 class="brown">' . $title . '</h3>';
			        		echo '<p>' . $body . '</p>';
			        	echo '</div>';

			        endif;
			         if( get_row_layout() == 'wide' ):

			        	echo '<div class="wide">' . $title . '</div>';

			        endif;


			    endwhile;

		?>
	</div><!-- .entry-content -->


</article><!-- #post-## -->
