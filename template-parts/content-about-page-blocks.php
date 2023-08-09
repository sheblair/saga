<?php
/**
 * Template part for displaying all About Page posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saga
 */

?>

<?php
    $args = array( 
        'post_type'      => 'post',
        'posts_per_page' => -1, // -1 to display all posts, you can set a specific number if you prefer
        'category_name' => 'about-page-block' 
    );
    
    $loop = new WP_Query($args);

    if ($loop->have_posts()) { while ($loop->have_posts()) { $loop->the_post(); ?>

        <div class="block about-page-block">
            <?php the_post_thumbnail(); ?>
            <?php the_content(); ?>
        </div>

<?php }
        wp_reset_postdata();

    } else {
        // No posts found with the specified tag
        echo 'No posts found.';
    }
