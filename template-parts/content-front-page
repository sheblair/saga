<?php
/**
 * Template part for displaying all Front Page posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lucien
 */

?>

<?php
    $args = array( 'category_name' => 'front-page-post' );
    $loop = new WP_Query($args);

    while ( $loop -> have_posts() ) { $loop->the_post(); ?>

        <div class="front-page-post">
            <figure class="block-img"><?php the_post_thumbnail(); ?></figure>
            <h2 class="block-title"><?php the_title(); ?></h2>
            <p class="block-paragraph"><?php the_content(); ?></p>
        </div>

<?php } ?>