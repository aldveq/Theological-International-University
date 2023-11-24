<?php
/**
 * Block Reviews Template
 *
 * PHP version 8
 *
 * @category Themes
 * @package  Theological_International_University
 * @author   Aldo Paz Velasquez <aldveq80@gmail.com>
 * @license  GPL-2.0-or-later http://www.gnu.org/licenses/gpl-2.0.txt
 * @link     https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

// Utilities class instance.
$utilities = \TIU_THEME\Inc\Utilities::get_instance(); // phpcs:ignore

// Block Variables.
$split_view_left_content_title          = $args['split_view_data']['split_view_left_content_title'];
$split_view_left_content_description    = $args['split_view_data']['split_view_left_content_description'];
$split_view_left_content_link_label     = $args['split_view_data']['split_view_left_content_link_label'];
$split_view_left_content_link_url       = $args['split_view_data']['split_view_left_content_link_url'];
$split_view_left_content_link_target    = $args['split_view_data']['split_view_left_content_link_target'] ? '_blank' : '_self';
$split_view_right_content_image_bg      = $args['split_view_data']['split_view_right_content_image_bg'];
$split_view_image_bg_url                = ! empty( $split_view_right_content_image_bg ) ? wp_get_attachment_image_url( $split_view_right_content_image_bg, 'split_view_img_size', false ) : '';
$split_view_right_content_title         = $args['split_view_data']['split_view_right_content_title'];
$split_view_block_attributes_classnames = ! empty( $args['attributes'] ) ? $args['attributes']['className'] : '';
?>

<div class="register" id="<?php echo esc_attr( $split_view_block_attributes_classnames ); ?>">
	<div class="container-fluid">
		<div class="row row-eq-height">
			<div class="col-lg-6 nopadding">
				<!-- Register -->
				<div class="register_section d-flex flex-column align-items-center justify-content-center">
					<div class="register_content text-center">
						<?php
						if ( ! empty( $split_view_left_content_title ) ) :
							?>
							<h1 class="register_title"><?php echo wp_kses_post( $utilities->highlight_text_with_primary_color( $split_view_left_content_title ) ); ?></h1>
							<?php
							endif;

						if ( ! empty( $split_view_left_content_description ) ) :
							?>
							<p class="register_text"><?php echo esc_html( $split_view_left_content_description ); ?></p>
							<?php
							endif;

						if ( ! empty( $split_view_left_content_link_url ) ) :
							?>
							<div class="button button_1 register_button mx-auto trans_200"><a href="<?php echo esc_url( $split_view_left_content_link_url ); ?>" target="<?php echo esc_attr( $split_view_left_content_link_target ); ?>"><?php echo esc_html( $split_view_left_content_link_label ); ?></a></div>
							<?php
							endif;
						?>
					</div>
				</div>
			</div>

			<div class="col-lg-6 nopadding">
				<!-- Search -->
				<div class="search_section d-flex flex-column align-items-center justify-content-center">
					<div class="search_background" style="background-image:url(<?php echo esc_attr( $split_view_image_bg_url ); ?>);"></div>
					<?php
					if ( ! empty( $split_view_right_content_title ) ) :
						?>
						<div class="search_content text-center">
							<h1 class="search_title"><?php echo esc_html( $split_view_right_content_title ); ?></h1>
						</div> 
						<?php
						endif;
					?>
				</div>
			</div>
		</div>
	</div>
</div>
