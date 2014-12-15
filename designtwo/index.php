<?php
/**
 * Template Name: Parish News
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file
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
				<?php $page = get_page_id('parish-news') ?>
				<h3><?php echo get_the_title($page); ?></h3>

				<div class="table-wrapper">
					<table class="posts-table">
						<tr>
							<th class="date">Date</th>
							<th class="article">Article Title</th>
							<th class="author">Author</th>
						</tr>

						<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						<tr>
							<td class="date"><?php the_time('Y-m-d'); ?></td>
							<td class="article"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
							<td class="author"><?php the_author(); ?></td>
						</tr>
						<?php endwhile; ?>
					</table>

					<div class="pag nav-next align-left"><?php previous_posts_link( '< Newer Posts', $the_query->max_num_pages ); ?></div>
					<div class="pag nav-previous align-right"><?php next_posts_link( 'Older Posts >', $the_query->max_num_pages ); ?></div>
				</div>
			</section>
		</div>
		<div class="main-border-bottom"></div>
	</div>

	<?php include_once 'sidebar.php'; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
