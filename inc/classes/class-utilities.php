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

	public function shortcode_get_current_year() {
		return current_time( 'Y' );
	}
}