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

<?php 
	$colour = get_field('colour');
?>

<article id="post-<?php the_ID(); ?>" class='post' style='background-color: <?php echo $colour; ?>'>
<!-- <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> -->
	

	<!-- get post thumbnail url -->
	<?php global $post; ?>
	<?php
		$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
	?>
	<div class='poster' style="background: url(<?php echo $src[0]; ?> )">
		<header class="entry-header">

		<?php the_field ('start_date') ?>
		<?php the_field ('end_date') ?>
		<?php the_field ('start_time') ?>
		<?php the_field ('end_time') ?>

		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>
		<?php
			$categories = get_the_category($post->ID);
			foreach($categories as $category) :
				$children = get_categories( array ('parent' => $category->term_id ));
				$has_children = count($children);
				if ( $has_children == 0 ) {
			 	echo $category->name;
				}
			endforeach;
		?>
	</header><!-- .entry-header -->

	</div>



	<div class="entry-content trunk">

		<?php
			$categories = get_the_category($post->ID);

			foreach($categories as $category) :

				$children = get_categories( array ('parent' => $category->term_id ));
				$has_children = count($children);

				if ( $has_children == 0 ) {
				echo '<div class="related-cat L-1-3 M-1-1 gutters">';
			 	echo '<a class="button link" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '<span class="icon"></span></a>';
			 	echo '<p class="">' . $category->description . '</p>';
			 	echo '</div>';			 	
				}
			endforeach;
		?>

		<?php
		if( have_rows('flexible_content') ):

			while ( have_rows('flexible_content') ) : the_row();

				$images = get_sub_field('gallery');
				$video = get_sub_field('video');
				$copy = get_sub_field('copy');

				if( $images ):

				    echo '<section class="L-1-1 gutters"><ul class="main-gallery">';
				        foreach( $images as $image ):
				            echo '<li class="gallery-cell">';
				        	echo '<img src="' . $image['url'] . '" alt="' . $image['alt'] . '" />';
				            echo '</li>';
				        endforeach;
				    echo '</ul></section>';
				endif;

				if( $video ):
			        echo '<section class="L-2-3 M-1-1 gutters"><div class="video">'.$video.'</div></section>';
			    endif;

			    if( $copy ):
			    	echo '<section class="L-2-3 M-1-1 gutters"><div class="copy">'.$copy.'</div></section>';
			    endif;

			endwhile;
		endif; ?>



		<?php

			    // various
			    while ( have_rows('participants') ) : the_row();

					$image = get_sub_field('image');
					$name = get_sub_field('name');
					$life = get_sub_field('life_short');
					$bio = get_sub_field('bio');

			        if( get_row_layout() == 'participant' ):

			        	echo '<div class="participant float-container">';
			        		echo '<div class="portrait L-1-4 gutters"><img src="' . $image['sizes']['large'] . '"></div>';
			        		echo '<div class="L-3-4 gutters">';
			        			echo '<h2 class="">' . $name . '</h2>';
			        			echo '<p class="life">' . $life . '</p>';
			        			echo '<p>' . $bio . '</p>';
			        		echo '</div>';
			        	echo '</div>';

			        endif;

			    endwhile;

		?>	

	</div><!-- .entry-content -->


</article><!-- #post-## -->


