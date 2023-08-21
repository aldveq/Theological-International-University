<?php
/**
 * The template for the student diploma page
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

$current_user = wp_get_current_user();
$post_types_queries_data = \TIU_THEME\Inc\POST_TYPES_QUERIES::get_instance();
$diploma_by_student_user_data = $post_types_queries_data->get_diploma_by_student_user($current_user->ID);
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
      <div class="container-fluid student-diploma-wrapper">

	  	<div class="row">
			<div class="col-12">
				<h1 class="display-6 mb-5">My Diploma</h1>

				<?php
					if (!empty($diploma_by_student_user_data)):
					?>
						<div class="card" style="width: 16rem;">
							<img src="<?php echo esc_url($diploma_by_student_user_data); ?>" class="card-img-top" alt="Diploma of <?php echo esc_attr($current_user->display_name); ?>">
							<div class="card-body d-flex justify-content-center align-items-center py-4">
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullScreenStudenDiploma">See Diploma</button>
							</div>
						</div>
					<?php
					endif;
				?>	
			</div>
		</div>
      </div>
    </div>

	<!-- The Modal -->
	<div class="modal" id="fullScreenStudenDiploma">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">My Diploma</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<div class="row">
						<div class="col-12 d-flex justify-content-center align-items-center">
							<img src="<?php echo esc_url($diploma_by_student_user_data); ?>" class="img-fluid" alt="Diploma of <?php echo esc_attr($current_user->display_name); ?>">
						</div>
					</div>
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

  </div>
<?php
get_footer('student-dashboard');
