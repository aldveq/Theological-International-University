<?php
	// Utilities class instance
	$utilities = \TIU_THEME\Inc\Utilities::get_instance();

	// Block Variables
	$hero_slider_data = $args['hero_slider_data']['slides_data'];
	$hero_links_section_data = $args['hero_slider_data']['links_data']
?>

<div class="home">
	<!-- Hero Slider -->
	<div class="hero_slider_container">
		<?php
			if (is_array($hero_slider_data) && count($hero_slider_data) > 0):
			?>
			<div class="hero_slider owl-carousel">
				<?php
					foreach($hero_slider_data as $slide_data):
					$hero_slide_image_url = wp_get_attachment_image_url( $slide_data['image'], 'hero_slider_img_size', false );
					$hero_slide_title = $slide_data['title'];
					?>
					<!-- Hero Slide -->
					<div class="hero_slide">
						<div class="hero_slide_background" style="background-image:url(<?php echo esc_url($hero_slide_image_url); ?>)"></div>
						<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
							<div class="hero_slide_content text-center">
								<h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut"><?php echo $utilities->highlight_text_with_primary_color($hero_slide_title); ?></h1>
							</div>
						</div>
					</div>
					<?php
					endforeach;
				?>
			</div>
			<?php
			endif;
		?>

		<div class="hero_slider_left hero_slider_nav trans_200"><span class="trans_200">prev</span></div>
		<div class="hero_slider_right hero_slider_nav trans_200"><span class="trans_200">next</span></div>
	</div>
</div>

<?php
	if (is_array($hero_links_section_data) && count($hero_links_section_data) > 0):
	?>
	<div class="hero_boxes">
		<div class="hero_boxes_inner">
			<div class="container">
				<div class="row">
					<?php
						foreach($hero_links_section_data as $hero_link_data):
							$hero_link_target = $hero_link_data['link_target'] ? '_blank' : '_self';
						?>
						<div class="col-lg-4 hero_box_col">
							<div class="hero_box d-flex flex-row align-items-center justify-content-start">
								<?php
									echo wp_get_attachment_image( $hero_link_data['icon'], 'full', false, array('class' => 'svg', 'loading' => 'lazy') );
								?>
								<div class="hero_box_content">
									<h2 class="hero_box_title"><?php echo esc_html($hero_link_data['title']); ?></h2>
									<a href="<?php echo esc_url($hero_link_data['link_url']); ?>" target="<?php echo esc_attr($hero_link_target); ?>" class="hero_box_link"><?php echo esc_html($hero_link_data['link_label']); ?></a>
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
