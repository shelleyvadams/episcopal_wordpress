<?php
/**
 * The Template for displaying all single posts
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package     WordPress
 * @subpackage  Starkers
 * @since       Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header') ); ?>

	<div class="section-wrapper clearfix">

		<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/header' ) ); ?>
		<div class="wrap">
			<section>
				<h3><?php echo get_the_title(17); ?></h3>
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<article class="post-article clearfix">
					<h4 class="article-header"><?php the_title(); ?></h4>
					<p class="article-info">Posted By: <?php the_author(); ?> - <?php the_time('j M y'); ?></p>
					<?php the_post_thumbnail(); ?>
					<div class="post-content-wrapper"><?php the_content(); ?></div>
				</article>
				<?php endwhile; ?>
			</section>
		</div>
		<div class="main-border-bottom"></div>
	</div>

	<?php include_once 'sidebar.php'; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
