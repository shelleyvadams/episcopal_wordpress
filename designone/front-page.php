<?php /* Template name: Home */ ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

		<main>
			<div class="home-wrapper clearfix">

			<?php $args = array(
				'post_type'  => 'post',
				'posts_per_page' => '6',
				'order'      => 'DESC');
			?>

				<?php $the_query = new WP_Query( $args ); ?>

				<?php if ( $the_query->have_posts() ) : ?>

					<?php $countposts = 0; while ( $the_query->have_posts() ) : $the_query->the_post(); $countposts++; ?>

						<article class="other-post clearfix <?php if($countposts == 1) { ?>main-post<?php } ?><?php if($countposts == 2) { ?>second-posts<?php } ?><?php if($countposts == 3) { ?>second-posts<?php } ?>">
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
							<div class="post-content-wrapper"><?php the_excerpt(); ?></div>
						</article>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
			</main>

		<?php include_once 'sidebar.php'; ?>

<?php Starkers_Utilities::get_template_parts( array('parts/shared/footer','parts/shared/html-footer') ); ?>
