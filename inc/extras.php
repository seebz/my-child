<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package MyChild
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function mychild_body_classes( $classes ) {
    return $classes;
}
add_filter( 'body_class', 'mychild_body_classes' );
