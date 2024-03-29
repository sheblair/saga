<?php
/**
 * The template for displaying the Archives page
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

		<main id="archives" class="site-main">

            <div id="archives-blocks" class="blocks-container">
                    <?php
                        $args = array(
                            'post_type'      => 'post',
                            'posts_per_page' => -1, // -1 to display all posts
                            'category_name' => 'archives'
                        );

                        $loop = new WP_Query( $args );

                        if ( $loop -> have_posts() ) {

                        while ( $loop -> have_posts() ) { $loop -> the_post();

                        $block_title_url = get_field('block_title_url');
                        $block_title = get_field('block_title');
                        $block_blurb = get_field('block_blurb');
                        $block_additional_link = get_field('block_additional_link');
                        $block_additional_link_label = get_field('block_additional_link_label');
                        $block_thumbnail = get_field('block_thumbnail');
					    $size = 'full';

                        ?>

                            <div class="block archive-block">
                                <a href="<?php echo $block_title_url ?>"><figure class="block-img-container"><?php echo wp_get_attachment_image( $block_thumbnail, $size ) ?></figure></a>
                                <p class="block-link block-title"><a href="<?php echo $block_title_url ?>"><?php echo $block_title ?></a></p>
                            </div>

                    <?php }
                            wp_reset_postdata();

                        } else {
                            // No posts found with the specified tag
                            echo 'No posts found.';
                    } ?>
            </div>
		</main>
    <?php endwhile; ?>

<?php
get_footer();
