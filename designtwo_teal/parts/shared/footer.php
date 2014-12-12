	
	<footer>
		<?php $args = array(
				'post_type'  => 'page',
				'posts_per_page' => '1',
				'order'      => 'DESC');
			?>
				
				<?php $the_query = new WP_Query( $args ); ?>

				<?php if ( $the_query->have_posts() ) : ?>
					
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
				<?php endif; ?>

				<!-- <div id="widgetized-area">

					<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('widgetized-area')) : else : ?>

					<?php endif; ?>

				</div> -->
 		<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" alt="logo"/>

 	</footer>
