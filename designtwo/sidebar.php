<aside>
	<div class="sidebar-images">
		<div class="main-border"></div>
		<!-- <div class="img"><a href="<?php echo home_url(); ?>"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" /></a></div> -->
		<img class="logo" src="<?php echo get_bloginfo('template_url'); ?>/img/logo.png" alt="logo"/>
	</div>

	<div class="sidebar-contents">

		<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar')) : else : ?>

		<?php endif; ?>

	</div>
	<!--/.sidebar-contents-->
</aside>
