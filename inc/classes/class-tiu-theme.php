<?php
/**
 * Class TIU Theme
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
 * Class TIU Theme
 */
class TIU_THEME {
	use Singleton; // phpcs:ignore

	/**
	 * Class TIU Theme Construct Function
	 */
	protected function __construct() {
		// Loading Classes.
		ASSETS::get_instance();
		USER_ROLES_RESTRICTIONS::get_instance();
		CARBON_FIELDS_SETUP::get_instance();
		CUSTOM_POST_TYPES::get_instance();
		THEME_OPTIONS::get_instance();
		CUSTOM_GUTENBERG_BLOCKS::get_instance();
		UTILITIES::get_instance();

		// Actions & Filters.
		$this->setup_hooks();
	}

	/**
	 * Setup Hooks
	 *
	 * @return void
	 */
	protected function setup_hooks() {
		add_action( 'after_setup_theme', array( $this, 'theological_international_university_setup' ) );
		add_action( 'after_setup_theme', array( $this, 'theological_international_university_content_width' ), 0 );
		add_action( 'widgets_init', array( $this, 'theological_international_university_widgets_init' ) );
		add_action( 'login_head', array( $this, 'theological_international_university_custom_login_background' ) );
		add_filter( 'login_headerurl', array( $this, 'tiu_login_header_url' ) );
	}

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	public function theological_international_university_setup() {
		/*
			* Make theme available for translation.
			* Translations can be filed in the /languages/ directory.
			* If you're building a theme based on Theological International University, use a find and replace
			* to change 'theological-international-university' to the name of your theme in all the template files.
			*/
		load_theme_textdomain( 'theological-international-university', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
			* Let WordPress manage the document title.
			* By adding theme support, we declare that this theme does not use a
			* hard-coded <title> tag in the document head, and expect WordPress to
			* provide it for us.
			*/
		add_theme_support( 'title-tag' );

		/*
			* Enable support for Post Thumbnails on posts and pages.
			*
			* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
			*/
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'header-navigation'           => esc_html__( 'Header Navigation', 'theological-international-university' ),
				'footer-primary-navigation'   => esc_html__( 'Footer Primary Navigation', 'theological-international-university' ),
				'footer-secondary-navigation' => esc_html__( 'Footer Secondary Navigation', 'theological-international-university' ),
			)
		);

		/*
			* Switch default core markup for search form, comment form, and comments
			* to output valid HTML5.
			*/
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'theological_international_university_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		* Add support for core custom logo.
		*
		* @link https://codex.wordpress.org/Theme_Logo
		*/
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_image_size( 'hero_slider_img_size', 1920, 1080, true );
		add_image_size( 'split_view_img_size', 1140, 760, true );
		add_image_size( 'review_bg_img_size', 1920, 1080, true );
		add_image_size( 'review_user_img_size', 100, 100, true );
		add_image_size( 'content_text_img_size', 540, 320, true );
		add_image_size( 'milestone_bg_size', 1920, 1080, true );
		add_image_size( 'milestone_icon_size', 70, 70, true );
		add_image_size( 'professor_img_size', 350, 270, true );
		add_image_size( 'blog_bg_img_size', 1920, 470, true );
		add_image_size( 'blog_card_img_size', 730, 384, true );
		add_image_size( 'diploma_card_img_size', 260, 180, true );
		add_image_size( 'diploma_modal_img_size', 600, 424, true );
	}

	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width
	 */
	public function theological_international_university_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'theological_international_university_content_width', 640 );
	}

	/**
	 * Register widget area.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	public function theological_international_university_widgets_init() {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Sidebar', 'theological-international-university' ),
				'id'            => 'sidebar-1',
				'description'   => esc_html__( 'Add widgets here.', 'theological-international-university' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}

	/**
	 * TIU Custom Login Background
	 *
	 * @return void
	 */
	public function theological_international_university_custom_login_background() {
		$tiu_logo_id  = get_theme_mod( 'custom_logo' );
		$tiu_logo_url = wp_get_attachment_image_url( $tiu_logo_id, 'full' );
		?>
			<style type='text/css'>
				body.login{
					background: #000244;
				}
				body.login h1 a {
					width: 260px !important;
					height: 150px !important;
					background-image: url(<?php echo esc_url( $tiu_logo_url ); ?>) !important;
					background-repeat: no-repeat !important;
					background-size: contain !important;
					background-position: center top !important;
				}
				body.login #backtoblog a, .login #nav a {
					color: #ffffff !important;
				}
			</style>
		<?php
	}

	/**
	 * TIU Login Header URL
	 *
	 * @param string $url URL.
	 * @return string $url Custom URL
	 */
	public function tiu_login_header_url( $url ) {
		return home_url();
	}
}
