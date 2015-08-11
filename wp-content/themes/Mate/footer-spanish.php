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

	<footer class="site-footer" role="contentinfo">
		<div class=''>
			<div class='trunk float-container'>
				<div class='L-1-3'>
					<div class='address'>
						<?php
						while ( have_rows('address' ,167) ) : the_row();
							$title = get_sub_field('address_title_es');
							$label = get_sub_field('address_label_es');
							$address = get_field('address' ,125);

					        if( get_row_layout() == 'address' ):
					        	echo '<h4>'.$title.'</h4>';
					        	echo '<p>'.$address.'</p>';
					        	echo '<a class="button" href="/support">'.$label.'</a>';
					        endif;
						endwhile;
						?>
					</div>
					<div class="opening-times inline-block-container">
						<?php
						while ( have_rows('opening_times' ,125) ) : the_row();
							$day = get_sub_field('day');
							$opening = get_sub_field('opening');
							$closing = get_sub_field('closing');

					        if( get_row_layout() == 'days' ):
					        	echo '<div class="day L-1-2">';
					        		echo $day;
					        	echo '</div>';
					        	echo '<div class="times L-1-2">';
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
						$title = get_sub_field('support_title_es');
						$text = get_sub_field('support_text_es');
						$label = get_sub_field('support_label_es');
						$link = get_sub_field('support_page_es');

				        if( get_row_layout() == 'support' ):
				        	echo '<h4 class="">'.$title.'</h4>';
				        	echo '<p class="">'.$text.'</p>';
				        	echo '<a class="button" href="/apoyar">'.$label.'</a>';
				        endif;
					endwhile;
					?>


				</div>
				<div class='L-1-3'>
					<?php
					while ( have_rows('newsletter' ,167) ) : the_row();
						$title = get_sub_field('newsletter_title_es');
						$text = get_sub_field('newsletter_text_es');

				        if( get_row_layout() == 'newsletter' ):
				        	echo '<h4 class="">'.$title.'</h4>';
				        	echo '<p class="">'.$text.'</p>';

				        endif;
					endwhile;
					?>
				</div>
			</div>
		</div><!-- .site-info -->
		<div class='social inline-block-container'>
			<?php
			while ( have_rows('social_media' ,167) ) : the_row();
				$link = get_sub_field('link');
				$platform = get_sub_field('platform');

		        if( get_row_layout() == 'social_link' ):
		        	echo '<a class="'.$platform.' L-1-4" href="'.$link.'" target="_blank"> <span class="icon"></span>';
		        	echo '</a>';
		        endif;
			endwhile;
			?>
		</div><!-- .social -->
		<div class='sponsor L-1-1'>

			<?php
			while ( have_rows('sponsors' ,167) ) : the_row();

				$text = get_sub_field('sponsor_text_es');
				$sponsor = get_sub_field('sponsor_logo');

		        if( get_row_layout() == 'sponsors' ):
		        	echo '<p>'.$text.'</p>';
		        	echo '<div><img src="' . $sponsor . '"></div>';
		        endif;
			endwhile;
			?>
		</div><!-- .sponsor -->
	</footer><!-- .site-footer -->


</div><!-- .site -->



<?php wp_footer(); ?>

</body>
</html>
