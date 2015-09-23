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
	$text = get_field('text_colour');
?>

<article id="post-<?php the_ID(); ?>" class='post white-<?php echo $text; ?>' style='background-color: <?php echo $colour; ?>'>
<!-- <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> -->
	

	<!-- get post thumbnail url -->
	<?php global $post; ?>
	<?php
		$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
	?>
	<div class='poster top' style="background: url(<?php echo $src[0]; ?> )">
		<div class='header-wrapper trunk gutters'>
			<header class="entry-header">

				<div class='date'>
					<?php the_field ('start_date') ?>
					<?php the_field ('end_date') ?>
					<?php the_field ('start_time') ?>
					<?php the_field ('end_time') ?>
				</div>

				<?php
					if ( is_single() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
					endif;
				?>
				<div class='category'>
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
				</div>

			</header><!-- .entry-header -->
		</div>
		<figcaption class='caption feature-caption L-1-1'>
			<?php the_post_thumbnail_caption(); ?>
		</figcaption>
		<!-- Reset query after query -->
				<?php wp_reset_postdata(); ?>
	</div>



	<div class="entry-content trunk">

		<aside class='sidebar L-1-3 M-1-1 gutters'>
			<div class='float-container'>
				<div class="related-cat gutters L-1-1 M-1-3 S-1-2">

					<?php
						$categories = get_the_category($post->ID);
						foreach($categories as $category) :
							$children = get_categories( array ('parent' => $category->term_id ));
							$has_children = count($children);
							if ( $has_children == 0 ) {

						 	echo '<a class="button back" href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '<span class="icon"></span></a>';
						 	echo '<p class="">' . $category->description . '</p>';
							}
						endforeach;
					?>

				</div>

				<!-- Display links from Related Pages custom field -->
				<?php 
					$posts = get_field('related_pages');
					if( $posts ): ?>
					<ul class='related-pages gutters L-1-1 M-1-3 S-1-2'>
						<?php foreach( $posts as $post): ?>
					        <?php setup_postdata($post); ?>
				           	<li>
					           	<a class='button link' href="<?php the_permalink(); ?>">
						           <?php the_title(); ?>
						           <span class='icon'></span>
						        </a>
					       	</li>
					    <?php endforeach; ?>
					 </ul>
				<?php endif; ?>
				<!-- Reset query after loop -->
				<?php wp_reset_postdata(); ?>

				<!-- sponsor custom field -->

				<?php
					$sponsor = get_field('sponsor');
				if( $sponsor ): ?>

						<?php
							$currentlang = get_bloginfo('language');
							if($currentlang=="en-US"):
								echo '<div class="sponsor gutters L-1-1 M-1-3 S-1-1">Supported by';
							?>
							<?php else: 
								echo '<div class="sponsor gutters L-1-1 M-1-3 S-1-1">Apoyado de';
							?>
							<?php endif; ?>

					<?php 
						echo '<img src="' . $sponsor['sizes']['large'] . '">';
						echo '</div>';
					 ?>

				<?php endif; ?>
			</div>
		</aside> <!-- .sidebar -->

		<?php
		if( have_rows('flexible_content') ):

			while ( have_rows('flexible_content') ) : the_row();

				$images = get_sub_field('gallery');
				$video = get_sub_field('video');
				$copy = get_sub_field('copy');
				$quote = get_sub_field('quote');

				if( $images ):

				    echo '<section class="gutters L-2-3 M-1-1"><ul class="main-gallery">';
				        foreach( $images as $image ):
				            echo '<li class="gallery-cell">';
				        	echo '<img src="' . $image['url'] . '" alt="' . $image['alt'] . '" />';
				        	echo '<span class="caption">' . $image['caption'] . '</span>';
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

			        	echo '<div class="participant float-container L-2-3 M-1-1">';
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


