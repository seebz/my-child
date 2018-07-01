<?php
/**
 * MyChild admin functions and definitions.
 *
 * @package MyChild
 */

/**
 * Sets up admin defaults and registers support for various WordPress features.
 */
function mychild_admin_setup() {}
add_action( 'after_setup_theme', 'mychild_admin_setup' );


/**
 * Enqueue admin scripts and styles.
 */
function mychild_admin_scripts() {
	global $mychild_version, $mychild_template;

	// Styles
	wp_enqueue_style( 'mychild-admin-style', get_stylesheet_directory_uri() . '/assets/css/admin/admin.css' );
}
add_action( 'admin_enqueue_scripts', 'mychild_admin_scripts' );
