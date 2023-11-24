<?php
/**
 * Class Utilities
 *
 * PHP version 8
 *
 * @category Themes
 * @package  Theological_International_University
 * @author   Aldo Paz Velasquez <aldveq80@gmail.com>
 * @license  GPL-2.0-or-later http://www.gnu.org/licenses/gpl-2.0.txt
 * @link     https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

namespace TIU_THEME\Inc; // phpcs:ignore

use TIU_THEME\Inc\Traits\Singleton; // phpcs:ignore

/**
 * Class Utilities
 */
class Utilities {

	use Singleton; // phpcs:ignore

	/**
	 * Class Utilities Construct Function
	 */
	protected function __construct() {
		/**
		 * Actions & Filters
		 */
		$this->setup_hooks();
	}

	/**
	 * Setup Hooks Function
	 *
	 * @return void
	 */
	protected function setup_hooks() {
		add_action( 'init', array( $this, 'setup_shortcode_current_year' ) );
		add_action( 'init', array( $this, 'setup_shortcode_polylang_switcher' ) );
	}

	/**
	 * Get Menu Id By Located Menu
	 *
	 * @param string $menu_location Menu Location.
	 * @return string Menu Id
	 */
	public function get_menu_id_by_location( $menu_location ) {
		$locations = get_nav_menu_locations();
		$menu_id   = $locations[ $menu_location ];
		return $menu_id;
	}

	/**
	 * Get Menu Items By Located Menu
	 *
	 * @param string $menu_location Menu Location.
	 * @return array Navigation Items
	 */
	public function get_menu_items_by_location( $menu_location ) {
		$navigation_id = $this->get_menu_id_by_location( $menu_location );

		$navigation_items = wp_get_nav_menu_items( $navigation_id );

		return $navigation_items;
	}

	/**
	 * Setup Shortcode for Current Year
	 *
	 * @return void
	 */
	public function setup_shortcode_current_year() {
		add_shortcode( 'year', array( $this, 'shortcode_get_current_year' ) ); // phpcs:ignore
	}

	/**
	 * Setup Shortcode for polylang switcher
	 *
	 * @return void
	 */
	public function setup_shortcode_polylang_switcher() {
		add_shortcode( 'polylang_switcher_control', array( $this, 'front_polylang_switcher' ) ); // phpcs:ignore
	}

	/**
	 * Current year shortcode
	 *
	 * @return string Year
	 */
	public function shortcode_get_current_year() {
		return current_time( 'Y' );
	}

	/**
	 * Polylang switcher shortcode
	 *
	 * @return string Polylang shortcode output
	 */
	public function front_polylang_switcher() {
		$output = '';
		if ( function_exists( 'pll_the_languages' ) ) {
			$args = array(
				'show_flags'       => 1,
				'show_names'       => 1,
				'display_names_as' => 'slug',
				'echo'             => 0,
			);
			$lang = pll_the_languages( $args );

			$output = "
				<div class='polylang-switcher-wrapper'>
					$lang
				</div>";
		}
		return $output;
	}

	/**
	 * Return highlighted text with primary color
	 *
	 * @param string $text Flat text.
	 * @return string Highlighted text
	 */
	public function highlight_text_with_primary_color( $text ) {
		return preg_replace(
			'~__\*(.*?)\*__~s',
			'<span>$1</span>',
			$text
		);
	}

	/**
	 * Getting translated string by diploma
	 *
	 * @param string $diploma_string Diploma string.
	 * @return string Diploma tranlated string
	 */
	public function get_diploma_spanish_tranlated_string( $diploma_string ) {
		switch ( $diploma_string ) :
			case 'license':
				if ( pll_current_language( 'slug' ) === 'en' ) :
					return ucfirst( $diploma_string );
				else :
					return 'Licenciatura';
				endif;
				// no break.
			case 'master':
				if ( pll_current_language( 'slug' ) === 'en' ) :
					return ucfirst( $diploma_string );
				else :
					return 'Maestría';
				endif;
				// no break.
			case 'doctor':
				if ( pll_current_language( 'slug' ) === 'en' ) :
					return ucfirst( $diploma_string );
				else :
					return 'Doctorado';
				endif;
				// no break.
			default:
				if ( pll_current_language( 'slug' ) === 'en' ) :
					return ucfirst( $diploma_string );
				else :
					return 'Capellanía';
				endif;
				// no break.
		endswitch;
	}

	/**
	 * Getting sub string of months 
	 *
	 * @param string $month Month.
	 * @return string sub string of given month
	 */
	public function get_short_month_string( $month ) {
		$month_string_result = substr( $month, 0, 3 );
		return $month_string_result;
	}
}
