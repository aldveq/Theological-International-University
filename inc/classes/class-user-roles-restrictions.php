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
		add_action('admin_init', [$this, 'theological_international_university_block_wp_admin_non_admins']);
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
			'level_0' => true 
			)
		);
	}

	/**
	* Adding custom user roles
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
	* Remove Admin Bar
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
		if (!is_user_logged_in()):
			return;
		endif;

		$current_user = wp_get_current_user();
		$current_roles = ( array ) $current_user->roles;
		$current_user_rol = $current_roles[0];

		// Avoid admin users get to the student dashboard
		if ((is_user_logged_in() 
			&& $current_user_rol == 'administrator'
			&& is_page('student-dashboard') )
			|| (is_user_logged_in() 
			&& $current_user_rol == 'administrator'
			&& is_page('student-diploma') )
		) {
			wp_redirect(admin_url());
			exit;
		}
		
		// Avoid Student users get to the Admin Dashboard
		if ((is_user_logged_in() 
			&& $current_user_rol == 'tiu_student'
			&& is_admin())
		) {
			wp_redirect(home_url('/student-dashboard/'));
			exit;
		}
	}

	 /**
	* Block wp-admin access for non-admins
	*
	* @return void
	*/
	public function theological_international_university_block_wp_admin_non_admins()
	{
		$current_user = wp_get_current_user();
		$current_roles = ( array ) $current_user->roles;
		$current_user_rol = $current_roles[0];

		if (is_admin() 
			&& ! current_user_can('administrator') 
			&& $current_user_rol == 'tiu_student' 
		) {
			wp_safe_redirect(get_permalink(get_page_by_path('student-dashboard')));
			exit;
		}
	}
}