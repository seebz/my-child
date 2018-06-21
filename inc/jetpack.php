<?php
/**
 * Jetpack Compatibility File
 *
 * @link    https://jetpack.com/
 *
 * @package MyChild
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.me/support/
 */
function mychild_jetpack_setup() {}
add_action( 'after_setup_theme', 'mychild_jetpack_setup' );
