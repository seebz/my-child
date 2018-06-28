<?php
/**
 * Jetpack Compatibility File
 *
 * @link    https://jetpack.com/
 *
 * @package MyChild
 */

/**
 * Jetpack Development Mode
 *
 * @link https://jetpack.com/support/development-mode/
 */
// add_filter( 'jetpack_development_mode', '__return_true' );

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.me/support/
 */
function mychild_jetpack_setup() {}
add_action( 'after_setup_theme', 'mychild_jetpack_setup' );
