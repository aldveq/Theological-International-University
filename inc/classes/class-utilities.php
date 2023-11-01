<?php

/**
 * @package Theological_International_University
 */

namespace TIU_THEME\Inc;

use TIU_THEME\Inc\Traits\Singleton;

class Utilities
{
	use Singleton;

	protected function __construct() {
		// Actions & Filters
		$this->setup_hooks();
	}

	protected function setup_hooks() {
		add_action( 'init', [$this, 'setup_shortcode_current_year'] );
		add_action( 'init', [$this, 'setup_shortcode_polylang_switcher'] );
	}

	public function get_menu_id_by_location($menu_location)
	{
		$locations = get_nav_menu_locations();
		$menu_id = $locations[$menu_location];
		return $menu_id;
	}

	public function get_menu_items_by_location($menu_location)
	{
		$navigation_id = $this->get_menu_id_by_location($menu_location);

		$navigation_items = wp_get_nav_menu_items($navigation_id);

		return $navigation_items;
	}

	public function setup_shortcode_current_year() {
		add_shortcode( 'year', [$this, 'shortcode_get_current_year'] );
	}

	public function setup_shortcode_polylang_switcher() {
		add_shortcode( 'polylang_switcher_control', [$this, 'front_polylang_switcher'] );
	}

	public function shortcode_get_current_year() {
		return current_time( 'Y' );
	}

	public function front_polylang_switcher() {
		$output = '';
		if ( function_exists( 'pll_the_languages' ) ) {
			$args   = [
				'show_flags' => 1,
				'show_names' => 1,
				'display_names_as' => 'slug',
				'echo'       => 0,
			];
			$lang = pll_the_languages( $args ); 

			$output = "
				<div class='polylang-switcher-wrapper'>
					$lang
				</div>";
		}
		return $output;
	}

	public function highlight_text_with_primary_color( $text ) {
		return preg_replace(
			'~__\*(.*?)\*__~s',
			'<span>$1</span>',
			$text
		);
	}
}