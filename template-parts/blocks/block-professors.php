<?php
	// Block Variables
	$professors_block_title = $args['professors_data']['professors_title'];
	$post_types_queries_data = \TIU_THEME\Inc\POST_TYPES_QUERIES::get_instance();
	$professors_data = $post_types_queries_data->get_professor_post_type_data();
?>

<div class="teachers page_section">
	<div class="container">
		<?php
			if (!empty($professors_block_title)):
			?>
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1><?php echo esc_html($professors_block_title); ?></h1>
					</div>
				</div>
			</div>
			<?php
			endif;
		?>

		<div class="row services_row">
			<?php
				if (is_array($professors_data) && count($professors_data) > 0):
					foreach($professors_data as $p_data):
					?>
					<!-- Teacher -->
					<div class="col-lg-4 teacher">
						<div class="card">
							<div class="card_img">
								<?php
									if (!empty($p_data->image)):
									 echo $p_data->image;
									endif;
								?>
							</div>
							<div class="card-body text-center">
								<?php
									if (!empty($p_data->name)):
									?>
									<div class="card-title">
										<p><?php echo esc_html($p_data->name); ?></p>
									</div>
									<?php
									endif;

									if (!empty($p_data->position)):
									?>
									<div class="card-text"><?php echo esc_html($p_data->position); ?></div>
									<?php
									endif;

									if (is_array($p_data->socials) && count($p_data->socials) > 0):
									?>
									<div class="teacher_social">
										<ul class="menu_social">
											<?php
												foreach($p_data->socials as $ps_data):
												?>
												<li class="menu_social_item"><a href="<?php echo esc_url($ps_data['professor_social_url']); ?>" target="_blank"><i class="<?php echo esc_attr($ps_data['professor_social_icon']['class']); ?>"></i></a></li>
												<?php
												endforeach;
											?>
										</ul>
									</div>
									<?php
									endif;
								?>
							</div>
						</div>
					</div>
					<?php
					endforeach;
				endif;
			?>
		</div>
	</div>
</div>
