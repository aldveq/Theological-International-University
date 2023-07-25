<?php

/**
* @package Theological_International_University
*/

namespace TIU_THEME\Inc;

use TIU_THEME\Inc\Traits\Singleton;
use Carbon_Fields\Container;
use Carbon_Fields\Field;

class THEME_OPTIONS {
	use Singleton;

	protected function __construct() {
		// Actions & Filters
		$this->setup_hooks();
	}

	protected function setup_hooks() {
		add_action( 'carbon_fields_register_fields', [$this, 'crb_attach_theme_options'] );
	}

	public function crb_attach_theme_options() {
		// Main Theme Options Settings
		$main_theme_options_container = Container::make( 'theme_options', __( 'Theme Options', 'theological-international-university' ) )
			->add_tab( __( 'Contact Information', 'theological-international-university' ), array(
				Field::make( 'separator', 'separator_emails', __( 'Emails', 'theological-international-university' ) ),
				Field::make( 'text', 'tiu_primary_email_label', __( 'Primary Email Label', 'theological-international-university' ) )
					->set_width( 50 ),
				Field::make( 'text', 'tiu_primary_email', __( 'Primary Email', 'theological-international-university' ) )
					->set_width( 50 ),
				Field::make( 'separator', 'separator_phones', __( 'Phones', 'theological-international-university' ) ),
				Field::make( 'text', 'tiu_primary_phone_label', __( 'Primary Phone Label', 'theological-international-university' ) )
					->set_width( 50 ),
				Field::make( 'text', 'tiu_primary_phone', __( 'Primary Phone', 'theological-international-university' ) )
					->set_width( 50 ),
				Field::make( 'separator', 'separator_address', __( 'Address', 'theological-international-university' ) ),
				Field::make( 'text', 'tiu_label_address', __( 'Address', 'theological-international-university' ) )
					->set_width( 50 ),
				Field::make( 'text', 'tiu_address_link', __( 'Address URL', 'theological-international-university' ) )
					->set_width( 50 )
					->help_text(__('Optional', 'theological-international-university')),
			))
			->add_tab( __( 'Socials', 'theological-international-university'), array(
				Field::make('complex', 'socials_data', __('Socials', 'theological-international-university'))
					->setup_labels( array(
						'singular_name' => __( 'Social', 'theological-international-university' ),
						'plural_name'   => __( 'Socials', 'theological-international-university' )
					) )
					->set_layout( 'tabbed-vertical' )
					->set_max( 5 )
					->add_fields( array(
						Field::make( 'icon', 'social_icon', __('Icon', 'theological-international-university') )
							->set_width( 50 )
							->add_fontawesome_options(),
						Field::make( 'text', 'social_url', __( 'URL', 'theological-international-university' ) )
							->set_width( 50 )
					) )
			));
		// Header Settings
		Container::make( 'theme_options', __('Header', 'theological-international-university'))
			->set_page_parent($main_theme_options_container)
			->add_fields(array(
				Field::make( 'text', 'header_copyright_text', __('Header Copyright', 'theological-international-university') )
			));
		// Footer Settings
		Container::make( 'theme_options', __('Footer', 'theological-international-university') )
			->set_page_parent($main_theme_options_container)
			->add_fields(array(
				Field::make( 'textarea', 'footer_disclaimer_text', __('Footer Disclaimer Text', 'theological-international-university') ),
				Field::make( 'text', 'footer_copyright_text', __( 'Footer Copyright', 'theological-international-university' ) )
			));
	}
}