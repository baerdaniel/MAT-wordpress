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


<article id="post-<?php the_ID(); ?>" <?php post_class( 'post L-1-4 M-1-3 S-1-1 gutters' ); ?>>
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
		<div class=''>
			<header class="">
				<div class='date'>
				</div>
				<h2><?php the_title() ?></h2>
				<div class='categories'>
					<?php
						$categories = get_the_category($post->ID);
						foreach($categories as $category) :
							$children = get_categories( array ('parent' => $category->term_id ));
							$has_children = count($children);
							if ( $has_children == 0 ) {
						 	echo '<div class="category">';
						 		echo $category->name;
						 	echo '</div>';
							}
						endforeach;
					?>
				</div>
				<div class='date'>
					<?php the_field ('start_date') ?>
					–
					<?php the_field ('end_date') ?>
				</div>
			</header><!-- .entry-header -->

		</div>

	</a>

</article><!-- #post-## -->
