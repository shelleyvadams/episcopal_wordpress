<div id="header_widgets">
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('header')) : else : ?>

	<?php endif; ?>
</div>

<header>
	<h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>

	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('slideshow')) : else : ?>

	<?php endif; ?>

	<div class="main-border"></div>

	<nav>
		<?php wp_nav_menu( array(
			'primary' => 'Primary Navigation',
			'depth'   => 1,
		) ); ?>
	</nav>
</header>
