<?php
/**
 * Block Contact Form Template
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
$contact_form_title                       = $args['contact_form_data']['contact_form_title'];
$contact_form_courses_title               = $args['contact_form_data']['contact_form_courses_title'];
$contact_form_courses_desc                = $args['contact_form_data']['contact_form_courses_desc'];
$contact_form_block_attributes_classnames = ! empty( $args['attributes'] ) ? $args['attributes']['className'] : '';

// Global Variables.
$tiu_label_address       = carbon_get_theme_option( 'tiu_label_address' );
$tiu_address_link        = carbon_get_theme_option( 'tiu_address_link' );
$tiu_primary_email_label = carbon_get_theme_option( 'tiu_primary_email_label' );
$tiu_primary_email       = carbon_get_theme_option( 'tiu_primary_email' );
$tiu_primary_phone_label = carbon_get_theme_option( 'tiu_primary_phone_label' );
$tiu_primary_phone       = carbon_get_theme_option( 'tiu_primary_phone' );
?>

<div class="contact" id="<?php echo esc_attr( $contact_form_block_attributes_classnames ); ?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<!-- Contact Form -->
				<div class="contact_form">
					<?php
					if ( ! empty( $contact_form_title ) ) :
						?>
						<div class="contact_title"><?php echo esc_html( $contact_form_title ); ?></div>
						<?php
						endif;

						echo do_shortcode( '[contact-form-7 id="90" title="Contact Form"]' );
					?>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="about">
					<?php
					if ( ! empty( $contact_form_courses_title ) ) :
						?>
						<div class="about_title"><?php echo esc_html( $contact_form_courses_title ); ?></div>
						<?php
						endif;

					if ( ! empty( $contact_form_courses_desc ) ) :
						?>
						<p class="about_text"><?php echo esc_html( $contact_form_courses_desc ); ?></p>
						<?php
						endif;
					?>


					<div class="contact_info">
						<ul>
							<?php
							if ( ! empty( $tiu_label_address ) ) :
								?>
								<li class="contact_info_item">
									<div class="contact_info_icon">
										<span class="icon" style="mask:url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/placeholder.svg) no-repeat center; -webkit-mask:url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/placeholder.svg) no-repeat center;"></span>
									</div>
								<?php
								if ( ! empty( $tiu_address_link ) ) :
									?>
										<a href="<?php echo esc_url( $tiu_address_link ); ?>" target="_blank"><?php echo esc_html( $tiu_label_address ); ?></a>
									<?php
										else :
											echo esc_html( $tiu_label_address );
										endif;
										?>
								</li>
								<?php
								endif;

							if ( ! empty( $tiu_primary_phone_label ) 
								&& ! empty( $tiu_primary_phone ) ) :
								?>
								<li class="contact_info_item">
									<div class="contact_info_icon">
										<span class="icon" style="mask:url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/smartphone.svg) no-repeat center; -webkit-mask:url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/smartphone.svg) no-repeat center;"></span>
									</div>
									<a href="tel:<?php echo esc_attr( $tiu_primary_phone ); ?>"><?php echo esc_html( $tiu_primary_phone_label ); ?></a>
								</li>
								<?php
								endif;

							if ( ! empty( $tiu_primary_email_label ) 
								&& ! empty( $tiu_primary_email ) ) :
								?>
								<li class="contact_info_item">
									<div class="contact_info_icon">
										<span class="icon" style="mask:url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/envelope.svg) no-repeat center; -webkit-mask:url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/envelope.svg) no-repeat center;"></span>
									</div>
									<a href="mailto:<?php echo esc_attr( $tiu_primary_email ); ?>"><?php echo esc_html( $tiu_primary_email_label ); ?></a>
								</li>
								<?php
								endif;
							?>
						</ul>
					</div>

				</div>
			</div>

		</div>
	</div>
</div>
