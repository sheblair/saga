<?php
/**
 * Template part for displaying posts with the "upcoming-show" tag
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
        'tag'            => 'upcoming-show',
    );

    $loop = new WP_Query($args);

    if ($loop->have_posts()) { ?>

    <h2 class="shows-title">Upcoming</h2>

    <div id="upcoming-show-blocks" class="blocks-container">
    
        <?php while ($loop->have_posts()) { $loop->the_post();

            $block_title_url = get_field('block_title_url');
            $block_title = get_field('block_title');
            $block_blurb = get_field('block_blurb');
            $block_additional_link = get_field('block_additional_link');
            $block_additional_link_label = get_field('block_additional_link_label');
            
            ?>

            <div class="block upcoming-show-block">
                <figure class="block-img-container"><?php the_post_thumbnail(); ?></figure>
                <p class="block-link block-title"><a href="<?php echo $block_title_url ?>"><?php echo $block_title ?></a></p>
                <p class="block-blurb"><?php echo $block_blurb ?></p>
                <p class="block-link block-additional-link">
                    <a href="<?php echo $block_additional_link ?>"><?php echo $block_additional_link_label ?></a>
                </p>
            </div>

        <?php }
            wp_reset_postdata();
            
        } else {
            // If no posts are found, do nothing (leave this block empty).
        } ?>
    </div>
