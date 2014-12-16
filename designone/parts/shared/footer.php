
	<footer>
		<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('footer')) : else : ?>

		<?php endif; ?>

		<div class="footer-logos">
			<img src="<?php echo get_bloginfo('template_url'); ?>/img/horizontal-logo.png" alt="logo"/>
			<h2 class="footer-welcome">Welcomes You</h2>
		</div>
	</footer>
