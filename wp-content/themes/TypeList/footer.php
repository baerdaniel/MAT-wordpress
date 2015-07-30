<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

	</div><!-- .site-content -->

	<footer class="site-footer" role="contentinfo">
		<div class="site-info">
		FOOTER
		<?php

		$variable = get_field('field_name', 121);
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

		?>
		</div><!-- .site-info -->
	</footer><!-- .site-footer -->

</div><!-- .site -->

<!--<?php wp_footer(); ?>-->

</body>
</html>
