<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package saga
 */

get_header();
?>

	<main id="error-404" class="post">

		<div class="accent-strip post-accent-strip"></div>

		<div class="post-content">
			<h2><?php esc_html_e( 'Oops! Looks like there\'s nothing here.', 'saga' ); ?></h2>
		</div>

		<div class="accent-strip post-accent-strip"></div>

	</main><!-- #main -->

<?php
get_footer();
