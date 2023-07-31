<?php

/**
* @package Theological_International_University
*/

namespace TIU_THEME\Inc;

use TIU_THEME\Inc\Traits\Singleton;
use Carbon_Fields\Block;
use Carbon_Fields\Field;

class CUSTOM_GUTENBERG_BLOCKS {
	use Singleton;

	protected function __construct() {
	   	// Hero Slider Block - Start
		Block::make( __( 'Hero Slider Block', 'theological-international-university' ) )
			->add_fields( array(
				Field::make( 'complex', 'slides_data', __( 'Slider Data', 'theological-international-university' ) )
					->set_layout( 'tabbed-horizontal' )
					->setup_labels(array(
						'plural_name' => 'Slides',
						'singular_name' => 'Slide',
					))
					->add_fields( array(
						Field::make( 'image', 'image', __( 'Image', 'theological-international-university' ) ),
						Field::make( 'text', 'title', __( 'Title', 'theological-international-university' ) )
							->help_text(__('Wrap text in __* to distinguish it with the global primary color of the theme styles. Example: The wrapped text has a __*different color*__.', 'theological-international-university'))
					)),
				Field::make( 'complex', 'links_data', __('Links Section', 'theological-international-university') )
					->set_layout( 'tabbed-horizontal' )
					->setup_labels(array(
						'plural_name' => 'Links',
						'singular_name' => 'Link',
					))
					->add_fields( array(
						Field::make( 'image', 'icon', __( 'Icon', 'theological-international-university' ) ),
						Field::make( 'text', 'title', __( 'Title', 'theological-international-university' ) ),
						Field::make( 'text', 'link_label', __('Link Label', 'theological-international-university') )
							->set_width( 33 ),
						Field::make( 'text', 'link_url', __('Link URL', 'theological-international-university') )
							->set_width( 33 ),
						Field::make( 'checkbox', 'link_target', __('Open in new tab?', 'theological-international-university') )
							->set_width( 33 ),
					))
			))
			->set_description( __( 'Hero Slider Block', 'theological-international-university' ) )
			->set_category( 'tiu-blocks', __( 'Theological International University Blocks', 'theological-international-university' ) )
			->set_icon( 'slides' )
			->set_keywords( [ __( 'Slider', 'theological-international-university' ), __( 'Hero', 'theological-international-university' ) ] )
			->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
				get_template_part( 'template-parts/blocks/block', 'hero-slider', array('hero_slider_data' => $fields) );
			});
		// Hero Slider Block - End
		// Grid Data Block - Start
		Block::make( __('Grid Data Block', 'theological-international-university') )
			->add_fields(array(
				Field::make( 'text', 'grid_data_title', __( 'Title', 'theological-international-university' ) ),
				Field::make( 'complex', 'grid_data_source', __('Grid Data', 'theological-international-university') )
					->set_layout( 'tabbed-horizontal' )
					->setup_labels(array(
						'plural_name' => 'Items',
						'singular_name' => 'Item',
					))
					->add_fields( array(
						Field::make( 'image', 'icon', __( 'Icon', 'theological-international-university' ) ),
						Field::make( 'text', 'title', __( 'Title', 'theological-international-university' ) ),
						Field::make( 'textarea', 'description', __( 'Description', 'theological-international-university' ) ),
					)),
			))
			->set_description( __( 'Grid Data Block', 'theological-international-university' ) )
			->set_category( 'tiu-blocks', __( 'Theological International University Blocks', 'theological-international-university' ) )
			->set_icon( 'grid-view' )
			->set_keywords( [ __( 'Grid', 'theological-international-university' ) ] )
			->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
				get_template_part( 'template-parts/blocks/block', 'grid-data', array('grid_data' => $fields) );
			});			
		// Grid Data Block - End
	}

}