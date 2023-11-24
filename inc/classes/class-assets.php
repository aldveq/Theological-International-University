<?php
/**
 * Class Assets
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
 * Class Assets
 */
class ASSETS {

	use Singleton; // phpcs:ignore

	/**
	 * Class Assets Construct Function
	 */
	protected function __construct() {
		// Actions & Filters.
		$this->setup_hooks();
	}

	/**
	 * Setup Hooks Function
	 *
	 * @return void
	 */
	protected function setup_hooks() {
		add_action( 'wp_head', array( $this, 'theological_international_university_css_variables' ) );
		add_action( 'admin_head', array( $this, 'theological_international_university_css_variables' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'theological_international_university_editor_block_assets' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'theological_international_university_modify_jquery_version' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'theological_international_university_scripts' ) );
	}

	/**
	 * Adding Jquery version 3.2.1 in Frontend
	 *
	 * @return void
	 */
	public function theological_international_university_modify_jquery_version() {
		if ( ! is_admin() ) {
			wp_deregister_script( 'jquery' ); // phpcs:ignore
			wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.2.1.min.js', false, '3.2.1', true );
			wp_enqueue_script( 'jquery' );
		}

		if ( ( ! is_admin() && is_page( 'student-dashboard' ) )
			|| ( ! is_admin() && is_page( 'panel-estudiantes' ) )
			|| ( ! is_admin() && is_page( 'student-diploma' ) )
			|| ( ! is_admin() && is_page( 'estudiante-certificaciones' ) )
			|| ( ! is_admin() && is_page( 'student-profile' ) )
			|| ( ! is_admin() && is_page( 'estudiante-perfil' ) )
		) {
			wp_deregister_script( 'jquery' ); // phpcs:ignore
			wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', false, '3.4.0', true );
			wp_enqueue_script( 'jquery' );
		}
	}

