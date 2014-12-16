<?php /* Template name: Contacts */ ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/navigation' ) ); ?>

	<div class="section-wrapper clearfix">



		<section class="contact">

			<?php $id = get_the_ID(); ?>

				<?php

				if ( have_posts() ): ?>

					<?php while ( have_posts() ) : the_post();

						$google_map = (trim(get_post_meta($id, '_ns_map', true)));
					?>
				<article class="address clearfix"><?php the_content(); ?> <?php echo $google_map ?></article>
			<?php endwhile; ?>
				<?php endif; ?>


			<div class="contact-wrapper home-wrapper clearfix">
				<h4 class="banner">Parish Leaders</h4>
				<?php $args = array(
					'post_type'  => 'people',
					'order'      => 'ASC');
				?>

				<?php
				global $bio;
				global $args;

				$the_query = new WP_Query($args);

				if ( $the_query->have_posts() ): ?>

					<?php while ( $the_query->have_posts() ) : $the_query->the_post();

						$number = (trim(get_post_meta($the_query->post->ID, '_ns_number', true)));
						$email = (trim(get_post_meta($the_query->post->ID, '_ns_email', true)));
					?>
						<article class="person clearfix">
							<?php the_post_thumbnail(); ?>

							<div class="post-content-wrapper">
								<ul>
									<li><?php the_title(); ?></li>
									<li><?php echo $number ?></li>
									<li><a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></li>
								</ul>
							</div>
						</article>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</section>
		<?php include_once 'sidebar.php'; ?>
	</div>


<?php Starkers_Utilities::get_template_parts( array('parts/shared/footer','parts/shared/html-footer') ); ?>
