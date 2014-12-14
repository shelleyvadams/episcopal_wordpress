<?php
	/**
	 * Starkers functions and definitions
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
	 * @package     WordPress
	 * @subpackage  Starkers
	 * @since       Starkers 4.0
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
	 * @author Keir Whitaker
	 */

	function starkers_script_enqueuer() {
		wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery' ) );
		wp_enqueue_script( 'site' );

		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
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

	// Remove old copyright text
	add_action( 'init' , 'mh_remove_copy' , 15 );
	function mh_remove_copy() {
		remove_action( 'attitude_footer', 'attitude_footer_info', 30 );
	}

	// Add my own copyright text
	add_action( 'attitude_footer' , 'mh_footer_info' , 30 );
	function mh_footer_info() {
		$output = '<div class="copyright">'.'Copyright © [the-year] [site-link] Powered by: SUPER MARTIANS FROM MARS! '.'</div><!-- .copyright -->';
		echo do_shortcode( $output );
	}

	add_action( 'init', 'my_add_excerpts_to_pages' );
	function my_add_excerpts_to_pages() {
		add_post_type_support( 'page', 'excerpt' );
	}

	/* ========================================================================================================================

	Custom Post Types

	======================================================================================================================== */

	add_action( 'init', 'ns_register_customposts', 0 );
	function ns_register_customposts() {

		register_post_type('people',
			array(	'label' => 'people',
			'description' => 'people',
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'capability_type' => 'page',
			'hierarchical' => true,
			'query_var' => true,
			'has_archive' => false,
			'rewrite' => true,
			'exclude_from_search' => true,
			'supports' => array('title','page-attributes','thumbnail'),
			'menu_position' => 28,
			// 'taxonomies' => array('category'),
			'labels' => array (
			'name' => 'Parish Leaders',
			'singular_name' => 'Person',
			'menu_name' => 'Parish Leaders',
			'add_new' => 'Add Person',
			'add_new_review' => 'Add New Person',
			'edit' => 'Edit',
			'edit_review' => 'Edit Person',
			'new_review' => 'New Person',
			'view' => 'View Person',
			'view_review' => 'View Person',
			'search_reviews' => 'Search Person',
			'not_found' => 'No Person Found',
			'not_found_in_trash' => 'No Person Found in Trash',
			'parent' => 'Parent Person',
		),) );

		register_post_type('services',
			array(	'label' => 'services',
			'description' => 'services',
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'capability_type' => 'page',
			'hierarchical' => true,
			'query_var' => true,
			'has_archive' => false,
			'rewrite' => true,
			'exclude_from_search' => true,
			'supports' => array('title','page-attributes'),
			'menu_position' => 28,
			// 'taxonomies' => array('category'),
			'labels' => array (
			'name' => 'Service Times',
			'singular_name' => 'Service Time',
			'menu_name' => 'Service Times',
			'add_new' => 'Add Service Time',
			'add_new_review' => 'Add New Service Time',
			'edit' => 'Edit',
			'edit_review' => 'Edit Service Time',
			'new_review' => 'New Service Time',
			'view' => 'View Service Time',
			'view_review' => 'View Service Time',
			'search_reviews' => 'Search Service Time',
			'not_found' => 'No Service Time Found',
			'not_found_in_trash' => 'No Service Time Found in Trash',
			'parent' => 'Parent Service Time',
		),) );
	}

	/* ========================================================================================================================

	Custom Meta Boxes

	======================================================================================================================== */

	include_once 'metaboxes/setup.php';

	include_once 'metaboxes/bio-spec.php';

	include_once 'metaboxes/map-spec.php';

	include_once 'metaboxes/times-spec.php';


	/* ========================================================================================================================

	Custom Widgets

	======================================================================================================================== */

	// add widgetized areas
	if (function_exists('register_sidebar')) {

		register_sidebar(array(
			'name' => 'Header',
			'id'   => 'header',
			'description'   => 'This is a widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		));

		register_sidebar(array(
			'name' => 'Sidebar',
			'id'   => 'sidebar',
			'description'   => 'This is a widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		));
	}

	// unregister all widgets
	function jpb_unregister_widgets(){
		unregister_widget('WP_Widget_Pages');
		unregister_widget('WP_Widget_Calendar');
		unregister_widget('WP_Widget_Archives');
		unregister_widget('WP_Widget_Links');
		unregister_widget('WP_Widget_Meta');
		unregister_widget('WP_Widget_Search');
		unregister_widget('WP_Widget_Text');
		unregister_widget('WP_Widget_Categories');
		unregister_widget('WP_Widget_Recent_Posts');
		unregister_widget('WP_Widget_Recent_Comments');
		unregister_widget('WP_Widget_RSS');
		unregister_widget('WP_Widget_Tag_Cloud');
		unregister_widget('WP_Nav_Menu_Widget');
	}

	add_action( 'widgets_init', 'jpb_unregister_widgets' );
