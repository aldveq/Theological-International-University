<?php
	// Utilities class instance
	$utilities = \TIU_THEME\Inc\Utilities::get_instance();

	// Block Variables
	$grid_data_title = $args['grid_data']['grid_data_title'];
	$grid_data_source = $args['grid_data']['grid_data_source'];
?>

<div class="services page_section">
	<div class="container">
		<?php
			if (!empty($grid_data_title)):
			?>			
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1><?php echo esc_html($grid_data_title); ?></h1>
					</div>
				</div>
			</div>
			<?php
			endif;
		?>

		<?php
			if(is_array($grid_data_source) && count($grid_data_source) > 0):
			?>
			<div class="row services_row">

				<?php
					foreach($grid_data_source as $grid_data_item):
					?>
					<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
						<div class="icon_container d-flex flex-column justify-content-end">
							<?php 
								$grid_data_item_icon_url = wp_get_attachment_image_url( $grid_data_item['icon'], 'full', false ); 

								if (!empty($grid_data_item_icon_url)):
								?>
								<span class="icon" style="mask:url(<?php echo $grid_data_item_icon_url; ?>) no-repeat center; -webkit-mask:url(<?php echo $grid_data_item_icon_url; ?>) no-repeat center;"></span>
								<?php
								endif;
							?>
						</div>
						<h3><?php echo esc_html($grid_data_item['title']); ?></h3>
						<p><?php echo esc_html($grid_data_item['description']); ?></p>
					</div>
					<?php
					endforeach;
				?>
			</div>
			<?php
			endif;
		?>
	</div>
</div>
