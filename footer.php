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

$utilities               = \TIU_THEME\Inc\Utilities::get_instance();
$footer_primary_navigation_items = $utilities->get_menu_items_by_location( 'footer-primary-navigation' );
$footer_secondary_navigation_items = $utilities->get_menu_items_by_location( 'footer-secondary-navigation' );
?>

	<footer class="footer">
		<div class="container">
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

			<!-- Footer Content -->
			<div class="footer_content">
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

						<p class="footer_about_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum, tempor lacus.</p>

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
									<div class="footer_contact_icon">
										<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/placeholder.svg" alt="Location of the Theological International University">
									</div>
									Blvd Libertad, 34 m05200 Arévalo
								</li>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/smartphone.svg" alt="Phone number of the Theological International University">
									</div>
									<a href="tel:+0034 37483 2445 322">+0034 37483 2445 322</a>
								</li>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/envelope.svg" alt="Email of the Theological International University">
									</div>
									<a href="mailto:hello@company.com">hello@company.com</a>
								</li>
							</ul>
						</div>
					</div>

				</div>
			</div>

			<!-- Footer Copyright -->
			<div class="footer_bar d-flex flex-column flex-sm-row align-items-center">
				<div class="footer_copyright">
					<span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
				</div>
				<div class="footer_social ml-sm-auto">
					<ul class="menu_social">
						<li class="menu_social_item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
