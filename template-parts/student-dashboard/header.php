<?php
/**
* The template for the header of the student dashboard
*
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package Theological_International_University
*/

// Variables
$current_user = wp_get_current_user();
$current_user_avatar = get_avatar( 
	$current_user->ID, 
	35, 
	'', 
	$current_user->display_name, 
	array(
		'load' => 'lazy', 
		'class' => 'rounded-circle'
	), 
);
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
				<p class="fw-light mb-0">Welcome <p class="fw-semibold mb-0 ms-1"><?php echo esc_html( $current_user->display_name ); ?></p></p>
				<ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
					<li class="nav-item dropdown">
						<a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
							aria-expanded="false">
							<?php echo wp_kses_post($current_user_avatar); ?>
						</a>
						<div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
							<div class="message-body">
								<a href="<?php echo esc_url(admin_url( 'profile.php' )); ?>" class="d-flex align-items-center gap-2 dropdown-item">
									<i class="ti ti-user fs-6"></i>
									<p class="mb-0 fs-3">My Profile</p>
								</a>
								<a href="<?php echo esc_url(wp_logout_url()); ?>" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
								</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>
<!--  Header End -->
