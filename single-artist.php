<?php
/**
 * The template for displaying a single Artist page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package saga
 */

get_header();
?>

	<main id="artist-single" class="site-main">
		<div class="back-link back-to-artists">
			<a href="http://localhost:8888/saga/artists">← Back to artists</a>
		</div>

		<?php while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/artist', 'single' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
