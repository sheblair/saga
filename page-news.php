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
	<?php

        $member_news_text_area = get_field('member_news_text_area');

        while ( have_posts() ) : the_post(); ?>

		<div class="page-heading-wrapper">
			<h1 class="page-heading"><?php the_title(); ?></h1>
			<div class="accent-strip"></div>
		</div>

		<main id="news" class="site-main">
            <div id="new-members-slideshow">
                <div class="slideshow-container">
                    <?php echo do_shortcode('[metaslider id="6048"]'); ?>
                </div>
                <h2 class="new-members-heading">Welcome to our new members!</h2>
            </div>

            <div class="accent-strip"></div>

            <div class="member-news-text-area">
                <?php echo $member_news_text_area ?>
            </div>

            <!-- View selector -->
            <div class="view-selector view-selector-single">
            	<p id="member-news" class="view-option bold">Member News</p>
                <p id="instagram" class="view-option">Latest Posts</p>
                <p id="in-memoriam" class="view-option">In Memoriam</p>
			</div>

            <div class="news-items">
                <?php the_content(); ?>
            </div>

		</main>

	<?php endwhile; ?>

<?php
get_footer();
