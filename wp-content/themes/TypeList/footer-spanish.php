<?php
/**
 * spanish footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

	</div><!-- .site-content -->

	<footer class="site-footer trunk" role="contentinfo">
		<div class='site-info float-container'>
			<div class='L-1-3'>
				<?php the_field('address' ,121) ?>
				<div class="opening-times">
					<?php
					while ( have_rows('opening_times' ,121) ) : the_row();
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
				</div>
			</div>
			<div class='L-1-3'>
				<?php
				while ( have_rows('support' ,167) ) : the_row();
					$link = get_sub_field('support_page_es');
					$label = get_sub_field('support_title_es');
					$text = get_sub_field('support_text_es');

			        if( get_row_layout() == 'support_es' ):
			        	echo '<p class="">'.$text.'</p>';
			        	echo '<a class="button" href="/apoyar">'.$label.'</a>';
			        endif;
				endwhile;
				?>


			</div>
			<div class='L-1-3'>
					Mailchimp aqui
			</div>
		</div><!-- .site-info -->
		<div class='social float-container'>
			<?php
			while ( have_rows('social_media' ,167) ) : the_row();
				$link = get_sub_field('link');
				$platform = get_sub_field('platform');

		        if( get_row_layout() == 'social_link' ):
		        	echo '<a class="'.$platform.'" href="'.$link.'" target="_blank"> <span class="icon"></span>';
		        	echo '</a>';
		        endif;
			endwhile;
			?>
		</div><!-- .social -->
		<div class='sponsor float-container'>

			<?php
			while ( have_rows('sponsors' ,167) ) : the_row();

				$sponsor = get_sub_field('sponsor_text_es');
				$sponsor = get_sub_field('sponsor_logo');

		        if( get_row_layout() == 'sponsors' ):
		        	echo '<p class="sponsor-text">'.$text.'</p>';
		        	echo  '<img src="' . $sponsor . '">';
		        endif;
			endwhile;
			?>
		</div><!-- .sponsor -->
	</footer><!-- .site-footer -->

</div><!-- .site -->



<?php wp_footer(); ?>

</body>
</html>
