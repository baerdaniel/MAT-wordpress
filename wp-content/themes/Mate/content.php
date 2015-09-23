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


<article id="post-<?php the_ID(); ?>" <?php post_class( 'post L-1-1' ); ?>>
<!-- <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> -->

	<!-- get post thumbnail url -->
	<?php global $post; ?>
	<?php
		$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
		$colour = get_field('colour');
	?>
	<a href="<?php the_permalink(); ?>">
		<div class='poster' style="background-image: url(<?php echo $src[0]; ?> ); ?>">
		</div>
		<div class='poster-color' style="background-color: <?php echo $colour; ?>">
		</div>
	</a>

	<a href="<?php the_permalink(); ?>">
		<div class='header-wrapper trunk gutters'>
			<header class="entry-header active-<?php the_field ('active') ?>">
				<div class='date'>
					<?php 
						$startDate = get_field ('start_date');
						$endDate = get_field ('end_date');
						$startTime = get_field ('start_time');
						$endTime = get_field ('end_time');

						if( $startDate ):
							echo $startDate;
						endif;
						if( $endDate ):
							echo ' – ' .$endDate;
						endif;
						if( $startTime ):
							echo '<p class="time">' .$startTime ;
							echo ' – ' .$endTime. '</p>';
						endif;

					?>
					
				</div>
				<h1><?php the_title() ?></h1>

				<?php
					$categories = get_the_category($post->ID);
					foreach($categories as $category) :
						$children = get_categories( array ('parent' => $category->term_id ));
						$has_children = count($children);
						$cat_name = $category->name;
						if ( $has_children == 0 ) {
					 	echo '<div class="content-cat">' . $cat_name . '</div>';
						}
					endforeach;
				?>

			</header><!-- .entry-header -->

		</div>

	</a>

</article><!-- #post-## -->
