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
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

	<div class="section-wrapper clearfix">
		<main>
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<article class="regular-page">
				<h1 class="page-title"><a href="<?php the_permalink(); ?>" title="Permanent link to “<?php the_title(); ?>”"><?php the_title(); ?></a></h1>
				<?php the_content(); ?>
			</article>
			<?php endwhile; ?>
		</main>
		<?php include_once 'sidebar.php'; ?>
	</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
