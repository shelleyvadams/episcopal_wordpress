<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package     WordPress
 * @subpackage  Starkers
 * @since       Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header') ); ?>

	<?php include_once 'social-media.php'; ?>

	<div class="section-wrapper clearfix">

		<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/header' ) ); ?>
		<div class="wrap">
			<section>
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<h3><?php the_title(); ?></h3>
				<article class="regular-page"><?php the_content(); ?></article>
				<?php endwhile; ?>
			</section>
		</div>
		<div class="main-border-bottom"></div>
	</div>

	<?php include_once 'sidebar.php'; ?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
