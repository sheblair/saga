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
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

    $args = array( 
        'post_type'      => 'artist',
        'posts_per_page' => -1, // -1 to display all posts, you can set a specific number if you prefer
        'orderby' => 'title',
        'order'   => 'ASC',
        'paged' => $paged, // Add the 'paged' parameter to handle pagination
    );
    
    $loop = new WP_Query($args);

    if ( $loop->have_posts() ) { while ( $loop->have_posts() ) { $loop->the_post(); 
                $name = get_field('name');
    ?>
    
        <div class="block artist-block artist">
            <a href="<?php the_permalink(); ?>"><figure class="block-img-container"><?php the_post_thumbnail(); ?></figure></a>
            <a href="<?php the_permalink(); ?>"><h2 class="artist-name"><?php echo $name; ?></h2></a>
        </div>

<?php }
        wp_reset_postdata();

        // Pagination
        // $total_pages = $loop->max_num_pages;
        // if ($total_pages > 1) {
        //     $current_page = max(1, $paged);
        //     echo '<div class="pagination">';
        //     echo paginate_links(array(
        //         'base' => get_pagenum_link(1) . '%_%',
        //         'format' => 'page/%#%',
        //         'current' => $current_page,
        //         'total' => $total_pages,
        //         'prev_text' => __('Previous', 'saga'),
        //         'next_text' => __('Next', 'saga'),
        //     ));
        //     echo '</div>'; }

    } else {
        // No posts found with the specified tag
        echo 'No posts found.';
    }