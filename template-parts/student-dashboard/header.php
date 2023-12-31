<?php
/**
 * The template for the header of the student dashboard
 *
 * PHP version 8
 *
 * @category Themes
 * @package  Theological_International_University
 * @author   Aldo Paz Velasquez <aldveq80@gmail.com>
 * @license  GPL-2.0-or-later http://www.gnu.org/licenses/gpl-2.0.txt
 * @link     https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

// Variables.
$current_user        = wp_get_current_user(); // phpcs:ignore
$current_user_avatar = get_avatar( 
	$current_user->ID, 
	35, 
	'', 
	$current_user->display_name, 
	array(
		'load'  => 'lazy', 
		'class' => 'rounded-circle',
	)
);
$is_page_in_english  = pll_current_language( 'slug' ) === 'en' ? true : false;
?>

<!--  Header Start -->
<header class="app-header">
	<nav class="navbar navbar-expand-lg navbar-light">
		<ul class="navbar-nav">
			<li class="nav-item d-block d-xl-none">
				<a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
				<i class="ti ti-menu-2"></i>
				</a>
			</li>
		</ul>
		<div class="navbar-collapse justify-content-end px-0" id="navbarNav">
			<div class="d-flex justify-content-start align-items-center">
				<p class="fw-light mb-0">
					<?php 
						printf(
							/* translators: %s: User Name */
							esc_html__( 'Welcome %s', 'theological-international-university' ),
							'<p class="fw-semibold mb-0 ms-1">' . esc_html( $current_user->display_name ) . '</p>' 
						); 
						?>
				</p>
				<ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
					<li class="nav-item dropdown">
						<a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
							aria-expanded="false">
							<?php echo wp_kses_post( $current_user_avatar ); ?>
						</a>
						<div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
							<div class="message-body">
								<a href="<?php echo esc_url( $is_page_in_english ? site_url( 'student-profile' ) : site_url( 'estudiante-perfil' ) ); ?>" class="d-flex align-items-center gap-2 dropdown-item">
									<i class="ti ti-user fs-6"></i>
									<p class="mb-0 fs-3"><?php esc_html_e( 'My Profile', 'theological-international-university' ); ?></p>
								</a>
								<a href="<?php echo esc_url( wp_logout_url() ); ?>" class="btn btn-outline-primary mx-3 mt-2 d-block"><?php esc_html_e( 'Logout', 'theological-international-university' ); ?></a>
								</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>
<!--  Header End -->
