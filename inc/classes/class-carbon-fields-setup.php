<?php
/**
 * Class CBF Setup
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
 * Class CBF Setup
 */
class CARBON_FIELDS_SETUP {
	use Singleton; // phpcs:ignore

	/**
	 * Class CBF Setup Construct Function
	 */
	protected function __construct() {
		require_once get_template_directory() . '/vendor/autoload.php'; // phpcs:ignore
		\Carbon_Fields\Carbon_Fields::boot(); // phpcs:ignore
	}
}
