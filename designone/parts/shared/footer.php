
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
		<div class="footer-logos">
			<img src="<?php echo get_bloginfo('template_url'); ?>/img/horizontal-logo.png" alt="logo"/>
			<h2 class="footer-welcome">Welcomes You</h2>
		</div>
	</footer>
