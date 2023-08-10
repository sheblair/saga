<?php
/**
 * Template part for displaying posts with the "past-show" tag
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
        'tag'            => 'past-show',
    );

    $loop = new WP_Query($args);

    if ($loop->have_posts()) { ?>

    <h2 class="shows-title">Past Exhibitions</h2>
    
    <div id="past-show-blocks" class="blocks-container">
            <?php while ($loop->have_posts()) { $loop->the_post(); 
                
                $block_title_url = get_field('block_title_url');
                $block_title = get_field('block_title');
                $block_blurb = get_field('block_blurb');
                $block_additional_link = get_field('block_additional_link');
                $block_additional_link_label = get_field('block_additional_link_label');
                $exhibition_thumbnail = get_field('exhibition_thumbnail');
                $size = 'full';

                ?>

                <div class="block past-show-block">
                    <figure class="block-img-container"><?php echo wp_get_attachment_image( $exhibition_thumbnail, $size ) ?></figure>
                    <p class="block-link block-title"><a href="<?php echo $block_title_url ?>"><?php echo $block_title ?></a></p>
                    <p class="block-blurb"><?php echo $block_blurb ?></p>
                    <p class="block-link block-additional-link">
                        <a href="<?php echo $block_additional_link ?>"><?php echo $block_additional_link_label ?></a>
                    </p>
                </div>

    <?php } wp_reset_postdata();
            
        } else {
            // If no posts are found, do nothing (leave this block empty).
        } ?>

    </div>