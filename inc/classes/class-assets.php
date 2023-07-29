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
		wp_enqueue_style( 'theological-international-university-google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800|Roboto:400,500,700' );
		wp_enqueue_style( 'theological-international-university-style', get_stylesheet_uri(), array(), _S_VERSION );
		wp_enqueue_style( 'theological-international-university-style-bundle', get_template_directory_uri() . '/build/style-index.css', array(), _S_VERSION );
		wp_style_add_data( 'theological-international-university-style', 'rtl', 'replace' );

		wp_enqueue_script( 'theological-international-university-popper', get_template_directory_uri() . '/js/popper.js', array('jquery'), _S_VERSION, true );
		wp_enqueue_script( 'theological-international-university-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), _S_VERSION, true );
		wp_enqueue_script( 'theological-international-university-TweenMax', get_template_directory_uri() . '/js/TweenMax.min.js', array(), _S_VERSION, true );
		wp_enqueue_script( 'theological-international-university-TimelineMax', get_template_directory_uri() . '/js/TimelineMax.min.js', array(), _S_VERSION, true );
		wp_enqueue_script( 'theological-international-university-ScrollMagic', get_template_directory_uri() . '/js/ScrollMagic.min.js', array(), _S_VERSION, true );
		wp_enqueue_script( 'theological-international-university-animation-gsap', get_template_directory_uri() . '/js/animation.gsap.min.js', array(), _S_VERSION, true );
		wp_enqueue_script( 'theological-international-university-ScrollToPlugin', get_template_directory_uri() . '/js/ScrollToPlugin.min.js', array(), _S_VERSION, true );
		wp_enqueue_script( 'theological-international-university-owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array(), _S_VERSION, true );
		wp_enqueue_script( 'theological-international-university-jquery-scrollTo', get_template_directory_uri() . '/js/jquery.scrollTo.min.js', array(), _S_VERSION, true );
		wp_enqueue_script( 'theological-international-university-easing', get_template_directory_uri() . '/js/easing.js', array(), _S_VERSION, true );
		wp_enqueue_script( 'theological-international-university-main-script', get_template_directory_uri() . '/build/index.js', array('jquery'), _S_VERSION, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

}