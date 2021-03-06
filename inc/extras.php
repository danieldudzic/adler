<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Adler
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function adler_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of has-post-thumbnail if the featured image is set ( or the first post in the loop has the featured image set ) and a class of no-post-thumbnail if the featured image is missing.
	if ( has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	} else {
		$classes[] = 'no-post-thumbnail';
	}

	return $classes;
}
add_filter( 'body_class', 'adler_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function adler_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'adler_pingback_header' );
