<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theological_International_University
 */

// Variables
$utilities               = \TIU_THEME\Inc\Utilities::get_instance();
$footer_primary_navigation_items = $utilities->get_menu_items_by_location( 'footer-primary-navigation' );
$footer_secondary_navigation_items = $utilities->get_menu_items_by_location( 'footer-secondary-navigation' );
$is_footer_newsletter_section_disabled = carbon_get_theme_option('footer_disable_newsletter_section');
$no_newsletter_section = $is_footer_newsletter_section_disabled ? 'no-newsletter' : '';
$footer_disclaimer_text = carbon_get_theme_option('footer_disclaimer_text');
$footer_copyright_text = carbon_get_theme_option('footer_copyright_text');
$tiu_label_address = carbon_get_theme_option('tiu_label_address');
$tiu_address_link = carbon_get_theme_option('tiu_address_link');
$tiu_primary_email_label = carbon_get_theme_option('tiu_primary_email_label');
$tiu_primary_email = carbon_get_theme_option('tiu_primary_email');
$tiu_primary_phone_label = carbon_get_theme_option('tiu_primary_phone_label');
$tiu_primary_phone = carbon_get_theme_option('tiu_primary_phone');
$global_socials_data = carbon_get_theme_option('socials_data');
?>

	<footer class="footer <?php echo esc_attr( $no_newsletter_section ); ?>">
		<div class="container">
			<?php
				if (!$is_footer_newsletter_section_disabled):
				?>
				<!-- Newsletter -->
				<div class="newsletter">
					<div class="row">
						<div class="col">
							<div class="section_title text-center">
								<h1>Subscribe to newsletter</h1>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col text-center">
							<div class="newsletter_form_container mx-auto">
								<form action="post">
									<div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-center">
										<input id="newsletter_email" class="newsletter_email" type="email" placeholder="Email Address" required="required" data-error="Valid email is required.">
										<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">Subscribe</button>
									</div>
								</form>
							</div>
						</div>
					</div>

				</div>
				<?php
				endif;
			?>

			<!-- Footer Content -->
			<div class="footer_content <?php echo esc_attr( $no_newsletter_section ); ?>">
				<div class="row">

					<!-- Footer Column - About -->
					<div class="col-lg-3 footer_col">

						<!-- Logo -->
						<div class="logo_container">
							<?php 
								$tiu_logo_id = get_theme_mod( 'custom_logo' );
								
								if ( ! empty( $tiu_logo_id ) ) :
									$tiu_logo_url = wp_get_attachment_image_url( $tiu_logo_id, 'full' );     
									$tiu_logo_alt = get_post_meta( $tiu_logo_id, '_wp_attachment_image_alt', true );
									?>
									<div class="logo">
										<a href="<?php echo esc_url( home_url() ); ?>">
											<img src="<?php echo esc_url($tiu_logo_url); ?>" alt="<?php echo esc_attr($tiu_logo_alt); ?>">
										</a>
									</div>
									<?php
								endif;
							?>
						</div>

						<?php
							if (!empty($footer_disclaimer_text)):
							?>						
							<p class="footer_about_text"><?php echo esc_html($footer_disclaimer_text); ?></p>
							<?php
							endif;
						?>

					</div>

					<!-- Footer Column - Menu -->
					<?php
						if(is_array($footer_primary_navigation_items) && count($footer_primary_navigation_items)):
						?>
						<div class="col-lg-3 footer_col">
							<div class="footer_column_title">Menu</div>
							<div class="footer_column_content">
								<ul>
									<?php
										foreach($footer_primary_navigation_items as $fpnav_item):
										?>
										<li class="footer_list_item"><a href="<?php echo esc_url($fpnav_item->url); ?>"><?php echo esc_html($fpnav_item->title); ?></a></li>
										<?php
										endforeach;
									?>
								</ul>
							</div>
						</div>
						<?php
						endif;
					?>

					<!-- Footer Column - Usefull Links -->
					<?php
						if(is_array($footer_secondary_navigation_items) && count($footer_secondary_navigation_items)):
						?>
						<div class="col-lg-3 footer_col">
							<div class="footer_column_title">Usefull Links</div>
							<div class="footer_column_content">
								<ul>
									<?php
										foreach($footer_secondary_navigation_items as $fsnav_item):
										?>
										<li class="footer_list_item"><a href="<?php echo esc_url($fsnav_item->url); ?>"><?php echo esc_html($fsnav_item->title); ?></a></li>
										<?php
										endforeach;
									?>
								</ul>
							</div>
						</div>
						<?php
						endif;
					?>

					<!-- Footer Column - Contact -->

					<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Contact</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_contact_item">
									<?php
										if (!empty($tiu_label_address)):
										?>
										<div class="footer_contact_icon">
											<span class="icon" style="mask:url(<?php echo esc_url(get_template_directory_uri()); ?>/images/placeholder.svg) no-repeat center; -webkit-mask:url(<?php echo esc_url(get_template_directory_uri()); ?>/images/placeholder.svg) no-repeat center;"></span>
										</div>
										<?php 
											if (!empty($tiu_address_link)):
											?>
												<a href="<?php echo esc_url($tiu_address_link); ?>" target="_blank"><?php echo esc_html($tiu_label_address); ?></a>
											<?php
											else:
												echo esc_html($tiu_label_address);
											endif;
										?>
										<?php
										endif;
									?>
								</li>
								<li class="footer_contact_item">
									<?php
										if (!empty($tiu_primary_phone_label)):
										?>
										<div class="footer_contact_icon">
											<span class="icon" style="mask:url(<?php echo esc_url(get_template_directory_uri()); ?>/images/smartphone.svg) no-repeat center; -webkit-mask:url(<?php echo esc_url(get_template_directory_uri()); ?>/images/smartphone.svg) no-repeat center;"></span>
										</div>
										<a href="tel:<?php echo esc_attr($tiu_primary_phone); ?>"><?php echo esc_html($tiu_primary_phone_label); ?></a>
										<?php
										endif;
									?>
								</li>
								<li class="footer_contact_item">
									<?php
										if (!empty($tiu_primary_email_label)):
										?>
										<div class="footer_contact_icon">
											<span class="icon" style="mask:url(<?php echo esc_url(get_template_directory_uri()); ?>/images/envelope.svg) no-repeat center; -webkit-mask:url(<?php echo esc_url(get_template_directory_uri()); ?>/images/envelope.svg) no-repeat center;"></span>
										</div>
										<a href="mailto:<?php echo esc_attr($tiu_primary_email); ?>"><?php echo esc_html($tiu_primary_email_label); ?></a>
										<?php
										endif;
									?>
								</li>
							</ul>
						</div>
					</div>

				</div>
			</div>

			<!-- Footer Copyright -->
			<div class="footer_bar d-flex flex-column flex-sm-row align-items-center">
				<?php
					if (!empty($footer_copyright_text)):
					?>
					<div class="footer_copyright">
						<span><?php echo do_shortcode(esc_html($footer_copyright_text)); ?></span>
					</div>
					<?php
					endif;
				?>
				<div class="footer_social ml-sm-auto">
					<?php
						if(is_array($global_socials_data) && count($global_socials_data) > 0):
						?>
						<ul class="menu_social">
							<?php
								foreach($global_socials_data as $gs_data):
								?>
								<li class="menu_social_item"><a href="<?php echo esc_url($gs_data['social_url']); ?>" target="_blank"><i class="<?php echo esc_attr($gs_data['social_icon']['class']); ?>"></i></a></li>
								<?php
								endforeach;
							?>
						</ul>
						<?php
						endif;
					?>
				</div>
			</div>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
