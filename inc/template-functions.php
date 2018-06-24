<?php
/**
 * Additional features to allow styling of the templates
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
