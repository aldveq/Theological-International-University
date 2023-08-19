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
$current_user_avatar = get_avatar_url( $current_user->ID );
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
			<ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
				<li class="nav-item dropdown">
					<a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
						aria-expanded="false">
						<img src="<?php echo esc_url($current_user_avatar); ?>" alt="<?php echo esc_attr( $current_user->display_name ); ?>" width="35" height="35" class="rounded-circle">
					</a>
					<div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
						<div class="message-body">
							<a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
								<i class="ti ti-user fs-6"></i>
								<p class="mb-0 fs-3">My Profile</p>
							</a>
							<a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
								<i class="ti ti-mail fs-6"></i>
								<p class="mb-0 fs-3">My Account</p>
							</a>
							<a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
								<i class="ti ti-list-check fs-6"></i>
								<p class="mb-0 fs-3">My Task</p>
							</a>
							<a href="<?php echo esc_url(wp_logout_url()); ?>" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
							</div>
					</div>
				</li>
			</ul>
		</div>
	</nav>
</header>
<!--  Header End -->
