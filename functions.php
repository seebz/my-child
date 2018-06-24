<?php
/**
 * MyChild functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MyChild
 */

/**
 * Assing the MyChild version and template to a var
 */
$theme = wp_get_theme();
$mychild_version  = $theme['Version'];
$mychild_template = $theme['Template'];


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mychild_setup() {
	/**
	 * Suppression des metas `generator`
	 */
	remove_action( 'wp_head', 'wp_generator' );

	/**
	 * Désactivation du support des Emoji
	 */
	remove_action( 'wp_head',         'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
}
add_action( 'after_setup_theme', 'mychild_setup' );


/**
 * Enqueue scripts and styles.
 */
function mychild_scripts() {
	global $mychild_version, $mychild_template;

	// Styles
	wp_enqueue_style( $mychild_template . '-style', get_template_directory_uri() . '/style.css' );

	wp_enqueue_style( 'mychild-style', get_stylesheet_uri(), '', $mychild_version );
	wp_style_add_data( 'mychild-style', 'rtl', 'replace' );

	// Scripts
	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_script( 'mychild-script', get_stylesheet_directory_uri() . '/assets/js/script' . $suffix . '.js', array( 'jquery' ), $mychild_version, true );
}
add_action( 'wp_enqueue_scripts', 'mychild_scripts' );


/**
 * Custom template tags for this theme.
 */
// require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
// require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
// require get_template_directory() . '/inc/jetpack.php';
