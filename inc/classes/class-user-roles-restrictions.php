<?php
/**
 * Class User Roles Restrictions
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
 * Class User Roles Restrictions
 */
class USER_ROLES_RESTRICTIONS {
	use Singleton; // phpcs:ignore

	/**
	 * Class User Roles Restrictions Construct Function
	 */
	protected function __construct() {
		// Actions & Filters.
		$this->setup_hooks();
	}

	/**
	 * Setup Hooks
	 *
	 * @return void
	 */
	protected function setup_hooks() {
		add_action( 'init', array( $this, 'theological_international_university_add_custom_roles' ) );
		add_filter( 'login_redirect', array( $this, 'theological_international_university_login_redirect' ), 10, 3 );
		add_action( 'after_setup_theme', array( $this, 'theological_international_university_remove_admin_bar' ) );
		add_action( 'template_redirect', array( $this, 'theological_international_university_user_roles_redirect_restrictions' ) );
		add_action( 'admin_bar_menu', array( $this, 'theological_international_university_go_back_student_dashboard_link' ), 100 );
		add_action( 'admin_menu', array( $this, 'theological_international_university_hide_default_dashboard_menu_item_for_student_users' ) );
	}

	/**
	 * Adding custom user roles
	 *
	 * @return void
	 */
	public function theological_international_university_add_custom_roles() {
		add_role(
			'tiu_student', 
			__( 'TIU Student', 'theological-international-university' ), 
			array( 
				'read'       => true, 
				'level_0'    => true,
				'edit_users' => true,
			)
		);
	}

	/**
	 * Redirection rules by user role after login action
	 *
	 * @param string $url     Url.
	 * @param string $request Request.
	 * @param string $user    User.
	 *
	 * @return $url URL
	 */
	public function theological_international_university_login_redirect( $url, $request, $user ) {
		if ( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
			if ( $user->has_cap( 'administrator' ) ) {
				$url = admin_url();
			} elseif ( $user->has_cap( 'tiu_student' ) ) {
				$url = home_url( '/panel-estudiantes/' );
			}
		}
		return $url;
	}

	/**
	 * Remove Admin Bar For Student Users
	 *
	 * @return void
	 */
	public function theological_international_university_remove_admin_bar() {
		if ( ! current_user_can( 'administrator' ) && ! is_admin() ) {
			show_admin_bar( false ); // phpcs:ignore
		}
	}

	/**
	 * User Roles Redirect Restrictions
	 *
	 * @return void
	 */
	public function theological_international_university_user_roles_redirect_restrictions() {
		$current_user     = wp_get_current_user();
		$current_roles    = (array) $current_user->roles;
		$current_user_rol = is_array( $current_roles ) && count( $current_roles ) > 0 ? $current_roles[0] : '';

		// Avoid access to non-logged users to student pages.
		if ( ! is_user_logged_in() 
			&& ( is_page( 'student-dashboard' )
			|| is_page( 'panel-estudiantes' )
			|| is_page( 'student-diploma' )
			|| is_page( 'estudiante-certificaciones' )
			|| is_page( 'student-profile' )
			|| is_page( 'estudiante-perfil' ) ) 
		) {
			wp_safe_redirect( wp_login_url() );
			exit;
		}

		// Avoid admin users get to the student dashboard, 
		// student diploma, student profile & student registration pages.
		if ( ( is_user_logged_in() 
			&& 'administrator' === $current_user_rol
			&& ( is_page( 'student-dashboard' ) || is_page( 'panel-estudiantes' ) ) )
			|| ( is_user_logged_in() 
			&& 'administrator' === $current_user_rol
			&& ( is_page( 'student-diploma' ) || is_page( 'estudiante-certificaciones' ) ) )
			|| ( is_user_logged_in() 
			&& 'administrator' === $current_user_rol
			&& ( is_page( 'student-registration-form' ) || is_page( 'registro-estudiantes' ) ) )
			|| ( is_user_logged_in() 
			&& 'administrator' === $current_user_rol
			&& ( is_page( 'student-profile' ) || is_page( 'estudiante-perfil' ) ) )
		) {
			wp_safe_redirect( admin_url() );
			exit;
		}

		// Avoid student users get to the student registration page - EN.
		if ( is_user_logged_in() 
			&& 'tiu_student' === $current_user_rol
			&& is_page( 'student-registration-form' )
		) {
			wp_safe_redirect( home_url( '/student-dashboard/' ) );
			exit;
		}

		// Avoid student users get to the student registration page - ES.
		if ( is_user_logged_in() 
			&& 'tiu_student' === $current_user_rol
			&& is_page( 'registro-estudiantes' )
		) {
			wp_safe_redirect( home_url( '/panel-estudiantes/' ) );
			exit;
		}

		// Avoid student users get to the wp admin area - EN.
		if ( is_user_logged_in() 
			&& 'tiu_student' === $current_user_rol
			&& is_admin()
			&& pll_current_language( 'slug' ) === 'en'
		) {
			wp_safe_redirect( home_url( '/student-dashboard/' ) );
			exit;
		}
		
		// Avoid student users get to the wp admin area - ES.
		if ( is_user_logged_in() 
			&& 'tiu_student' === $current_user_rol
			&& is_admin()
			&& pll_current_language( 'slug' ) === 'es'
		) {
			wp_safe_redirect( home_url( '/panel-estudiantes/' ) );
			exit;
		}
	}

	/**
	 * Custom Go back dashboard link for student users
	 *
	 * @param WP_Admin_Bar $admin_bar Admin Bar.
	 * @return void
	 */
	public function theological_international_university_go_back_student_dashboard_link( $admin_bar ) {
		if ( ! is_user_logged_in() ) :
			return;
		endif;

		$current_user     = wp_get_current_user();
		$current_roles    = (array) $current_user->roles;
		$current_user_rol = $current_roles[0];

		if (
			is_user_logged_in()
			&& 'tiu_student' === $current_user_rol
			&& is_admin()
		) {
			$admin_bar->add_menu(
				array(
					'id'    => 'go-back-dashboard-link',
					'title' => '<span class="ab-icon dashicons dashicons-arrow-right-alt" style="margin-top: 2px; "></span>' . __( 'Go back to student dashboard', 'theological-international-university' ),
					'href'  => home_url( '/student-dashboard/' ),
					'meta'  => array(
						'title' => __( 'Go back to student dashboard', 'theological-international-university' ),
					),
				)
			);
		}
	}
	
	/**
	 * Hiding default dashboard menu item for student users
	 *
	 * @return void
	 */
	public function theological_international_university_hide_default_dashboard_menu_item_for_student_users() {
		if ( ! is_user_logged_in() ) :
			return;
		endif;

		$current_user     = wp_get_current_user();
		$current_roles    = (array) $current_user->roles;
		$current_user_rol = $current_roles[0];

		if (
			is_user_logged_in()
			&& 'tiu_student' === $current_user_rol
			&& is_admin()
		) {
			remove_menu_page( 'index.php' );
		}
	}
}
