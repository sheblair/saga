<?php
/**
 * The template for displaying the Collector Prints page
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

		<main id="collector-prints" class="site-main">
			<div class="page-content">
				<?php the_content(); ?>
			</div>
		</main>

	<?php endwhile; ?>

<?php
get_footer();
