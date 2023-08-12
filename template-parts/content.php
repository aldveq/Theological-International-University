<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Theological_International_University
 */
 
 // Variables
 $blog_bg_image = carbon_get_theme_option('blog_bg_image');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="super_container">
	
		<!-- Home -->

		<div class="home blog-wrapper">
			<?php
				if (!empty($blog_bg_image)):
					$blog_bg_image_url = wp_get_attachment_image_url( $blog_bg_image, 'blog_bg_img_size', false );
				?>
				<div class="home_background_container prlx_parent">
					<div class="home_background prlx" style="background-image:url(<?php echo esc_url($blog_bg_image_url); ?>)"></div>
				</div>
				<?php
				endif;
			?>
			<div class="home_content">
				<h1><?php echo esc_html(the_title()); ?></h1>
			</div>
		</div>

		<div class="news news-single-post-wrapper">
		<div class="container">
			<div class="row">
				<div class="offset-lg-2"></div>

				<!-- News Post Column -->
				<div class="col-lg-8">
					
					<div class="news_post_container">
						<!-- News Post -->
						<div class="news_post">
							<div class="news_post_image">
								<?php 
									echo wp_get_attachment_image(
										get_post_thumbnail_id(get_the_ID()), 
										'blog_card_img_size', 
										false, 
										array('loading' =>  'lazy')
									);
								?>
							</div>
							<div class="news_post_top d-flex flex-column flex-sm-row">
								<div class="news_post_date_container">
									<div class="news_post_date d-flex flex-column align-items-center justify-content-center">
										<div><?php echo the_time( 'j' ); ?></div>
										<div><?php echo the_time( 'F' ); ?></div>
									</div>
								</div>
								<div class="news_post_title_container">
									<div class="news_post_title">
										<h3><?php echo esc_html(the_title()); ?></h3>
									</div>
									<div class="news_post_meta">
										<span class="news_post_author">By <?php echo esc_html(get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name')); ?></span>
									</div>
								</div>
							</div>
							<div class="news_post_text">
								<?php 
									echo the_content();
								?>
							</div>
						</div>

					</div>
				</div>

				<div class="offset-lg-2"></div>
			</div>
		</div>
	</div>

	</div>
</article><!-- #post-<?php the_ID(); ?> -->
