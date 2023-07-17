<?php
/**
 * The template for displaying the home page
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saga
 */

get_header();
?>
    <div class="accent-strip"></div>
	
	<main id="primary" class="site-main">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="front-page-posts">
				<?php get_template_part( 'template-parts/content', 'front-page' ); ?>
			</div>
		<?php endwhile; ?>
	</main>

<?php
get_footer();
