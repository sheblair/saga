<?php
/**
 * The template for displaying all the Permanent Collection page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saga
 */

get_header();
?>
	<?php while ( have_posts() ) : the_post(); ?>

		<div class="page-heading-wrapper">
			<h1 class="page-heading"><?php the_title(); ?></h1>
			<div class="accent-strip"></div>
		</div>

		<main id="permanent-collection" class="site-main">
			<div class="back-link back-to-archives">
				<a href="http://localhost:8888/saga/archives">← Back to archives</a>
			</div>
			<?php get_template_part( 'template-parts/content', 'page' ); ?>
		</main>

	<?php endwhile; ?>

<?php
get_footer();
