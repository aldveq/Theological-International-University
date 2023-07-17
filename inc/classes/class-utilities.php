<?php

/**
 * @package Theological_International_University
 */

namespace TIU_THEME\Inc;

use TIU_THEME\Inc\Traits\Singleton;

class Utilities
{
	use Singleton;

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
}