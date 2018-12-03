<?php
/**
 * MyChild admin functions and definitions.
 *
 * @package MyChild
 */

/**
 * Sets up admin defaults and registers support for various WordPress features.
 */
function mychild_admin_setup() {
	/**
	 * Editor Style
	 * @link https://codex.wordpress.org/Editor_Style
	 */
	// add_theme_support( 'editor-styles' );
	// add_editor_style( 'assets/css/admin/editor-style.css' );
}
add_action( 'after_setup_theme', 'mychild_admin_setup', 11 );


/**
 * Enqueue admin scripts and styles.
 */
function mychild_admin_scripts() {
	global $mychild_version, $mychild_template;

	// Styles
	// wp_enqueue_style( 'mychild-admin-style', get_stylesheet_directory_uri() . '/assets/css/admin/admin.css' );
}
add_action( 'admin_enqueue_scripts', 'mychild_admin_scripts' );
