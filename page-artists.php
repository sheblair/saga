<?php
/**
 * The template for displaying the Artists page
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saga
 */

get_header();
?>
    <div class="accent-strip"></div>
	
	<main id="artists-page" class="site-main">
        <!-- Search form here -->
        <div class="search-bar">
            <?php get_search_form(); ?>
        </div>
        <!-- Thumbnails or List selection here -->
        <div class="view-selector">
            <p class="view-option">Thumbnails</p>
            <p class="view-option">List</p>
        </div>

        <!-- Use JS to conditionally display either one of these: -->
		<div id="artists-page-blocks" class="blocks-container">
			<?php get_template_part( 'template-parts/artist', 'blocks' ); ?>
		</div>

        <div id="artists-page-list">
            <?php get_template_part( 'template-parts/artist', 'list' ); ?>
        </div>
	</main>

<?php
get_footer();
