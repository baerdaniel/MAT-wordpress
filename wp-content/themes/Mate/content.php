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
	<div class='poster' style="background-image: url(<?php echo $src[0]; ?> ); background-color: <?php echo $colour; ?>">
	</div>

	<header class="entry-header">
		<?php the_field ('start_date') ?>
		<?php the_field ('end_date') ?>
		<?php the_field ('start_time') ?>
		<?php the_field ('end_time') ?>
		<h1><?php the_title() ?></h1>
		
		<!--<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>-->

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

	<div class="entry-content">

	</div><!-- .entry-content -->


</article><!-- #post-## -->
