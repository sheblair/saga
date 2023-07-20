<?php
/**
 * Template part for displaying all Artists as blocks
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saga
 */

?>

<?php
    $args = array( 
        'post_type'      => 'artist',
        'posts_per_page' => -1, // -1 to display all posts, you can set a specific number if you prefer
        'orderby' => 'title',
        'order'   => 'ASC',
    );
    
    $loop = new WP_Query($args);

    if ($loop->have_posts()) { while ($loop->have_posts()) { $loop->the_post(); 
                $artist_title = get_field('artist_title');
    ?>
    
        <div class="artist">
            <a href="<?php the_permalink(); ?>"><figure class="block-img-container"><?php the_post_thumbnail(); ?></figure></a>
            <a href="<?php the_permalink(); ?>"><h2 class="artist-name"><?php echo $artist_title; ?></h2></a>
        </div>

<?php }
        wp_reset_postdata();

    } else {
        // No posts found with the specified tag
        echo 'No posts found.';
    }
