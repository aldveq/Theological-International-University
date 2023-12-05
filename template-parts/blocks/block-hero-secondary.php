<?php
/**
 * Block Hero Secondary Template
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
$hero_secondary_image_bg                    = $args['hero_secondary_data']['image_bg'];
$hero_secondary_title                       = $args['hero_secondary_data']['title'];
$hero_secondary_block_attributes_classnames = ! empty( $args['attributes'] ) ? $args['attributes']['className'] : '';
?>

<!-- Home -->
<div class="home blog-wrapper" id="<?php echo esc_attr( $hero_secondary_block_attributes_classnames ); ?>">
<?php
if ( ! empty( $hero_secondary_image_bg ) ) :
	$hero_secondary_image_bg_url = wp_get_attachment_image_url( $hero_secondary_image_bg, 'blog_bg_img_size', false );
	?>
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url(<?php echo esc_url( $hero_secondary_image_bg_url ); ?>)"></div>
		</div>
		<?php
		endif;

if ( ! empty( $hero_secondary_title ) ) :
	?>
		<div class="home_content">
			<h1><?php echo esc_html( $hero_secondary_title ); ?></h1>
		</div>
		<?php
		endif;
?>
</div>
