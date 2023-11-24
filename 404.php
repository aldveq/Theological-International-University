<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Theological_International_University
 */

get_header();
?>

	<main id="primary" class="site-main not-page-found-wrapper">
		<section class="d-flex align-items-center justify-content-center">
			<div class="text-center d-flex flex-column align-items-center justify-content-center">
				<h1 class="fw-bold">404</h1>
				<p class="fs-3 mb-1"> Opps! Page not found.</p>
				<p class="lead mb-1">
					The page you’re looking for doesn’t exist.
				</p>
				<div class="become_button text-center trans_200 mt-2">
					<?php
						$home_path = '';

					if ( ! is_user_logged_in() 
						|| ( is_user_logged_in() 
						&& current_user_can( 'administrator' ) ) ) :
						$home_path = home_url();
						endif;

					if ( is_user_logged_in() && current_user_can( 'tiu_student' ) ) :
						$home_path = home_url( '/student-dashboard/' );
						endif;
					?>
					<a href="<?php echo esc_url( $home_path ); ?>" target="_self">Go Home</a>
				</div>
			</div>
		</section>
	</main><!-- #main -->

<?php
get_footer();
