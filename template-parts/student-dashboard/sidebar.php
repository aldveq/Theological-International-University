<?php
/**
 * The template for the sidebar of the student dashboard
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Theological_International_University
 */

// Variables.
$is_page_in_english = pll_current_language( 'slug' ) === 'en' ? true : false;
$tiu_logo_id        = get_theme_mod( 'custom_logo' );
$tiu_logo_url       = wp_get_attachment_image_url( $tiu_logo_id, 'full' );
?>

<!-- Sidebar Start -->
<aside class="left-sidebar">
	<!-- Sidebar scroll-->
	<div>
		<div class="brand-logo d-flex align-items-center justify-content-between">
			<a href="<?php echo esc_url( $is_page_in_english ? home_url( 'student-dashboard' ) : home_url( 'panel-estudiantes' ) ); ?>" class="text-nowrap logo-img">
			<img src="<?php echo esc_url( $tiu_logo_url ); ?>" width="120" height="120" alt="Theological International University of Miami" />
			</a>
			<div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
			<i class="ti ti-x fs-8"></i>
			</div>
		</div>

		<!-- Sidebar navigation-->
		<nav class="sidebar-nav scroll-sidebar" data-simplebar="">
			<ul id="sidebarnav">
				<li class="nav-small-cap">
					<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
					<span class="hide-menu"><?php esc_html_e( 'Navigation', 'theological-international-university' ); ?></span>
				</li>
				<li class="sidebar-item">
					<a class="sidebar-link <?php echo esc_attr( is_page( 'student-dashboard' ) || is_page( 'panel-estudiantes' ) ? 'active' : '' ); ?>" href="<?php echo esc_url( $is_page_in_english ? site_url( 'student-dashboard' ) : site_url( 'panel-estudiantes' ) ); ?>" aria-expanded="false">
					<span>
						<i class="ti ti-layout-dashboard"></i>
					</span>
					<span class="hide-menu"><?php esc_html_e( 'Home', 'theological-international-university' ); ?></span>
					</a>
				</li>
				<li class="sidebar-item">
					<a class="sidebar-link <?php echo esc_attr( is_page( 'student-diploma' ) || is_page( 'estudiante-certificaciones' ) ? 'active' : '' ); ?>" href="<?php echo esc_url( $is_page_in_english ? site_url( 'student-diploma' ) : site_url( 'estudiante-certificaciones' ) ); ?>" aria-expanded="false">
					<span>
						<i class="ti ti-certificate"></i>
					</span>
					<span class="hide-menu"><?php esc_html_e( 'Diploma', 'theological-international-university' ); ?></span>
					</a>
				</li>
				<li class="sidebar-item">
					<a class="sidebar-link <?php echo esc_attr( is_page( 'student-profile' ) || is_page( 'estudiante-perfil' ) ? 'active' : '' ); ?>" href="<?php echo esc_url( $is_page_in_english ? site_url( 'student-profile' ) : site_url( 'estudiante-perfil' ) ); ?>" aria-expanded="false">
					<span>
						<i class="ti ti-user"></i>
					</span>
					<span class="hide-menu"><?php esc_html_e( 'My Profile', 'theological-international-university' ); ?></span>
					</a>
				</li>
				<li class="nav-small-cap">
					<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
					<span class="hide-menu"><?php esc_html_e( 'Quick Links', 'theological-international-university' ); ?></span>
				</li>
				<li class="sidebar-item">
					<a class="sidebar-link" href="<?php echo esc_url( $is_page_in_english ? site_url() . '/en/home' : site_url() ); ?>" aria-expanded="false">
					<span>
						<i class="ti ti-device-desktop"></i>
					</span>
					<span class="hide-menu"><?php esc_html_e( 'View Site', 'theological-international-university' ); ?></span>
					</a>
				</li>
			</ul>
		</nav>
		<!-- End Sidebar navigation -->
	</div>
	<!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->
