<?php
/**
 * The template for displaying the About page
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

		<main id="primary" class="site-main">
            <div class="about-page-purpose">
                <?php the_content(); ?>
            </div>
            <div id="about-page-blocks" class="blocks-container">
                <?php get_template_part( 'template-parts/content', 'about-page-blocks' ); ?>
            </div>
		</main>

	<?php endwhile; ?>

<?php
get_footer();
