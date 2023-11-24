<?php
/**
 * Theological International University functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Theological_International_University
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Autoloaders.
 */
require get_template_directory() . '/inc/helpers/autoloader.php';

/**
 * TIU Theme Instance
 *
 * @return void
 */
function tiu_get_theme_instance() {
	\TIU_THEME\Inc\TIU_THEME::get_instance(); // phpcs:ignore
}
tiu_get_theme_instance();
