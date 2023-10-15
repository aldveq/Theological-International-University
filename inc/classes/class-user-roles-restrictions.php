<?php

/**
* @package Theological_International_University
*/

namespace TIU_THEME\Inc;

use TIU_THEME\Inc\Traits\Singleton;

class USER_ROLES_RESTRICTIONS {
	use Singleton;

	protected function __construct() {
		// Actions & Filters
		$this->setup_hooks();
	}

	protected function setup_hooks() {
		add_action('init', [$this, 'theological_international_university_add_custom_roles']);
		add_filter('login_redirect', [$this, 'theological_international_university_login_redirect'], 10, 3);
		add_action('after_setup_theme', [$this, 'theological_international_university_remove_admin_bar']);
		add_action('template_redirect', [$this, 'theological_international_university_user_roles_redirect_restrictions']);
		add_action( 'admin_bar_menu', [$this, 'theological_international_university_go_back_student_dashboard_link'], 100 );
		add_action('admin_menu', [$this, 'theological_international_university_hide_default_dashboard_menu_item_for_student_users']);
	}

	/**
	* Adding custom user roles
	*
	* @return void
	*/
	public function theological_international_university_add_custom_roles()
	{
		add_role(
			'tiu_student', 
			__('TIU Student', 'theological-international-university'), 
			array( 
			'read' => true, 
			'level_0' => true,
			'edit_users' => true
			)
		);
	}

	/**
	* Redirection rules by user role after login action
	*
	* @param string $url     Url
	* @param string $request Request
	* @param string $user    User
	*
	* @return $url URL
	*/
	public function theological_international_university_login_redirect( $url, $request, $user )
	{
		if ($user && is_object($user) && is_a($user, 'WP_User') ) {
			if ($user->has_cap('administrator')) {
				$url = admin_url();
			} elseif ($user->has_cap('tiu_student')) {
				$url = home_url('/student-dashboard/');
			}
		}
		return $url;
	}

	/**
	* Remove Admin Bar For Student Users
	*
	* @return void
	*/
	public function theological_international_university_remove_admin_bar()
	{
		if (!current_user_can('administrator') && !is_admin()) {
			show_admin_bar(false);
		}
	}

	/**
	* User Roles Redirect Restrictions
	*
	* @return void
	*/
	public function theological_international_university_user_roles_redirect_restrictions()
	{
		$current_user = wp_get_current_user();
		$current_roles = ( array ) $current_user->roles;
		$current_user_rol = is_array($current_roles) && count($current_roles) > 0 ? $current_roles[0] : '';

		// Avoid access to non-logged users to student pages
		if (!is_user_logged_in() 
			&& (is_page('student-dashboard')
			|| is_page('student-diploma')
			|| is_page('student-profile')) 
		) {
			wp_redirect(wp_login_url());
			exit;
		}

		// Avoid admin users get to the student dashboard, 
		// student diploma, student profile & student registration pages
		if ((is_user_logged_in() 
			&& $current_user_rol == 'administrator'
			&& is_page('student-dashboard') )
			|| (is_user_logged_in() 
			&& $current_user_rol == 'administrator'
			&& is_page('student-diploma') )
			|| (is_user_logged_in() 
			&& $current_user_rol == 'administrator'
			&& is_page('student-registration-form') )
			|| (is_user_logged_in() 
			&& $current_user_rol == 'administrator'
			&& is_page('student-profile') )
		) {
			wp_redirect(admin_url());
			exit;
		}

		// Avoid student users get to the student registration page
		if (is_user_logged_in() 
			&& $current_user_rol == 'tiu_student'
			&& is_page('student-registration-form')
		) {
			wp_redirect(home_url('/student-dashboard/'));
			exit;
		}
	}

	/**
	* Custom Go back dashboard link for student users
	*
	* @return void
	*/
	public function theological_international_university_go_back_student_dashboard_link( $admin_bar ) {
		if (!is_user_logged_in()):
			return;
		endif;

		$current_user = wp_get_current_user();
		$current_roles = ( array ) $current_user->roles;
		$current_user_rol = $current_roles[0];

		if (
			is_user_logged_in()
			&& $current_user_rol == 'tiu_student'
			&& is_admin()
		) {
			$admin_bar->add_menu( array(
				'id'    => 'go-back-dashboard-link',
				'title' => '<span class="ab-icon dashicons dashicons-arrow-right-alt" style="margin-top: 2px; "></span>' . __('Go back to student dashboard', 'theological-international-university'),
				'href'  => home_url('/student-dashboard/'),
				'meta'  => array(
					'title' => __('Go back to student dashboard', 'theological-international-university'),
				),
			));
		}
	}
	
	/**
	* Hiding default dashboard menu item for student users
	*
	* @return void
	*/
	public function theological_international_university_hide_default_dashboard_menu_item_for_student_users() {
		if (!is_user_logged_in()):
			return;
		endif;

		$current_user = wp_get_current_user();
		$current_roles = ( array ) $current_user->roles;
		$current_user_rol = $current_roles[0];

		if (
			is_user_logged_in()
			&& $current_user_rol == 'tiu_student'
			&& is_admin()
		) {
			remove_menu_page( 'index.php' );
		}
	}
}
