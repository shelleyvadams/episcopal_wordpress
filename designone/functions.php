<?php
	/**
	 * EpiscopalDesignOne functions and definitions (Based on Starkers 4.0)
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
	 * @package     EpiscopalDesignOne
	 * @since       EpiscopalDesignOne 1.1.0
	 */

	/* ========================================================================================================================

	Required external files

	======================================================================================================================== */

	require_once( 'external/starkers-utilities.php' );

	/* ========================================================================================================================

	Theme specific settings

	Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme

	======================================================================================================================== */

	// $args = array(
	//	'width'         => 195,
	//	'flex-height'   => true,
	//	'height'        => 195,
	//	'header-text'   => false,
	//	'default-image' => get_template_directory_uri() . '/img/parish-logo.jpg',
	// );
	// add_theme_support( 'custom-header', $args );

	add_theme_support('post-thumbnails');

	register_nav_menus(array('primary' => 'Primary Navigation'));

	/* ========================================================================================================================

	Theme Customizer

	======================================================================================================================== */

	/**
	 * Registers options with the Theme Customizer
	 *
	 * @param      object    $wp_customize    The WordPress Theme Customizer
	 * @package    EpiscopalDesignOne
	 * @since      1.1.0
	 * @version    1.1.0
	 */
	function ed1_register_theme_customizer( $wp_customize ) {

		/* Change Color Scheme */
		$wp_customize->add_setting(
			'ed1_color_scheme',
			array(
				'default'   => 'blue',
				'transport' => 'postMessage'
			)
		);

		$wp_customize->add_control(
			'ed1_color_scheme',
			array(
				'section' => 'colors',
				'label'   => 'Color Scheme',
				'type'    => 'radio',
				'choices' => array(
					'blue' => 'Blue',
					'red'  => 'Red',
					'teal' => 'Teal'
				)
			)
		);

	} // end ed1_register_theme_customizer
	add_action( 'customize_register', 'ed1_register_theme_customizer' );

	/**
	 * Registers the Theme Customizer Preview with WordPress.
	 *
	 * @package    EpiscopalDesignOne
	 * @since      1.1.0
	 * @version    1.1.0
	 */
	function ed1_customizer_live_preview() {
		wp_enqueue_script(
			'ed1-theme-customizer',
			get_template_directory_uri() . '/js/theme-customizer.js',
			array( 'jquery', 'customize-preview' ),
			'1.0.0',
			true
		);
	} // end ed1_customizer_live_preview
	add_action( 'customize_preview_init', 'ed1_customizer_live_preview' );

	/* ========================================================================================================================

	Actions and Filters

	======================================================================================================================== */

	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

	add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );


	/* ========================================================================================================================

	Scripts

	======================================================================================================================== */

	/**
	 * Add scripts via wp_head()
	 *
	 * @return void
	 * @author Shelley V. Adams
	 */

	function starkers_script_enqueuer() {
		wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery' ) );
		wp_enqueue_script( 'site' );

		wp_register_style( 'screen', get_template_directory_uri().'/style.css', '', '', 'screen' );
		wp_enqueue_style( 'screen' );

		$colorScheme = get_theme_mod( 'ed1_color_scheme' );
		switch ($colorScheme):
			case 'red':
			case 'teal':
				wp_register_style( 'color', get_template_directory_uri().'/css/' . $colorScheme . '.css', '', '', 'screen' );
			break;
			case 'blue':
			default:
			wp_register_style( 'color', get_template_directory_uri().'/css/blue.css', '', '', 'screen' );
		endswitch;
		wp_enqueue_style( 'color' );
	}

	/* ========================================================================================================================

	Comments

	======================================================================================================================== */

	/**
	 * Custom callback for outputting comments
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	function starkers_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>
		<li>
			<article id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment ); ?>
				<h4><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</article>
		<?php endif;
	}

	add_action( 'init', 'my_add_excerpts_to_pages' );
	function my_add_excerpts_to_pages() {
		add_post_type_support( 'page', 'excerpt' );
	}


	/* ========================================================================================================================

	Custom Widgets

	======================================================================================================================== */

	// add widgetized areas
	if (function_exists('register_sidebar')) {

		register_sidebar(array(
			'name' => 'Sidebar',
			'id'   => 'sidebar',
			'description'   => 'Sidebars are a common location for widgets.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		));

		register_sidebar(array(
			'name' => 'Footer',
			'id'   => 'footer',
			'description'   => 'Located immediately before the footer logo, this is great spot for a text-widget containing a copyright statement.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		));

		register_sidebar(array(
			'name' => 'Header',
			'id'   => 'header',
			'description'   => 'Before site header, this is an ideal location for social media icons.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		));

	}
