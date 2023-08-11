<?php
/**
 * The template for displaying the News page
 *
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

		<main id="news" class="site-main">
            <div class="new-members-slideshow">
                <div class="slideshow-container">
                    <?php echo do_shortcode('[metaslider id="4359"]'); ?>
                </div>
                <h2 class="new-members-heading">Welcome to our new members!</h2>
            </div>
            <div class="accent-strip"></div>
            <div class="news-items">
                <h2 class="news-items-heading">Recent News</h2>
                <?php the_content(); ?>
            </div>
		</main>

	<?php endwhile; ?>

<?php
get_footer();
