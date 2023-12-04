<?php
/**
 * Class Custom Post Types
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
use Carbon_Fields\Container; // phpcs:ignore
use Carbon_Fields\Field; // phpcs:ignore

/**
 * Class Custom Post Types
 */
class CUSTOM_POST_TYPES {
	use Singleton; // phpcs:ignore

	/**
	 * Class Custom Post Types Construct Function
	 */
	protected function __construct() {
		// Actions & Filters.
		$this->setup_hooks();
	}

	/**
	 * Class Custom Posty Types Construct Function
	 *
	 * @return void
	 */
	protected function setup_hooks() {
		add_action( 'init', array( $this, 'tiu_professor_post_type_registration' ) );
		add_action( 'init', array( $this, 'tiu_diploma_post_type_registration' ) );
		add_action( 'carbon_fields_register_fields', array( $this, 'tiu_professor_post_type_fields' ) );
		add_action( 'carbon_fields_register_fields', array( $this, 'tiu_diploma_post_type_fields' ) );
	}

	/**
	 * TIU Professor Custom Post Type Registration
	 *
	 * @return void
	 */
	public function tiu_professor_post_type_registration() {
		$labels = array(
			'name'                  => _x( 'Professors', 'Post type general name', 'theological-international-university' ),
			'singular_name'         => _x( 'Professor', 'Post type singular name', 'theological-international-university' ),
			'menu_name'             => _x( 'Professors', 'Admin Menu text', 'theological-international-university' ),
			'name_admin_bar'        => _x( 'Professor', 'Add New on Toolbar', 'theological-international-university' ),
			'add_new'               => __( 'Add New', 'theological-international-university' ),
			'add_new_item'          => __( 'Add New Professor', 'theological-international-university' ),
			'new_item'              => __( 'New Professor', 'theological-international-university' ),
			'edit_item'             => __( 'Edit Professor', 'theological-international-university' ),
			'view_item'             => __( 'View Professor', 'theological-international-university' ),
			'all_items'             => __( 'All Professors', 'theological-international-university' ),
			'search_items'          => __( 'Search Professors', 'theological-international-university' ),
			'parent_item_colon'     => __( 'Parent Professors:', 'theological-international-university' ),
			'not_found'             => __( 'No Professors found.', 'theological-international-university' ),
			'not_found_in_trash'    => __( 'No Professors found in Trash.', 'theological-international-university' ),
			'featured_image'        => _x( 'Professor Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'theological-international-university' ),
			'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'theological-international-university' ),
			'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'theological-international-university' ),
			'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'theological-international-university' ),
			'archives'              => _x( 'Professor archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'theological-international-university' ),
			'insert_into_item'      => _x( 'Insert into project', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'theological-international-university' ),
			'uploaded_to_this_item' => _x( 'Uploaded to this project', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'theological-international-university' ),
			'filter_items_list'     => _x( 'Filter Professors list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'theological-international-university' ),
			'items_list_navigation' => _x( 'Professors list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'theological-international-university' ),
			'items_list'            => _x( 'Professors list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'theological-international-university' ),
		);
		
		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => false,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => false,
			'rewrite'            => array( 'slug' => 'professors' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => 20,
			'menu_icon'          => 'dashicons-businessperson',
			'show_in_rest'       => false,
			'supports'           => array( 'title' ),
			'map_meta_cap'       => true,
		);
		
		register_post_type( 'professors', $args ); // phpcs:ignore
	}

	/**
	 * TIU Diploma Custom Post Type Registration
	 *
	 * @return void
	 */
	public function tiu_diploma_post_type_registration() {
		$labels = array(
			'name'                  => _x( 'Diplomas', 'Post type general name', 'theological-international-university' ),
			'singular_name'         => _x( 'Diploma', 'Post type singular name', 'theological-international-university' ),
			'menu_name'             => _x( 'Diplomas', 'Admin Menu text', 'theological-international-university' ),
			'name_admin_bar'        => _x( 'Diploma', 'Add New on Toolbar', 'theological-international-university' ),
			'add_new'               => __( 'Add New', 'theological-international-university' ),
			'add_new_item'          => __( 'Add New Diploma', 'theological-international-university' ),
			'new_item'              => __( 'New Diploma', 'theological-international-university' ),
			'edit_item'             => __( 'Edit Diploma', 'theological-international-university' ),
			'view_item'             => __( 'View Diploma', 'theological-international-university' ),
			'all_items'             => __( 'All Diplomas', 'theological-international-university' ),
			'search_items'          => __( 'Search Diplomas', 'theological-international-university' ),
			'parent_item_colon'     => __( 'Parent Diplomas:', 'theological-international-university' ),
			'not_found'             => __( 'No Diplomas found.', 'theological-international-university' ),
			'not_found_in_trash'    => __( 'No Diplomas found in Trash.', 'theological-international-university' ),
			'featured_image'        => _x( 'Diploma Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'theological-international-university' ),
			'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'theological-international-university' ),
			'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'theological-international-university' ),
			'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'theological-international-university' ),
			'archives'              => _x( 'Diploma archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'theological-international-university' ),
			'insert_into_item'      => _x( 'Insert into project', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'theological-international-university' ),
			'uploaded_to_this_item' => _x( 'Uploaded to this project', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'theological-international-university' ),
			'filter_items_list'     => _x( 'Filter Diplomas list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'theological-international-university' ),
			'items_list_navigation' => _x( 'Diplomas list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'theological-international-university' ),
			'items_list'            => _x( 'Diplomas list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'theological-international-university' ),
		);
		
		$args = array(
			'labels'             => $labels,
			'public'             => false,
			'publicly_queryable' => false,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => false,
			'rewrite'            => array( 'slug' => 'diplomas' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => 20,
			'menu_icon'          => 'dashicons-awards',
			'show_in_rest'       => false,
			'supports'           => array( 'title' ),
			'map_meta_cap'       => true,
		);
		
		register_post_type( 'diplomas', $args ); // phpcs:ignore
	}

	/**
	 * TIU Professor Custom Post Type Fields Declaration
	 *
	 * @return void
	 */
	public function tiu_professor_post_type_fields() {
		Container::make( 'post_meta', __( 'Professor Information', 'theological-international-university' ) )
			->where( 'post_type', '=', 'professors' )
			->add_fields(
				array(
					Field::make( 'image', 'professor_image', __( 'Image', 'theological-international-university' ) )
						->set_width( 33 ),
					Field::make( 'text', 'professor_position', __( 'Position', 'theological-international-university' ) )
						->set_width( 33 ),
					Field::make( 'complex', 'professor_socials_data', __( 'Socials', 'theological-international-university' ) )
					->setup_labels(
						array(
							'singular_name' => __( 'Social', 'theological-international-university' ),
							'plural_name'   => __( 'Socials', 'theological-international-university' ),
						) 
					)
					->set_layout( 'tabbed-vertical' )
					->set_max( 5 )
					->add_fields(
						array(
							Field::make( 'icon', 'professor_social_icon', __( 'Icon', 'theological-international-university' ) )
								->set_width( 50 )
								->add_fontawesome_options(),
							Field::make( 'text', 'professor_social_url', __( 'URL', 'theological-international-university' ) )
								->set_width( 50 ),
						) 
					),
				)
			);
	}

	/**
	 * TIU Diploma Custom Post Type Fields Declaration
	 *
	 * @return void
	 */
	public function tiu_diploma_post_type_fields() {
		Container::make( 'post_meta', __( 'Diploma Information', 'theological-international-university' ) )
			->where( 'post_type', '=', 'diplomas' )
			->add_fields(
				array(
					Field::make( 'association', 'diploma_user_association', __( 'Student', 'theological-international-university' ) )
					->set_max( 1 )
					->set_types(
						array(
							array(
								'type' => 'user',
							),
						) 
					),
					Field::make( 'complex', 'diplomas_info', __( 'Diplomas Info', 'theological-international-university' ) )
					->set_max( 5 )
					->setup_labels(
						array(
							'plural_name'   => 'Diplomas',
							'singular_name' => 'Diploma',
						)
					)
					->set_layout( 'tabbed-horizontal' )
					->add_fields(
						array(
							Field::make( 'image', 'diploma_image', __( 'Diploma Image', 'theological-international-university' ) )
								->set_width( 50 ),
							Field::make( 'select', 'diploma_type', __( 'Diploma Type', 'theological-international-university' ) )
							->set_width( 50 )
							->set_options(
								array(
									'license'    => __( 'License', 'theological-international-university' ),
									'master'     => __( 'Master', 'theological-international-university' ),
									'doctor'     => __( 'Doctor', 'theological-international-university' ),
									'honoris_causa_doctorate' => __( 'Honoris Causa Doctorate', 'theological-international-university' ),
									'chaplaincy' => __( 'Chaplaincy', 'theological-international-university' ),
								) 
							),
						)
					),
				)
			);
	}
}
