<?php
/**
 * The template for the student dashboard
 *
 * Template Name: Student Dashboard
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Theological_International_University
 */

get_header( 'student-dashboard' );

$student_welcome_message = pll_current_language( 'slug' ) === 'en' ?
carbon_get_theme_option( 'student_welcome_message' ) :
carbon_get_theme_option( 'student_welcome_message_es' );
?>
<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
	data-sidebar-position="fixed" data-header-position="fixed">
	<?php
		// Sidebar.
		get_template_part( 'template-parts/student-dashboard/sidebar' );
	?>
	<!--  Main wrapper -->
	<div class="body-wrapper">
	<?php
		// Header.
		get_template_part( 'template-parts/student-dashboard/header' );
	?>
	<div class="container-fluid student-dashboard-wrapper">
		<div class="card">
		<div class="card-body">
			<h1 class="display-6 mb-4"><?php esc_html_e( 'Student Dashboard', 'theological-international-university' ); ?></h1>
			<?php 
			if ( ! empty( $student_welcome_message ) ) :
				echo wp_kses_post( wpautop( $student_welcome_message, true ) ); 
				endif;
			?>
		</div>
		</div>
	</div>
	</div>
</div>
<?php
get_footer( 'student-dashboard' );
