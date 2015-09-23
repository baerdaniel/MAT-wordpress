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
		$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
	?>
	<div class='poster top' style="background: url(<?php echo $src[0]; ?> )">
	</div>
	<header class="page-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		
	</header><!-- .entry-header -->

	<div class="entry-content">

		
		<?php 
			$map = get_field('map');
			if ( $map ):
				echo '<div class="map">' . do_shortcode( $map ) . '</div>';
			endif;
		?>



		<?php

		if( have_rows('section') ):

			echo '<section class="feature-boxes trunk inline-block-container">';


		    // Feature boxes all pages
		    while ( have_rows('section') ) : the_row();

		    
		    	$section = get_sub_field('section_title');

				$title = get_sub_field('title');
				$content = get_sub_field('content');
				$quote = get_sub_field('quote');
				$images = get_sub_field('gallery');
				$video = get_sub_field('video');
				$singleImage = get_sub_field('image');
				$link = get_sub_field('link');
				$url = get_sub_field('external_link');
				$label = get_sub_field('link_label');
				$size = get_sub_field('size');


					// small boxes
			        if( get_row_layout() == 'section_title' ):

			        		if( $title ):
			        			echo '</section> ';	
			        				echo '<div class="section-title L-1-1"><div class="trunk gutters"><h1>'.$title.'</h1></div></div>';
			        			echo '<section class="feature-boxes trunk inline-block-container">';
			        		endif;

			        endif;


					// all boxes
			        if( get_row_layout() == 'content_box' ):
			        	echo '<div class="feature-box ' .$size. ' gutters">';

			        		if( $video ):
			        			echo '<div class="video">'.$video.'</div>';
			        		endif;
			        		if( $singleImage ):
				        		echo '<img src="' . $singleImage['url'] . '" alt="' . $singleImage['alt'] . '" />';
				        	endif;
							if( $images ):
							    echo '<ul class="main-gallery">';
							        foreach( $images as $image ):
							            echo '<li class="gallery-cell">';
							        	echo '<img src="' . $image['url'] . '" alt="' . $image['alt'] . '" />';
							            echo '</li>';
							        endforeach;
							    echo '</ul>';
							endif;

							if( $title ):
					        	echo '<h2>'.$title.'</h2>';
					        endif;
							if( $content ):
				        		echo '<div>'.$content.'</div>';
				        	endif;
				        	if( $quote ):
				        		echo '<div>'.$quote.'</div>';
				        	endif;
							if( $link ):
				        		echo '<a href='.$link.' class="button link">' .$label.'<span class="icon"></span></a>';
				        	endif;
				        	if( $url ):
				        		echo '<a href='.$url.' class="button link">' .$label.'<span class="icon"></span></a>';
				        	endif;

						echo '</div>'; 
			        endif;


	        

		    endwhile;

			echo '</section> ';	


		endif;

		?>



	<!-- 	<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?> -->

	</div><!-- .entry-content -->


</article><!-- #post-## -->

