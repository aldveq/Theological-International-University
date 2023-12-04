<?php
/**
 * Class Custom Gutenberg Block
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
use Carbon_Fields\Block; // phpcs:ignore
use Carbon_Fields\Field; // phpcs:ignore
/**
 * Class Custom Gutenberg Blocks
 */
class CUSTOM_GUTENBERG_BLOCKS {
	use Singleton; // phpcs:ignore

	/**
	 * Class Custom Gutenberg Block Construct Function
	 */
	protected function __construct() {
		// Hero Slider Block - Start.
		Block::make( __( 'Hero Slider Block', 'theological-international-university' ) )
			->add_fields(
				array(
					Field::make( 'complex', 'slides_data', __( 'Slider Data', 'theological-international-university' ) )
					->set_layout( 'tabbed-horizontal' )
					->setup_labels(
						array(
							'plural_name'   => 'Slides',
							'singular_name' => 'Slide',
						)
					)
					->add_fields(
						array(
							Field::make( 'image', 'image', __( 'Image', 'theological-international-university' ) ),
							Field::make( 'text', 'title', __( 'Title', 'theological-international-university' ) )
								->help_text( __( 'Wrap text in __* to distinguish it with the global primary color of the theme styles. Example: The wrapped text has a __*different color*__.', 'theological-international-university' ) ),
						)
					),
					Field::make( 'complex', 'links_data', __( 'Links Section', 'theological-international-university' ) )
					->set_layout( 'tabbed-horizontal' )
					->setup_labels(
						array(
							'plural_name'   => 'Links',
							'singular_name' => 'Link',
						)
					)
					->add_fields(
						array(
							Field::make( 'image', 'icon', __( 'Icon', 'theological-international-university' ) ),
							Field::make( 'text', 'title', __( 'Title', 'theological-international-university' ) ),
							Field::make( 'text', 'link_label', __( 'Link Label', 'theological-international-university' ) )
								->set_width( 33 ),
							Field::make( 'text', 'link_url', __( 'Link URL', 'theological-international-university' ) )
								->set_width( 33 ),
							Field::make( 'checkbox', 'link_target', __( 'Open in new tab?', 'theological-international-university' ) )
								->set_width( 33 ),
						)
					),
				)
			)
			->set_description( __( 'Hero Slider Block', 'theological-international-university' ) )
			->set_category( 'tiu-blocks', __( 'Theological International University Blocks', 'theological-international-university' ) )
			->set_icon( 'slides' )
			->set_keywords( array( __( 'Slider', 'theological-international-university' ), __( 'Hero', 'theological-international-university' ) ) )
			->set_render_callback(
				// phpcs:disable
				function ( $fields, $attributes, $inner_blocks ) {
					get_template_part(
						'template-parts/blocks/block',
						'hero-slider',
						array(
							'hero_slider_data' => $fields,
							'attributes'       => $attributes,
						) 
					);
				}
				// phpcs:enable
			);
		// Hero Slider Block - End
		// Grid Data Block - Start.
		Block::make( __( 'Grid Data Block', 'theological-international-university' ) )
			->add_fields(
				array(
					Field::make( 'text', 'grid_data_title', __( 'Title', 'theological-international-university' ) ),
					Field::make( 'complex', 'grid_data_source', __( 'Grid Data', 'theological-international-university' ) )
					->set_layout( 'tabbed-horizontal' )
					->setup_labels(
						array(
							'plural_name'   => 'Items',
							'singular_name' => 'Item',
						)
					)
					->add_fields(
						array(
							Field::make( 'image', 'icon', __( 'Icon', 'theological-international-university' ) ),
							Field::make( 'text', 'title', __( 'Title', 'theological-international-university' ) ),
							Field::make( 'rich_text', 'description', __( 'Description', 'theological-international-university' ) )
								->set_settings(
									array(
										'media_buttons' => false,
									)
								),
						)
					),
				)
			)
			->set_description( __( 'Grid Data Block', 'theological-international-university' ) )
			->set_category( 'tiu-blocks', __( 'Theological International University Blocks', 'theological-international-university' ) )
			->set_icon( 'grid-view' )
			->set_keywords( array( __( 'Grid', 'theological-international-university' ) ) )
			->set_render_callback(
				// phpcs:disable
				function ( $fields, $attributes, $inner_blocks ) {
					get_template_part(
						'template-parts/blocks/block',
						'grid-data',
						array(
							'grid_data'  => $fields,
							'attributes' => $attributes,
						) 
					);
				}
				// phpcs:enable
			);         
		// Grid Data Block - End
		// Split View Block - Start.
		Block::make( __( 'Split View Block', 'theological-international-university' ) )
			->add_fields(
				array(
					Field::make( 'separator', 'left_content', __( 'Left Content', 'theological-international-university' ) ),
					Field::make( 'text', 'split_view_left_content_title', __( 'Title', 'theological-international-university' ) )
						->help_text( 'Wrap text in __* to distinguish it with the global primary color of the theme styles. Example: The wrapped text has a __*different color*__.' ),
					Field::make( 'rich_text', 'split_view_left_content_description', __( 'Description', 'theological-international-university' ) )
						->set_settings(
							array(
								'media_buttons' => false,
							)
						),
					Field::make( 'text', 'split_view_left_content_link_label', __( 'Link Label', 'theological-international-university' ) )
						->set_width( 33 ),
					Field::make( 'text', 'split_view_left_content_link_url', __( 'Link URL', 'theological-international-university' ) )
						->set_width( 33 ),
					Field::make( 'checkbox', 'split_view_left_content_link_target', __( 'Open in new tab?', 'theological-international-university' ) )
						->set_width( 33 ),
					Field::make( 'separator', 'right_content', __( 'Right Content', 'theological-international-university' ) ),
					Field::make( 'image', 'split_view_right_content_image_bg', __( 'Background Image', 'theological-international-university' ) )
						->help_text( 'Optional' ),
					Field::make( 'text', 'split_view_right_content_title', __( 'Title', 'theological-international-university' ) ),
				)
			)
			->set_description( __( 'Split View Block', 'theological-international-university' ) )
			->set_category( 'tiu-blocks', __( 'Theological International University Blocks', 'theological-international-university' ) )
			->set_icon( 'columns' )
			->set_keywords( array( __( 'Split View', 'theological-international-university' ) ) )
			->set_render_callback(
				// phpcs:disable
				function ( $fields, $attributes, $inner_blocks ) {
					get_template_part(
						'template-parts/blocks/block',
						'split-view',
						array(
							'split_view_data' => $fields,
							'attributes'      => $attributes,
						) 
					);
				}
				// phpcs:enable
			);
		// Split View Block - End
		// Reviews Block - Start.
		Block::make( __( 'Reviews Block', 'theological-international-university' ) )
			->add_fields(
				array(
					Field::make( 'image', 'reviews_image_bg', __( 'Background Image', 'theological-international-university' ) )
						->help_text( 'Optional' ),
					Field::make( 'text', 'reviews_title', __( 'Title', 'theological-international-university' ) ),
					Field::make( 'complex', 'reviews_data_source', __( 'Reviews Data', 'theological-international-university' ) )
					->set_layout( 'tabbed-horizontal' )
					->setup_labels(
						array(
							'plural_name'   => 'Reviews',
							'singular_name' => 'Review',
						)
					)
					->add_fields(
						array(
							Field::make( 'rich_text', 'review_text', __( 'Text', 'theological-international-university' ) )
								->set_settings(
									array(
										'media_buttons' => false,
									)
								),
							Field::make( 'image', 'review_user_img', __( 'User Image', 'theological-international-university' ) ),
							Field::make( 'text', 'review_user_name', __( 'User Name', 'theological-international-university' ) ),
							Field::make( 'text', 'review_user_role', __( 'User Role', 'theological-international-university' ) ),
						)
					),
				)
			)
			->set_description( __( 'Reviews Block', 'theological-international-university' ) )
			->set_category( 'tiu-blocks', __( 'Theological International University Blocks', 'theological-international-university' ) )
			->set_icon( 'slides' )
			->set_keywords( array( __( 'Reviews', 'theological-international-university' ) ) )
			->set_render_callback(
				// phpcs:disable
				function ( $fields, $attributes, $inner_blocks ) {
					get_template_part(
						'template-parts/blocks/block',
						'reviews',
						array(
							'reviews_data' => $fields,
							'attributes'   => $attributes,
						) 
					);
				}
				// phpcs:enable
			);
		// Reviews Block - End
		// Contact Form Block - Start.
		Block::make( __( 'Contact Form Block', 'theological-international-university' ) )
			->add_fields(
				array(
					Field::make( 'text', 'contact_form_title', __( 'Title', 'theological-international-university' ) ),
					Field::make( 'separator', 'contact_form_separator', __( 'Courses Info', 'theological-international-university' ) ),
					Field::make( 'text', 'contact_form_courses_title', __( 'Courses Title', 'theological-international-university' ) ),
					Field::make( 'rich_text', 'contact_form_courses_desc', __( 'Courses Description', 'theological-international-university' ) )
						->set_settings(
							array(
								'media_buttons' => false,
							)
						),
				)
			)
			->set_description( __( 'Contact Form Block', 'theological-international-university' ) )
			->set_category( 'tiu-blocks', __( 'Theological International University Blocks', 'theological-international-university' ) )
			->set_icon( 'forms' )
			->set_keywords( array( __( 'Contact Form', 'theological-international-university' ) ) )
			->set_render_callback(
				// phpcs:disable
				function ( $fields, $attributes, $inner_blocks ) {
					get_template_part(
						'template-parts/blocks/block',
						'contact-form',
						array(
							'contact_form_data' => $fields,
							'attributes'        => $attributes,
						) 
					);
				}
				// phpcs:enable
			);
		// Contact Form Block - End
		// Content Text/Image Block - Start.
		Block::make( __( 'Content Text/Image Block', 'theological-international-university' ) )
			->add_fields(
				array(
					Field::make( 'image', 'content_text_image_src', __( 'Image', 'theological-international-university' ) ),
					Field::make( 'text', 'content_text_image_title', __( 'Title', 'theological-international-university' ) ),
					Field::make( 'rich_text', 'content_text_image_desc', __( 'Description', 'theological-international-university' ) )
						->set_settings(
							array(
								'media_buttons' => false,
							)
						),
					Field::make( 'text', 'content_text_image_link_label', __( 'Link Label', 'theological-international-university' ) )
						->set_width( 33 ),
					Field::make( 'text', 'content_text_image_link_url', __( 'Link URL', 'theological-international-university' ) )
						->set_width( 33 ),
					Field::make( 'checkbox', 'content_text_image_link_target', __( 'Open in new tab?', 'theological-international-university' ) )
						->set_width( 33 ),
				)
			)
			->set_description( __( 'Content Text/Image Block', 'theological-international-university' ) )
			->set_category( 'tiu-blocks', __( 'Theological International University Blocks', 'theological-international-university' ) )
			->set_icon( 'columns' )
			->set_keywords( array( __( 'Text', 'theological-international-university' ), __( 'Image', 'theological-international-university' ), __( 'Text/Image', 'theological-international-university' ) ) )
			->set_render_callback(
				// phpcs:disable
				function ( $fields, $attributes, $inner_blocks ) {
					get_template_part(
						'template-parts/blocks/block',
						'content-text-image',
						array(
							'content_text_image_data' => $fields,
							'attributes'              => $attributes,
						) 
					);
				}
				// phpcs:enable
			);
		// Content Text/Image Block - End
		// Milestone Block - Start.
		Block::make( __( 'Milestone Block', 'theological-international-university' ) )
			->add_fields(
				array(
					Field::make( 'image', 'milestone_bg_img', __( 'Background Image', 'theological-international-university' ) )
						->help_text( 'Optional' ),
					Field::make( 'complex', 'milestone_data_source', __( 'Milestone Data', 'theological-international-university' ) )
					->set_layout( 'tabbed-horizontal' )
					->set_max( 4 )
					->setup_labels(
						array(
							'plural_name'   => 'Milestones',
							'singular_name' => 'Milestone',
						)
					)
					->add_fields(
						array(
							Field::make( 'image', 'milestone_icon', __( 'Icon', 'theological-international-university' ) ),
							Field::make( 'text', 'milestone_counter', __( 'Counter', 'theological-international-university' ) ),
							Field::make( 'text', 'milestone_text', __( 'Text', 'theological-international-university' ) ),
						)
					),
				)
			)
			->set_description( __( 'Milestone Block', 'theological-international-university' ) )
			->set_category( 'tiu-blocks', __( 'Theological International University Blocks', 'theological-international-university' ) )
			->set_icon( 'chart-bar' )
			->set_keywords( array( __( 'Milestone', 'theological-international-university' ) ) )
			->set_render_callback(
				// phpcs:disable
				function ( $fields, $attributes, $inner_blocks ) {
					get_template_part(
						'template-parts/blocks/block',
						'milestone',
						array(
							'milestone_data' => $fields,
							'attributes'     => $attributes,
						) 
					);
				}
				// phpcs:enable
			);
		// Milestone Block - End
		// Professors Block - Start.
		Block::make( __( 'Professors Block', 'theological-international-university' ) )
			->add_fields(
				array(
					Field::make( 'text', 'professors_title', __( 'Title', 'theological-international-university' ) ),
				)
			)
			->set_description( __( 'Professors Block', 'theological-international-university' ) )
			->set_category( 'tiu-blocks', __( 'Theological International University Blocks', 'theological-international-university' ) )
			->set_icon( 'businessperson' )
			->set_keywords( array( __( 'Professors', 'theological-international-university' ) ) )
			->set_render_callback(
				// phpcs:disable
				function ( $fields, $attributes, $inner_blocks ) {
					get_template_part(
						'template-parts/blocks/block',
						'professors',
						array(
							'professors_data' => $fields,
							'attributes'      => $attributes,
						) 
					);
				}
				// phpcs:enable
			);
		// Professors Block - End.
	}

}
