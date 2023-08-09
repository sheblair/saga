<?php
/**
 * Template part for displaying all Front Page posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saga
 */

?>

<?php
    $args = array( 'category_name' => 'front-page-block' );
    $loop = new WP_Query($args);

    while ( $loop -> have_posts() ) { $loop->the_post(); 
    
    $block_title_url = get_field('block_title_url');
    $block_title = get_field('block_title');
    $block_blurb = get_field('block_blurb');
    $block_additional_link = get_field('block_additional_link');
    $block_additional_link_label = get_field('block_additional_link_label');
    ?>

        <div class="block front-page-block">
            <figure class="block-img-container"><?php the_post_thumbnail(); ?></figure>
            <p class="block-link block-title"><a href="<?php echo $block_title_url ?>"><?php echo $block_title ?></a></p>
            <p class="block-blurb"><?php echo $block_blurb ?></p>
            <p class="block-link block-additional-link">
                <a href="<?php echo $block_additional_link ?>"><?php echo $block_additional_link_label ?></a>
            </p>
        </div>

<?php }