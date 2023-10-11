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
				<h1 class="display-6 mb-5">My Diploma(s)</h1>

				<?php
					if (is_array($diploma_by_student_user_data) 
					&& count($diploma_by_student_user_data) > 0):
					?>
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<?php
								$nav_item_counter = 0;
								foreach($diploma_by_student_user_data as $ds_data):
									if($nav_item_counter === 0):
									?>
									<li class="nav-item" role="presentation">
										<button class="nav-link active" id="<?php echo esc_attr(sanitize_title( $ds_data['diploma_type'] )); ?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo esc_attr(sanitize_title( $ds_data['diploma_type'] )); ?>-tab-pane" type="button" role="tab" aria-controls="<?php echo esc_attr(sanitize_title( $ds_data['diploma_type'] )); ?>-tab-pane" aria-selected="true"><?php echo esc_html(ucfirst( $ds_data['diploma_type'] )); ?></button>
									</li>
									<?php
									else:
									?>
									<li class="nav-item" role="presentation">
										<button class="nav-link" id="<?php echo esc_attr(sanitize_title( $ds_data['diploma_type'] )); ?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo esc_attr(sanitize_title( $ds_data['diploma_type'] )); ?>-tab-pane" type="button" role="tab" aria-controls="<?php echo esc_attr(sanitize_title( $ds_data['diploma_type'] )); ?>-tab-pane" aria-selected="false"><?php echo esc_html(ucfirst( $ds_data['diploma_type'] )); ?></button>
									</li>
									<?php
									endif;
									$nav_item_counter++;
								endforeach;
							?>
						</ul>
						<div class="tab-content" id="myTabContent">
							<?php
								$tab_content_counter = 0;
								foreach($diploma_by_student_user_data as $ds_data):
									if($tab_content_counter === 0):
									?>
									<div class="tab-pane fade p-4 show active" id="<?php echo esc_attr(sanitize_title( $ds_data['diploma_type'] )); ?>-tab-pane" role="tabpanel" aria-labelledby="<?php echo esc_attr(sanitize_title( $ds_data['diploma_type'] )); ?>-tab" tabindex="0">
										<div class="card m-0" style="width: 16rem;">
											<img src="<?php echo esc_url(wp_get_attachment_image_url( $ds_data['diploma_image'], 'full', false )); ?>" class="card-img-top" alt="Diploma of <?php echo esc_attr($current_user->display_name); ?>">
											<div class="card-body d-flex justify-content-center align-items-center py-4">
												<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullScreenStudent<?php echo esc_attr(ucfirst( $ds_data['diploma_type'] )); ?>Diploma">See Diploma</button>
											</div>
										</div>

										<!-- The Modal -->
										<div class="modal" id="fullScreenStudent<?php echo esc_attr(ucfirst( $ds_data['diploma_type'] )); ?>Diploma">
											<div class="modal-dialog modal-xl">
												<div class="modal-content">
													<!-- Modal Header -->
													<div class="modal-header">
														<h4 class="modal-title">My <?php echo esc_html(ucfirst( $ds_data['diploma_type'] )); ?></h4>
														<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
													</div>

													<!-- Modal body -->
													<div class="modal-body">
														<div class="row">
															<div class="col-12 d-flex justify-content-center align-items-center">
																<img src="<?php echo esc_url(wp_get_attachment_image_url( $ds_data['diploma_image'], 'full', false )); ?>" class="img-fluid" alt="<?php echo esc_attr(ucfirst( $ds_data['diploma_type'] )); ?> of <?php echo esc_attr($current_user->display_name); ?>">
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
									else:
									?>
									<div class="tab-pane fade p-4" id="<?php echo esc_attr(sanitize_title( $ds_data['diploma_type'] )); ?>-tab-pane" role="tabpanel" aria-labelledby="<?php echo esc_attr(sanitize_title( $ds_data['diploma_type'] )); ?>-tab" tabindex="0">
										<div class="card m-0" style="width: 16rem;">
											<img src="<?php echo esc_url(wp_get_attachment_image_url( $ds_data['diploma_image'], 'full', false )); ?>" class="card-img-top" alt="Diploma of <?php echo esc_attr($current_user->display_name); ?>">
											<div class="card-body d-flex justify-content-center align-items-center py-4">
												<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullScreenStudent<?php echo esc_attr(ucfirst( $ds_data['diploma_type'] )); ?>Diploma">See Diploma</button>
											</div>
										</div>

										<!-- The Modal -->
										<div class="modal" id="fullScreenStudent<?php echo esc_attr(ucfirst( $ds_data['diploma_type'] )); ?>Diploma">
											<div class="modal-dialog modal-xl">
												<div class="modal-content">
													<!-- Modal Header -->
													<div class="modal-header">
														<h4 class="modal-title">My <?php echo esc_html(ucfirst( $ds_data['diploma_type'] )); ?></h4>
														<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
													</div>

													<!-- Modal body -->
													<div class="modal-body">
														<div class="row">
															<div class="col-12 d-flex justify-content-center align-items-center">
																<img src="<?php echo esc_url(wp_get_attachment_image_url( $ds_data['diploma_image'], 'full', false )); ?>" class="img-fluid" alt="<?php echo esc_attr(ucfirst( $ds_data['diploma_type'] )); ?> of <?php echo esc_attr($current_user->display_name); ?>">
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
									endif;
									$tab_content_counter++;
								endforeach;
							?>
						</div>
					<?php
					else:
					?>
						<div class="alert alert-warning" role="alert">
							<h4 class="alert-heading">Oh, no!</h4>
							<p>You haven't taken a course yet!</p>
							<hr>
  							<p class="mb-0">Please, consider taking one of our great courses. <br> Once your chosen course is completed, you will see your diploma here.</p>
						</div>
					<?php
					endif;
				?>	
			</div>
		</div>
      </div>
    </div>

  </div>
<?php
get_footer('student-dashboard');
