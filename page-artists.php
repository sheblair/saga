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
    <div class="page-heading-wrapper">
			<h1 class="page-heading"><?php the_title(); ?></h1>
			<div class="accent-strip"></div>
	</div>
	
	<main id="artists-page" class="site-main">
        <div class="artists-page-toolbar">
            <!-- Search form here -->
            <div class="search-bar">
                <label for="search"></label>
                <input type="text" id="search" name="search" placeholder="Search by name" />
            </div>

            <!-- Thumbnails or List selection here -->
            <div class="view-selector">
                <p id="thumbnail" class="view-option bold">Thumbnails</p>
                <p id="list" class="view-option">List</p>
            </div>
        </div>

        <!-- Use JS to conditionally display either one of these: -->
		<div id="artists-page-blocks">
			<?php get_template_part( 'template-parts/artist', 'blocks' ); ?>
		</div>

        <div id="artists-page-list">
            <ul class="artists-list">
                <?php get_template_part( 'template-parts/artist', 'list' ); ?>
            </ul>
        </div>
	</main>

<?php
get_footer();
