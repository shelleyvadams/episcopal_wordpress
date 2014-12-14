<header>
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('header')) : else : ?>

	<?php endif; ?>

	<div class="header-wrapper">
<!--
		<div class="img">
			<a href="<?php echo home_url(); ?>"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="parish logo" /></a>
		</div>
-->

		<h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>

		<img class="logo" src="<?php echo get_bloginfo('template_url'); ?>/img/logo.png" alt="logo"/>
	</div>

	<div class="main-border"></div>

	<div class="slide-show">
		<?php do_action('slideshow_deploy'); ?>
	</div>

	<div class="main-border"></div>
</header>
