<?php
/**
 * The template for the student dashboard
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

get_header('student-dashboard');
?>
<!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <?php
		// Sidebar
		get_template_part('template-parts/student-dashboard/sidebar');
	?>
    <!--  Main wrapper -->
    <div class="body-wrapper">
	<?php
		// Header
		get_template_part('template-parts/student-dashboard/header');
	?>
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
			<h1 class="display-6 mb-4">Dashboard</h1>
            <p class="fs-5 mb-0">Hi <?php echo esc_html($current_user->display_name); ?>. Welcome to the student dashboard of the Theological International University.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
get_footer('student-dashboard');
