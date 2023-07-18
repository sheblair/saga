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
		<div id="front-page-posts" class="blocks-container">
			<?php get_template_part( 'template-parts/content', 'front-page' ); ?>
		</div>
	</main>

<?php
get_footer();
