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

$utilities               = \TIU_THEME\Inc\Utilities::get_instance();
$header_navigation_items = $utilities->get_menu_items_by_location( 'header-navigation' );
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

	<header class="header d-flex flex-row">
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
							<ul class="main_nav_list">
								<?php
									foreach($header_navigation_items as $hnav_item):
									?>
									<li class="main_nav_item"><a href="<?php echo esc_url($hnav_item->url);?>"><?php echo esc_html($hnav_item->title); ?></a></li>
									<?php
									endforeach;
								?>
							</ul>
						</div>
					</nav>
					<?php
				endif;
			?>
		</div>
		<div class="header_side d-flex flex-row justify-content-center align-items-center">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/phone-call.svg" alt="Main Office Telephone number of the Theological International University">
			<span><a href="tel:+43 4566 7788 2457">+43 4566 7788 2457</a></span>
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
			<div class="menu menu_mm">
				<?php
					if(is_array($header_navigation_items) && count($header_navigation_items) > 0):
					?>
					<ul class="menu_list menu_mm">
						<?php
							foreach($header_navigation_items as $hnav_item):
							?>
							<li class="menu_item menu_mm"><a href="<?php echo esc_url($hnav_item->url); ?>"><?php echo esc_html($hnav_item->title); ?></a></li>
							<?php
							endforeach;
						?>
					</ul>
					<?php
					endif;
				?>

				<!-- Menu Social -->
				
				<div class="menu_social_container menu_mm">
					<ul class="menu_social menu_mm">
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>

				<div class="menu_copyright menu_mm">Colorlib All rights reserved</div>
			</div>

		</div>

	</div>
