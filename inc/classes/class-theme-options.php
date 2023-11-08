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
			->add_tab( __('Styles', 'theological-international-university'), array(
				Field::make( 'separator', 'separator_global_colors', __( 'Global Colors', 'theological-international-university' ) ),
				Field::make( 'color', 'tiu_primary_color', __( 'Primary', 'theological-international-university' ) )
					->set_palette( array( '#ff8800' ) )
					->set_default_value( '#ff8800' )
					->set_width( 25 ),
				Field::make( 'color', 'tiu_secondary_color', __( 'Secondary', 'theological-international-university' ) )
					->set_palette( array( '#000244' ) )
					->set_default_value( '#000244' )
					->set_width( 25 ),
				Field::make( 'color', 'tiu_third_color', __( 'Third', 'theological-international-university' ) )
					->set_palette( array( '#ffffff' ) )
					->set_default_value( '#ffffff' )
					->set_width( 25 ),
				Field::make( 'color', 'tiu_fourth_color', __( 'Fourth', 'theological-international-university' ) )
					->set_palette( array( '#cac7c7' ) )
					->set_default_value( '#cac7c7' )
					->set_width( 25 ),
				Field::make( 'color', 'tiu_fifth_color', __( 'Fifth', 'theological-international-university' ) )
					->set_palette( array( '#3a3a3a' ) )
					->set_default_value( '#3a3a3a' )
					->set_width( 25 ),
				Field::make( 'color', 'tiu_sixth_color', __( 'Sixth', 'theological-international-university' ) )
					->set_palette( array( '#1a1a1a' ) )
					->set_default_value( '#1a1a1a' )
					->set_width( 25 ),
				Field::make( 'color', 'tiu_seven_color', __( 'Seven', 'theological-international-university' ) )
					->set_palette( array( '#a5a5a5' ) )
					->set_default_value( '#a5a5a5' )
					->set_width( 25 ),
				Field::make( 'color', 'tiu_eight_color', __( 'Eight', 'theological-international-university' ) )
					->set_palette( array( '#f8f9fb' ) )
					->set_default_value( '#f8f9fb' )
					->set_width( 25 ),
				Field::make( 'color', 'tiu_nine_color', __( 'Nine', 'theological-international-university' ) )
					->set_palette( array( '#eaebec' ) )
					->set_default_value( '#eaebec' )
					->set_width( 25 ),
			))
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
				Field::make( 'separator', 'header_copyright_separator_en', __('Texts in English', 'theological-international-university') )
					->set_width( 50 ),
				Field::make( 'separator', 'header_copyright_separator_es', __('Texts in Spanish', 'theological-international-university') )
					->set_width( 50 ),
				Field::make( 'text', 'header_copyright_text', __('Header Copyright', 'theological-international-university') )
					->set_width( 50 ),
				Field::make( 'text', 'header_copyright_text_es', __('Header Copyright', 'theological-international-university') )
					->set_width( 50 )
			));
		// Footer Settings
		Container::make( 'theme_options', __('Footer', 'theological-international-university') )
			->set_page_parent($main_theme_options_container)
			->add_fields(array(
				Field::make( 'checkbox', 'footer_disable_newsletter_section', __('Disable newsletter?', 'theological-international-university') ),
				Field::make( 'separator', 'footer_text_english', __('Texts in English', 'theological-international-university') ),
				Field::make( 'textarea', 'footer_disclaimer_text', __('Footer Disclaimer Text', 'theological-international-university') ),
				Field::make( 'text', 'footer_copyright_text', __( 'Footer Copyright', 'theological-international-university' ) )
				 ->help_text(__('Use shortcode [year] to display the current year.', 'theological-international-university')),
				Field::make( 'separator', 'footer_text_spanish', __('Texts in Spanish', 'theological-international-university') ),
				Field::make( 'textarea', 'footer_disclaimer_text_es', __('Footer Disclaimer Text', 'theological-international-university') ),
				Field::make( 'text', 'footer_copyright_text_es', __( 'Footer Copyright', 'theological-international-university' ) )
				 ->help_text(__('Use shortcode [year] to display the current year.', 'theological-international-university')),
			));
		// Blog Settings
		Container::make( 'theme_options', __('Blog', 'theological-international-university') )
			->set_page_parent($main_theme_options_container)
			->add_fields(array(
				Field::make( 'image', 'blog_bg_image', __('Blog Background', 'theological-international-university') ),
				Field::make( 'separator', 'blog_separator_en', __('Texts in English', 'theological-international-university') )
					->set_width(50),
				Field::make( 'separator', 'blog_separator_es', __('Texts in Spanish', 'theological-international-university') )
					->set_width(50),
				Field::make( 'text', 'blog_heading_text', __('Blog Heading Text', 'theological-international-university') )
					->set_width(50),
				Field::make( 'text', 'blog_heading_text_es', __('Blog Heading Text', 'theological-international-university') )
					->set_width(50),
			));
		// Student Registration Form Settings
		Container::make( 'theme_options', __('Student Registration Form Settings', 'theological-international-university') )
			->set_page_parent($main_theme_options_container)
			->add_fields(array(
				Field::make( 'image', 'srf_bg_image', __('Heading Background Image', 'theological-international-university') ),
				Field::make( 'separator', 'srf_separtor_en', __('Texts in English', 'theological-international-university') )
					->set_width(50),
				Field::make( 'separator', 'srf_separtor_es', __('Texts in Spanish', 'theological-international-university') )
					->set_width(50),
				Field::make( 'text', 'srf_heading_text', __('Heading Text', 'theological-international-university') )
					->set_width(50),
				Field::make( 'text', 'srf_heading_text_es', __('Heading Text', 'theological-international-university') )
					->set_width(50),
			));
		// Student Dashboard Settings
		Container::make( 'theme_options', __('Student Dashboard Settings', 'theological-international-university') )
			->set_page_parent($main_theme_options_container)
			->add_fields(array(
				Field::make( 'separator', 'sds_separator_en', __('Texts in English', 'theological-international-university') ),
				Field::make( 'separator', 'welcome_message_separator', __( 'Student Welcome Message', 'theological-international-university' ) ),
				Field::make( 'rich_text', 'student_welcome_message', __('Student Welcome Message', 'theological-international-university') ),
				Field::make( 'separator', 'diploma_content_separator', __( 'Diplomas Content', 'theological-international-university' ) ),
				Field::make( 'rich_text', 'diploma_license_content', __('License Content', 'theological-international-university') )
					->set_width(50),
				Field::make( 'rich_text', 'diploma_master_content', __('Master Content', 'theological-international-university') )
					->set_width(50),
				Field::make( 'rich_text', 'diploma_doctor_content', __('Doctor Content', 'theological-international-university') )
					->set_width(50),
				Field::make( 'rich_text', 'diploma_chaplaincy_content', __('Chaplaincy Content', 'theological-international-university') )
					->set_width(50),
				Field::make( 'separator', 'sds_separator_es', __('Texts in Spanish', 'theological-international-university') ),
				Field::make( 'separator', 'welcome_message_separator_es', __( 'Student Welcome Message', 'theological-international-university' ) ),
				Field::make( 'rich_text', 'student_welcome_message_es', __('Student Welcome Message', 'theological-international-university') ),
				Field::make( 'separator', 'diploma_content_separator_es', __( 'Diplomas Content', 'theological-international-university' ) ),
				Field::make( 'rich_text', 'diploma_license_content_es', __('License Content', 'theological-international-university') )
					->set_width(50),
				Field::make( 'rich_text', 'diploma_master_content_es', __('Master Content', 'theological-international-university') )
					->set_width(50),
				Field::make( 'rich_text', 'diploma_doctor_content_es', __('Doctor Content', 'theological-international-university') )
					->set_width(50),
				Field::make( 'rich_text', 'diploma_chaplaincy_content_es', __('Chaplaincy Content', 'theological-international-university') )
					->set_width(50),
			));
	}
}