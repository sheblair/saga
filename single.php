<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package saga
 */

get_header();
?>

	<main id="post" class="site-main">

		<?php
		while ( have_posts() ) : the_post();

			
			// Get the categories assigned to the current post
			$categories = get_the_category();

			// Check if the post has categories
			if ( $categories ) {
				$has_template = false; // Flag to track if any category-specific template is found
				
				// Loop through each category and include the appropriate template
				foreach ( $categories as $category ) {
					$category_template_part = 'content-' . $category->slug;
					
					if ( locate_template( "template-parts/$category_template_part.php" ) !== '' ) {
						get_template_part( 'template-parts/content', $category->slug );
						$has_template = true; // Set the flag to true if a template is found
						break; // No need to continue checking other categories
					}
				}
				
				// If no category-specific template is found, use the default template
				if ( ! $has_template ) {
					get_template_part( 'template-parts/content', 'default' );
				}
			} else {
				// Default fallback template if the post has no categories
				get_template_part( 'template-parts/content', 'default' );
			}
		
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
