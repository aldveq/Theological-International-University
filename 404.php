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
				<p class="fs-3 mb-1"><?php esc_html_e( 'Oops! Page not found.', 'theological-international-university' ); ?></p>
				<p class="lead mb-1"><?php esc_html_e( 'The page you’re looking for doesn’t exist.', 'theological-international-university' ); ?></p>
				<div class="become_button text-center trans_200 mt-2">
					<?php
						$home_path = '';

					if ( ! is_user_logged_in() 
						|| ( is_user_logged_in() 
						&& current_user_can( 'administrator' ) ) ) :
						$home_path = home_url();
						endif;

					if ( is_user_logged_in() 
						&& current_user_can( 'tiu_student' ) 
						&& pll_current_language( 'slug' ) === 'en' ) :
						$home_path = home_url( '/student-dashboard/' );
						endif;

					if ( is_user_logged_in() 
						&& current_user_can( 'tiu_student' ) 
						&& pll_current_language( 'slug' ) === 'es' ) :
						$home_path = home_url( '/panel-estudiantes/' );
						endif;
					?>
					<a href="<?php echo esc_url( $home_path ); ?>" target="_self"><?php esc_html_e( 'Go Home', 'theological-international-university' ); ?></a>
				</div>
			</div>
		</section>
	</main><!-- #main -->

<?php
get_footer();
