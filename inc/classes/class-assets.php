<?php

/**
* @package Theological_International_University
*/

namespace TIU_THEME\Inc;

use TIU_THEME\Inc\Traits\Singleton;

class ASSETS {
	use Singleton;

	protected function __construct() {
		// Actions & Filters
		$this->setup_hooks();
	}

	protected function setup_hooks() {
		add_action( 'wp_enqueue_scripts', [$this, 'theological_international_university_scripts'] );
	}

	/**
	* Enqueue scripts and styles.
	*/
	public function theological_international_university_scripts() {
		wp_enqueue_style( 'theological-international-university-style', get_stylesheet_uri(), array(), _S_VERSION );
		wp_style_add_data( 'theological-international-university-style', 'rtl', 'replace' );

		wp_enqueue_script( 'theological-international-university-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

}