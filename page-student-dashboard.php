<?php
/**
 * The template for the student dashboard
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Theological_International_University
 */

get_header();
?>
<h1>Student Dashboard</h1>
<a href="<?php echo wp_logout_url(home_url()); ?>">Logout</a>
<?php
get_footer();
