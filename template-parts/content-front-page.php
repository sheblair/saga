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

        <div class="block front-page-post">
            <?php the_content(); ?>
        </div>

<?php }