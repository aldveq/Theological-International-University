<?php 
/**
 * The blog template file
 *
 * PHP version 8
 *
 * @category Themes
 * @package  Theological_International_University
 * @author   Aldo Paz Velasquez <aldveq80@gmail.com>
 * @license  GPL-2.0-or-later http://www.gnu.org/licenses/gpl-2.0.txt
 * @link     https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header(); 

// Variables.
$utilities         = \TIU_THEME\Inc\Utilities::get_instance(); // phpcs:ignore
$blog_bg_image     = carbon_get_theme_option( 'blog_bg_image' );
$blog_heading_text = pll_current_language( 'slug' ) === 'en' ? 
carbon_get_theme_option( 'blog_heading_text' ) : 
carbon_get_theme_option( 'blog_heading_text_es' );
?>

<div class="super_container">
	<!-- Home -->
	<div class="home blog-wrapper">
		<?php
		if ( ! empty( $blog_bg_image ) ) :
			$blog_bg_image_url = wp_get_attachment_image_url( $blog_bg_image, 'blog_bg_img_size', false );
			?>
			<div class="home_background_container prlx_parent">
				<div class="home_background prlx" style="background-image:url(<?php echo esc_url( $blog_bg_image_url ); ?>)"></div>
			</div>
			<?php
			endif;

		if ( ! empty( $blog_heading_text ) ) :
			?>
			<div class="home_content">
				<h1><?php echo esc_html( $blog_heading_text ); ?></h1>
			</div>
			<?php
			endif;
		?>
	</div>

	<!-- News -->

	<div class="news">
		<div class="container container-md">
			<div class="row">
				<div class="offset-lg-2"></div>

				<div class="col-lg-8">
					<?php
					if ( have_posts() ) :
						?>

							<div class="news_posts">
							<?php
							while ( have_posts() ) :
								the_post();
								?>
											<!-- News Post -->
											<div class="news_post">
												<div class="news_post_image">
										<?php 
											echo wp_get_attachment_image(
												get_post_thumbnail_id( get_the_ID() ), 
												'blog_card_img_size', 
												false, 
												array( 'loading' => 'lazy' )
											);
										?>
												</div>
												<div class="news_post_top d-flex flex-column flex-sm-row">
													<div class="news_post_date_container">
														<div class="news_post_date d-flex flex-column align-items-center justify-content-center">
														<div><?php echo esc_html( the_time( 'j' ) ); ?></div>
															<div><?php echo esc_html( $utilities->get_short_month_string( get_the_time( 'F' ) ) ); ?></div>
														</div>
													</div>
													<div class="news_post_title_container">
														<div class="news_post_title">
															<a href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ); ?>" target="_self"><?php echo esc_html( the_title() ); ?></a>
														</div>
														<div class="news_post_meta">
															<span class="news_post_author">By <?php echo esc_html( get_the_author_meta( 'first_name' ) . ' ' . get_the_author_meta( 'last_name' ) ); ?></span>
														</div>
													</div>
												</div>
												<div class="news_post_text">
													<p><?php echo esc_html( the_excerpt() ); ?></p>
												</div>
												<div class="news_post_button text-center trans_200">
													<a href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ); ?>" target="_self">Read More</a>
												</div>
											</div>
										<?php
									endwhile;
							?>
							</div>

							<!-- Page Nav -->
							<?php 
							the_posts_pagination(
								array(
									'class'     => 'news_page_nav',
									'prev_next' => false,
								)
							); 
							?>
						<?php
						endif;
					?>
				</div>

				<div class="offset-lg-2"></div>

			</div>
		</div>
	</div>

</div>

<?php
get_footer();
