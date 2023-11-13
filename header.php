<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theological_International_University
 */

// Variables
$utilities               = \TIU_THEME\Inc\Utilities::get_instance();
$header_navigation_items = $utilities->get_menu_items_by_location( 'header-navigation' );
$global_primary_phone_label = !empty(carbon_get_theme_option('tiu_primary_phone_label')) ? carbon_get_theme_option('tiu_primary_phone_label') : '';
$global_primary_phone_number = !empty(carbon_get_theme_option('tiu_primary_phone')) ? carbon_get_theme_option('tiu_primary_phone') : '';
$global_social_data = carbon_get_theme_option('socials_data');
$global_header_copyright_text = pll_current_language('slug') === 'en' ? 
carbon_get_theme_option('header_copyright_text') : 
carbon_get_theme_option('header_copyright_text_es');
$is_page_in_english = pll_current_language('slug')  === 'en' ? true : false;

// User Data
$current_user = wp_get_current_user();
$current_roles = ( array ) $current_user->roles;
$current_user_rol = is_array($current_roles) && count($current_roles) > 0 ? $current_roles[0] : '';
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site super_container">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'theological-international-university' ); ?></a>

	<header class="header <?php echo esc_attr(is_404() ? 'd-none' : 'd-flex'); ?> flex-row">
		<div class="header_content d-flex flex-row align-items-center">
			<!-- Logo -->
			<div class="logo_container">
				<?php 
					$tiu_logo_id = get_theme_mod( 'custom_logo' );
					
					if ( ! empty( $tiu_logo_id ) ) :
						$tiu_logo_url = wp_get_attachment_image_url( $tiu_logo_id, 'full' );     
						$tiu_logo_alt = get_post_meta( $tiu_logo_id, '_wp_attachment_image_alt', true );
						?>
						<div class="logo">
							<a href="<?php echo esc_url( home_url() ); ?>">
								<img src="<?php echo esc_url($tiu_logo_url); ?>" alt="<?php echo esc_attr($tiu_logo_alt); ?>">
							</a>
						</div>
						<?php
					endif;
				?>
			</div>

			<?php
				if(is_array($header_navigation_items) && count($header_navigation_items) > 0):
					?>
					<!-- Main Navigation -->
					<nav class="main_nav_container">
						<div class="main_nav">
							<ul class="main_nav_list" id="headerMainNav">
								<?php
									foreach($header_navigation_items as $hnav_item):
									if((sanitize_title( $hnav_item->title ) === 'register'
									&& is_user_logged_in()) || (sanitize_title( $hnav_item->title ) === 'registro'
									&& is_user_logged_in())):
										continue;
									endif;
									?>
									<li class="main_nav_item"><a href="<?php echo esc_url($hnav_item->url);?>"><?php echo esc_html($hnav_item->title); ?></a></li>
									<?php
									endforeach;
								?>

								<?php
									if(is_user_logged_in() && $current_user_rol == 'tiu_student'):
									?>
									<li class="main_nav_item"><a href="<?php echo esc_url($is_page_in_english ? home_url('/student-dashboard/') : home_url('/panel-estudiantes/'));?>" target="_self"><?php esc_html_e('Dashboard', 'theological-international-university'); ?></a></li>
									<?php
									endif;
								?>
							</ul>
						</div>
					</nav>
					<?php
				endif;
			?>
		</div>
		<div class="header_side d-flex flex-row justify-content-center align-items-center">
			<?php
				if (is_user_logged_in()):
				?>
				<a href="<?php echo esc_url(wp_logout_url()); ?>" class="login-link" target="_self">
					<span><?php esc_html_e( 'LOGOUT', 'theological-international-university' ); ?></span>
					<span class="icon"><i class="fas fa-sign-out-alt"></i></span>
				</a>
				<?php
				else:
				?>
				<a href="<?php echo esc_url(wp_login_url()); ?>" class="login-link" target="_self">
					<span><?php echo esc_html_e( 'LOGIN', 'theological-international-university' ); ?></span>
					<span class="icon"><i class="fas fa-sign-in-alt"></i></span>
				</a>
				<?php
				endif;
			?>
		</div>

		<!-- Hamburger -->
		<div class="hamburger_container">
			<i class="fas fa-bars trans_200"></i>
		</div>
	</header>

	<div class="menu_container menu_mm">

		<!-- Menu Close Button -->
		<div class="menu_close_container">
			<div class="menu_close"></div>
		</div>

		<!-- Menu Items -->
		<div class="menu_inner menu_mm">
			<div class="menu menu_mm menu-mobile-wrapper">
				<?php
					if(is_array($header_navigation_items) && count($header_navigation_items) > 0):
					?>
					<ul class="menu_list menu_mm" id="headerMainMobileNav">
						<?php
							foreach($header_navigation_items as $hnav_item):
							if((sanitize_title( $hnav_item->title ) === 'register'
							&& is_user_logged_in()) || (sanitize_title( $hnav_item->title ) === 'registro'
							&& is_user_logged_in())):
								continue;
							endif;
							?>
							<li class="menu_item menu_mm"><a href="<?php echo esc_url($hnav_item->url); ?>"><?php echo esc_html($hnav_item->title); ?></a></li>
							<?php
							endforeach;
						?>

						<?php

							if(is_user_logged_in() && $current_user_rol == 'tiu_student'):
							?>
							<li class="menu_item menu_mm"><a href="<?php echo esc_url($is_page_in_english ? home_url('/student-dashboard/') : home_url('/panel-estudiantes/'));?>"><?php esc_html_e('Dashboard', 'theological-international-university'); ?></a></li>
							<?php
							endif;

							if (is_user_logged_in()):
							?>
							<li class="menu_item menu_mm"><a href="<?php echo esc_url(wp_logout_url()); ?>"><?php esc_html_e('Logout', 'theological-international-university'); ?> <i class="fas fa-sign-out-alt"></i></a></li>
							<?php
							else:
							?>
							<li class="menu_item menu_mm"><a href="<?php echo esc_url(wp_login_url()); ?>"><?php esc_html_e('Login', 'theological-international-university'); ?> <i class="fas fa-sign-in-alt"></i></a></li>
							<?php
							endif;
						?>
					</ul>
					<?php
					endif;
				?>

				<!-- Menu Social -->
				<?php
					if (is_array($global_social_data) && count($global_social_data) > 0):
					?>
					<div class="menu_social_container menu_mm">
						<ul class="menu_social menu_mm">
							<?php
								foreach($global_social_data as $g_social_data):
								?>
								<li class="menu_social_item menu_mm"><a href="<?php echo esc_url($g_social_data['social_url']); ?>" target="_blank"><i class="<?php echo esc_attr($g_social_data['social_icon']['class']); ?>"></i></a></li>
								<?php
								endforeach;
							?>
						</ul>
					</div>
					<?php
					endif;
				?>

				<?php
					if (!empty($global_header_copyright_text)):
					?>
					<div class="menu_copyright menu_mm"><?php echo esc_html($global_header_copyright_text); ?></div>
					<?php
					endif;
				?>
			</div>

		</div>

	</div>
