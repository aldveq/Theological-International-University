<?php
/**
 * The template for the student dashboard
 *
 * Template Name: Student Profile
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
	<div class="container-fluid student-profile-wrapper">
		<div class="row">
			<div class="col-12">
				<?php echo do_shortcode( '[user_registration_edit_profile]' ); ?>
			</div>
		</div>
	</div>
	</div>
</div>
<?php
get_footer( 'student-dashboard' );
