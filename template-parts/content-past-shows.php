<?php
/**
 * Template part for displaying posts with the "past-show" tag
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package your-theme
 */

?>

<?php
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => -1, // -1 to display all posts, you can set a specific number if you prefer
        'tag'            => 'past-show',
    );

    $loop = new WP_Query($args);

    if ($loop->have_posts()) { ?>

    <h2 class="shows-title">Past Exhibitions</h2>
    
    <div id="past-show-blocks" class="blocks-container">
            <?php while ($loop->have_posts()) { $loop->the_post(); ?>

                <div class="block past-show-block">
                    <?php the_content(); ?>
                </div>

    <?php } wp_reset_postdata();
            
        } else {
            // If no posts are found, do nothing (leave this block empty).
        } ?>

    </div>