	/**
	 * Enqueue scripts and styles.
	 *
	 * @return void
	 */
	public function theological_international_university_scripts() {
		if (
			is_page( 'student-dashboard' )
			|| is_page( 'panel-estudiantes' )
			|| is_page( 'student-diploma' )
			|| is_page( 'estudiante-certificaciones' )
			|| is_page( 'student-profile' )
			|| is_page( 'estudiante-perfil' )
		) {
			// Styles.
			wp_enqueue_style( 'tiu-sd-google-fonts', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap', array(), _S_VERSION );
			wp_enqueue_style( 'tiu-style-bundle-sd', get_template_directory_uri() . '/build-student-dashboard/style-index.css', array(), _S_VERSION );

			// Scripts.
			wp_enqueue_script( 'tiu-sd-bootstrap', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array( 'jquery' ), _S_VERSION, true );
			wp_enqueue_script( 'tiu-sd-sidebarmenu', get_template_directory_uri() . '/js/sidebarmenu.js', array( 'jquery' ), _S_VERSION, true );
			wp_enqueue_script( 'tiu-sd-app', get_template_directory_uri() . '/js/app.min.js', array( 'jquery' ), _S_VERSION, true );
			wp_enqueue_script( 'tiu-sd-simplebar', get_template_directory_uri() . '/js/simplebar.js', array( 'jquery' ), _S_VERSION, true );
			return;
		}

		wp_enqueue_style( 'theological-international-university-google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800|Roboto:400,500,700', array(), _S_VERSION );
		wp_enqueue_style( 'theological-international-university-style', get_stylesheet_uri(), array(), _S_VERSION );
		wp_enqueue_style( 'theological-international-university-style-bundle', get_template_directory_uri() . '/build/style-index.css', array(), _S_VERSION );
		wp_style_add_data( 'theological-international-university-style', 'rtl', 'replace' );

		wp_enqueue_script( 'theological-international-university-popper', get_template_directory_uri() . '/js/popper.js', array( 'jquery' ), _S_VERSION, true );
		wp_enqueue_script( 'theological-international-university-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), _S_VERSION, true );
		wp_enqueue_script( 'theological-international-university-TweenMax', get_template_directory_uri() . '/js/TweenMax.min.js', array( 'jquery' ), _S_VERSION, true );
		wp_enqueue_script( 'theological-international-university-TimelineMax', get_template_directory_uri() . '/js/TimelineMax.min.js', array( 'jquery' ), _S_VERSION, true );
		wp_enqueue_script( 'theological-international-university-ScrollMagic', get_template_directory_uri() . '/js/ScrollMagic.min.js', array( 'jquery' ), _S_VERSION, true );
		wp_enqueue_script( 'theological-international-university-animation-gsap', get_template_directory_uri() . '/js/animation.gsap.min.js', array( 'jquery' ), _S_VERSION, true );
		wp_enqueue_script( 'theological-international-university-ScrollToPlugin', get_template_directory_uri() . '/js/ScrollToPlugin.min.js', array( 'jquery' ), _S_VERSION, true );
		wp_enqueue_script( 'theological-international-university-owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array( 'jquery' ), _S_VERSION, true );
		wp_enqueue_script( 'theological-international-university-jquery-scrollTo', get_template_directory_uri() . '/js/jquery.scrollTo.min.js', array( 'jquery' ), _S_VERSION, true );
		wp_enqueue_script( 'theological-international-university-easing', get_template_directory_uri() . '/js/easing.js', array( 'jquery' ), _S_VERSION, true );
		wp_enqueue_script( 'theological-international-university-main-script', get_template_directory_uri() . '/build/index.js', array( 'jquery' ), _S_VERSION, true );

		wp_localize_script(
			'theological-international-university-main-script',
			'tiuData',
			array(
				'isHome'                        => home_url(),
				'isBlog'                        => is_home(),
				'isSinglePostView'              => is_single(),
				'isStudentRegistrationFormPage' => is_page( 'student-registration-form' ) || is_page( 'registro-estudiantes' ) ? true : false,
			)
		);
	}

	/**
	 * Enqueing Assets for Gutenberg Editor
	 *
	 * @return void
	 */
	public function theological_international_university_editor_block_assets() {
		wp_enqueue_style( 'theological-international-university-block-editor-styles', get_template_directory_uri() . '/editor/style.css', array(), _S_VERSION );
		wp_enqueue_style( 'theological-international-university-style-bundle', get_template_directory_uri() . '/build/style-index.css', array(), _S_VERSION );
	}

	/**
	 * Embeding CSS Variabled for Frontend and WP Backend
	 *
	 * @return void
	 */
	public function theological_international_university_css_variables() {
		// Global Colors.
		$tiu_primary_color   = carbon_get_theme_option( 'tiu_primary_color' );
		$tiu_secondary_color = carbon_get_theme_option( 'tiu_secondary_color' );
		$tiu_third_color     = carbon_get_theme_option( 'tiu_third_color' );
		$tiu_fourth_color    = carbon_get_theme_option( 'tiu_fourth_color' );
		$tiu_fifth_color     = carbon_get_theme_option( 'tiu_fifth_color' );
		$tiu_sixth_color     = carbon_get_theme_option( 'tiu_sixth_color' );
		$tiu_seven_color     = carbon_get_theme_option( 'tiu_seven_color' );
		$tiu_eight_color     = carbon_get_theme_option( 'tiu_eight_color' );
		$tiu_nine_color      = carbon_get_theme_option( 'tiu_nine_color' );

		echo '
			<style type="text/css" media="screen">
				:root {
					--primary-color: ' . esc_html( $tiu_primary_color ) . ';
					--secondary-color: ' . esc_html( $tiu_secondary_color ) . ';
					--third-color: ' . esc_html( $tiu_third_color ) . ';
					--fourth-color: ' . esc_html( $tiu_fourth_color ) . ';
					--fifth-color: ' . esc_html( $tiu_fifth_color ) . ';
					--sixth-color: ' . esc_html( $tiu_sixth_color ) . ';
					--seven-color: ' . esc_html( $tiu_seven_color ) . ';
					--eight-color: ' . esc_html( $tiu_eight_color ) . ';
					--nine-color: ' . esc_html( $tiu_nine_color ) . ';
				}
			</style>
		';
	}
}
