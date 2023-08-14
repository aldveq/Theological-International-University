<?php
	// Block Variables
	$milestone_bg_img = $args['milestone_data']['milestone_bg_img'];
	$milestone_data_source = $args['milestone_data']['milestone_data_source'];
	$milestone_block_attributes_classnames = !empty($args['attributes']) ? $args['attributes']['className'] : '';
?>

<div class="milestones" id="<?php echo esc_attr( $milestone_block_attributes_classnames ); ?>">
	<?php
		if (!empty($milestone_bg_img)):
			$milestone_bg_img_url = wp_get_attachment_image_url( $milestone_bg_img, 'milestone_bg_size', false );
			?>
			<div class="milestones_background" style="background-image:url(<?php echo esc_attr($milestone_bg_img_url); ?>)"></div>
			<?php
		endif;
	?>

	<?php
		if (is_array($milestone_data_source) && count($milestone_data_source) > 0):
		?>
		<div class="container">
			<div class="row">
				<?php
					foreach( $milestone_data_source as $milestone_data ):
					?>
					<!-- Milestone -->
					<div class="col-lg-3 milestone_col">
						<div class="milestone text-center">
							<?php
								if (!empty($milestone_data['milestone_icon'])):
								$milestone_img_url = wp_get_attachment_image_url( $milestone_data['milestone_icon'], 'milestone_icon_size', false );
								?>
								<div class="milestone_icon">
								<span class="icon" style="mask:url(<?php echo esc_url($milestone_img_url); ?>); -webkit-mask:url(<?php echo esc_url($milestone_img_url); ?>);"></span>
								</div>
								<?php
								endif;

								if (!empty($milestone_data['milestone_counter'])):
								?>
								<div class="milestone_counter" data-end-value="<?php echo esc_attr($milestone_data['milestone_counter']); ?>">0</div>
								<?php
								endif;

								if (!empty($milestone_data['milestone_text'])):
								?>
								<div class="milestone_text"><?php echo esc_html($milestone_data['milestone_text']); ?></div>
								<?php
								endif;
							?>
						</div>
					</div>
					<?php
					endforeach;					
				?>
			</div>
		</div>
		<?php
		endif;
	?>
</div>
