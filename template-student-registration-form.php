<?php
/**
 * The template for displaying the student registration form
 *
 * Template Name: Student Registration
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Theological_International_University
 */

get_header();

 // Variables
 $srf_bg_image = carbon_get_theme_option('srf_bg_image');
 $srf_heading_text = pll_current_language('slug') === 'en' ? 
 carbon_get_theme_option('srf_heading_text') : 
 carbon_get_theme_option('srf_heading_text_es');
?>
	<main id="primary" class="site-main student-registration-form-wrapper">
		<div class="home student-registration-form-wrapper__heading">
			<?php
				if(!empty($srf_bg_image)):
				?>
				<div class="home_background_container prlx_parent">
					<div class="home_background prlx" style="background-image:url(<?php echo esc_url(wp_get_attachment_image_url($srf_bg_image, 'full')); ?>);"></div>
				</div>
				<?php
				endif;

				if(!empty($srf_heading_text)):
				?>
				<div class="home_content">
					<h1><?php echo esc_html($srf_heading_text); ?></h1>
				</div>
				<?php
				endif;
			?>
		</div>
		<div class="container">
			<div class="student-registration-form-wrapper__form">
				<?php
					$tiu_logo_id = get_theme_mod( 'custom_logo' );
					
					if ( ! empty( $tiu_logo_id ) ) :
						$tiu_logo_url = wp_get_attachment_image_url( $tiu_logo_id, 'full' );     
						$tiu_logo_alt = get_post_meta( $tiu_logo_id, '_wp_attachment_image_alt', true );
						?>
						<img src="<?php echo esc_url($tiu_logo_url); ?>" alt="<?php echo esc_attr($tiu_logo_alt); ?>" class="logo" loading="lazy">
						<?php
					endif;
				?>
				<?php echo do_shortcode( '[user_registration_form id="184"]' ); ?>
			</div>
		</div>
	</main><!-- #main -->
<?php
get_footer();
