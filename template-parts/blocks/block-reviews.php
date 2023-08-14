<?php
	// Block Variables
	$reviews_image_bg = $args['reviews_data']['reviews_image_bg'];
	$reviews_title = $args['reviews_data']['reviews_title'];
	$reviews_data_source = $args['reviews_data']['reviews_data_source'];
	$reviews_block_attributes_classnames = !empty($args['attributes']) ? $args['attributes']['className'] : '';
?>

<div class="testimonials page_section" id="<?php echo esc_attr($reviews_block_attributes_classnames); ?>">
	<?php
		if (!empty($reviews_image_bg)):
			$reviews_image_bg_url = wp_get_attachment_image_url( $reviews_image_bg, 'review_bg_img_size', false );
		?>
		<div class="testimonials_background_container">
			<div class="testimonials_background" style="background-image:url(<?php echo esc_attr($reviews_image_bg_url); ?>)"></div>
		</div>
		<?php
		endif;
	?>
	<div class="container">

		<?php
			if (!empty($reviews_title)):
			?>
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1><?php echo esc_html($reviews_title); ?></h1>
					</div>
				</div>
			</div>
			<?php
			endif;
		?>

		<?php
			if (is_array($reviews_data_source) && count($reviews_data_source) > 0):
			?>
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="testimonials_slider_container">
						<!-- Testimonials Slider -->
						<div class="owl-carousel owl-theme testimonials_slider">
							<?php
								foreach($reviews_data_source as $review_item):
								?>
								<!-- Testimonials Item -->
								<div class="owl-item testimonial-item">
									<div class="testimonials_item text-center">
										<div class="quote">“</div>
										<p class="testimonials_text"><?php echo esc_html($review_item['review_text']); ?></p>
										<div class="testimonial_user">
											<div class="testimonial_image mx-auto">
												<?php echo wp_get_attachment_image( $review_item['review_user_img'], 'review_user_img_size', false, array('loading' => 'lazy') ); ?>
											</div>
											<div class="testimonial_name"><?php echo esc_html($review_item['review_user_name']); ?></div>
											<div class="testimonial_title"><?php echo esc_html($review_item['review_user_role']); ?></div>
										</div>
									</div>
								</div>
								<?php
								endforeach;
							?>
						</div>
					</div>
				</div>
			</div>
			<?php
			endif;
		?>
	</div>
</div>
