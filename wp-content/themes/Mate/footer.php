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





	<div class='related-content'>
	<?php 

		$posts = get_field('related_content');

		if( $posts ): ?>

			<section class="L-1-1">
				<?php
				$currentlang = get_bloginfo('language');
				if($currentlang=="en-US"):
					echo '<h2 class="trunk">Related Content</h2>';
				?>
				<?php else: 
					echo '<h2 class="trunk">Contenido Relacionado</h2>';
				?>
				<?php endif; ?>
				<ul class="main-gallery">

				    <?php foreach( $posts as $post): ?>
				        <?php setup_postdata($post); ?>
				        <li class="gallery-cell gutters">
				            <a href="<?php the_permalink(); ?>">
				           		<?php the_post_thumbnail('thumbnail'); ?>
				           	</a>
				           	<p>Posted on <?php the_date(); ?></p>
				           	<a href="<?php the_permalink(); ?>">

					            <h3>
					            	<?php the_title(); ?>
					            </h3>
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

					            <div class='excerpt'>
					            		<?php the_excerpt(); ?>
					            </div>
					        	<span class='gradient'></span>
					        </a>

				        </li>
				    <?php endforeach; ?>
		    	</ul>
		    <section>
		    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		<?php endif; ?>
	</div><!-- .related-content -->

	</div><!-- .site-content -->

	<footer class="site-footer L-1-1" role="contentinfo">
			<div class=''>
				<div class='trunk  float-container'>

				<div class='L-1-3 M-1-2 S-1-1 gutters'>
					<div class='address'>
						<?php

							$currentlang = get_bloginfo('language');
							if($currentlang=="en-US"):
								$page = 167;
							else: 
								$page = 167;
							endif;


						while ( have_rows('address' ,167) ) : the_row();
							$title = get_sub_field('address_title_en');
							$label = get_sub_field('address_label_en');
							$link = get_sub_field('address_page_en');
							$address = get_sub_field('address' ,167);

					        if( get_row_layout() == 'address' ):
					        	echo '<h4>'.$title.'</h4>';
					        	echo '<p>'.$address.'</p>';
					        	echo '<a class="button link" href="/visit">'.$label.'<span class="icon"></span></a>';
					        endif;
						endwhile;
						?>

					</div>
					<div class="opening-times inline-block-container">
						<?php
						while ( have_rows('opening_times' ,167) ) : the_row();
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
				<div class='L-1-3 M-1-2 S-1-1 gutters'>

					<?php
					while ( have_rows('support' ,167) ) : the_row();
						$title = get_sub_field('support_title_en');
						$text = get_sub_field('support_text_en');
						$label = get_sub_field('support_label_en');
						$link = get_sub_field('support_page_en');

				        if( get_row_layout() == 'support' ):
				        	echo '<h4>'.$title.'</h4>';
				        	echo '<p class="">'.$text.'</p>';
				        	echo '<a class="button link" href="'.$link.'">'.$label.'<span class="icon"></span></a>';
				        endif;
					endwhile;
					?>

				</div>
				<div class='L-1-3 M-1-2 S-1-1 gutters'>
					<?php
					while ( have_rows('newsletter' ,167) ) : the_row();
						$title = get_sub_field('newsletter_title_en');
						$text = get_sub_field('newsletter_text_en');

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
				$text = get_sub_field('sponsor_text');
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
