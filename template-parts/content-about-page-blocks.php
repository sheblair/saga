<?php
/**
 * Template part for displaying all About Page posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lucien
 */

?>

<?php
    $args = array( 'category_name' => 'about-page-block' );
    $loop = new WP_Query($args);

    while ( $loop -> have_posts() ) { $loop->the_post(); ?>

        <div class="block about-page-block">
            <?php the_content(); ?>
        </div>

<?php }