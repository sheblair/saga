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
    $args = array( 'category_name' => 'front-page-block' );
    $loop = new WP_Query($args);

    while ( $loop -> have_posts() ) { $loop->the_post(); ?>

        <div class="block front-page-block">
            <?php the_content(); ?>
        </div>

<?php }