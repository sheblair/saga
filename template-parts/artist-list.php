<?php
/**
 * Template part for displaying all Artists as a list
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
                    $name = get_field('name');
                    $location = get_field('location');
                    $website = get_field('website');
                    $website_label = get_field('website_label');
                    $email = get_field('email');
                    $link_1 = get_field('link_1');
                    $link_2 = get_field('link_2');
                    $link_3 = get_field('link_3');
                    $link_1_label = get_field('link_1_label');
                    $link_2_label = get_field('link_2_label');
                    $link_3_label = get_field('link_3_label');
                    $bio = get_field('bio');
                    $artist_statement = get_field('artist_statement');
                    $image_1 = get_field('image_1');
                    $image_2 = get_field('image_2');
                    $image_3 = get_field('image_3');
                    $image_4 = get_field('image_4');
                    $image_5 = get_field('image_5');
                    $image_6 = get_field('image_6');
                    $image_7 = get_field('image_7');
                    $image_8 = get_field('image_8');
                    $image_1_caption = get_field('image_1_caption');
                    $image_2_caption = get_field('image_2_caption');
                    $image_3_caption = get_field('image_3_caption');
                    $image_4_caption = get_field('image_4_caption');
                    $image_5_caption = get_field('image_5_caption');
                    $image_6_caption = get_field('image_6_caption');
                    $image_7_caption = get_field('image_7_caption');
                    $image_8_caption = get_field('image_8_caption');
    ?>
        <li class="artist-list-item">
            <a href="<?php the_permalink(); ?>" ><p class="artist-name"><?php echo $name; ?></p></a>
        </li>
   

<?php }
        wp_reset_postdata();

    } else {
        // No posts found with the specified tag
        echo 'No posts found.';
    }
