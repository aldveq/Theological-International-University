<?php
/**
 * Block Content Text Image Template
 *
 * PHP version 8
 *
 * @category Themes
 * @package  Theological_International_University
 * @author   Aldo Paz Velasquez <aldveq80@gmail.com>
 * @license  GPL-2.0-or-later http://www.gnu.org/licenses/gpl-2.0.txt
 * @link     https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

// Block Variables.
$content_text_image_src                         = $args['content_text_image_data']['content_text_image_src'];
$content_text_image_title                       = $args['content_text_image_data']['content_text_image_title'];
$content_text_image_desc                        = $args['content_text_image_data']['content_text_image_desc'];
$content_text_image_link_label                  = $args['content_text_image_data']['content_text_image_link_label'];
$content_text_image_link_url                    = $args['content_text_image_data']['content_text_image_link_url'];
$content_text_image_link_target                 = $args['content_text_image_data']['content_text_image_link_target'];
$content_text_image_block_attributes_classnames = ! empty( $args['attributes'] ) ? $args['attributes']['className'] : '';
?>

<div class="become" id="<?php echo esc_attr( $content_text_image_block_attributes_classnames ); ?>">
	<div class="container">
		<div class="row row-eq-height">

			<div class="col-lg-6 order-2 order-lg-1">
				<?php 
				if ( ! empty( $content_text_image_title ) ) :
					?>
					<div class="become_title">
						<h1><?php echo esc_html( $content_text_image_title ); ?></h1>
					</div>
					<?php
					endif;

				if ( ! empty( $content_text_image_desc ) ) :
					?>
					<div class="become_text">
						<?php 
							echo wp_kses_post( wpautop( $content_text_image_desc, true ) ); 
						?>
					</div>
					<?php
					endif;

				if ( ! empty( $content_text_image_link_url ) ) :
					?>
					<div class="become_button text-center trans_200">
						<a href="<?php echo esc_url( $content_text_image_link_url ); ?>" target="<?php echo esc_attr( $content_text_image_link_target ? '_blank' : '_self' ); ?>"><?php echo esc_html( $content_text_image_link_label ); ?></a>
					</div>
					<?php
					endif;
				?>
			</div>

			<?php
			if ( ! empty( $content_text_image_src ) ) :
				?>
					<div class="col-lg-6 order-1 order-lg-2">
						<div class="become_image">
						<?php echo wp_get_attachment_image( $content_text_image_src, 'content_text_img_size', false, array( 'loading' => 'lazy' ) ); ?>
						</div>
					</div>
					<?php
				endif;
			?>
		</div>
	</div>
</div>
