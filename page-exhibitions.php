<?php
/**
 * The template for displaying the Exhibitions page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saga
 */

get_header();
?>
	<?php while ( have_posts() ) : the_post(); ?>

		<div class="page-heading-wrapper">
			<h1 class="page-heading"><?php the_title(); ?></h1>
			<div class="accent-strip"></div>
		</div>

		<main id="exhibitions" class="site-main">

        <?php 
                $current_args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => -1, // -1 to display all posts, you can set a specific number if you prefer
                    'tag'            => 'current-show',
                );

                $upcoming_args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => -1, // -1 to display all posts, you can set a specific number if you prefer
                    'tag'            => 'upcoming-show',
                );

                $past_args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => -1, // -1 to display all posts, you can set a specific number if you prefer
                    'tag'            => 'past-show',
                );

                $current_loop = new WP_Query( $current_args );
                $upcoming_loop = new WP_Query( $upcoming_args );
                $past_loop = new WP_Query( $past_args );

                // If the current-show tag has any posts, display them
                if ( $current_loop -> have_posts() ) { ?>

                    <div class="current-shows">
                        <h2 class="shows-title">Current</h2>
                            <div id="current-show-blocks" class="blocks-container">
        
                                <?php while ( $current_loop-> have_posts() ) { $current_loop -> the_post(); 
                
                                    $block_title_url = get_field('block_title_url');
                                    $block_title = get_field('block_title');
                                    $block_blurb = get_field('block_blurb');
                                    $block_additional_link = get_field('block_additional_link');
                                    $block_additional_link_label = get_field('block_additional_link_label');
                                    $exhibition_thumbnail = get_field('exhibition_thumbnail');
                                    $size = 'full';

                                    ?>

                                    <div class="block current-show-block">
                                        <figure class="block-img-container"><?php echo wp_get_attachment_image( $exhibition_thumbnail, $size ) ?></figure>
                                        <p class="block-link block-title"><a href="<?php echo $block_title_url ?>"><?php echo $block_title ?></a></p>
                                        <p class="block-blurb"><?php echo $block_blurb ?></p>
                                        <p class="block-link block-additional-link">
                                            <a href="<?php echo $block_additional_link ?>" target="_blank"><?php echo $block_additional_link_label ?></a>
                                        </p>
                                    </div>
                                <?php } ?>
                            </div>
                    </div>
                <?php } ?>
                
                <!-- If the upcoming-show tag has any posts, display them -->
                <?php if ( $upcoming_loop -> have_posts() ) { ?>
        
                    <div class="upcoming-shows">
                        <h2 class="shows-title">Upcoming</h2>
                            <div id="upcoming-show-blocks" class="blocks-container">
    
                            <?php while ( $upcoming_loop -> have_posts() ) { $upcoming_loop -> the_post();

                                $block_title_url = get_field('block_title_url');
                                $block_title = get_field('block_title');
                                $block_blurb = get_field('block_blurb');
                                $block_additional_link = get_field('block_additional_link');
                                $block_additional_link_label = get_field('block_additional_link_label');
                                $exhibition_thumbnail = get_field('exhibition_thumbnail');
                                $size = 'full';
                                
                                ?>

                                <div class="block upcoming-show-block">
                                    <figure class="block-img-container"><?php echo wp_get_attachment_image( $exhibition_thumbnail, $size ) ?></figure>
                                    <p class="block-link block-title"><a href="<?php echo $block_title_url ?>"><?php echo $block_title ?></a></p>
                                    <p class="block-blurb"><?php echo $block_blurb ?></p>
                                    <p class="block-link block-additional-link">
                                        <a href="<?php echo $block_additional_link ?>" target="_blank"><?php echo $block_additional_link_label ?></a>
                                    </p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>

                <!-- If the past_show tag has any posts, display them -->
                <?php if ( $past_loop -> have_posts() ) { ?>

                    <div class="past-shows">
                        <h2 class="shows-title">Past Exhibitions</h2>
                            <div id="past-show-blocks" class="blocks-container">

                            <?php while ( $past_loop -> have_posts() ) { $past_loop -> the_post(); 
                                
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
                                        <a href="<?php echo $block_additional_link ?>" target="_blank"><?php echo $block_additional_link_label ?></a>
                                    </p>
                                </div>
                            <?php } ?>         
                        </div>
                    
                    <!-- If there are no shows listed, display this message -->
                    <?php } else { ?>
                        <h2 class="oops-nothing-here">Oops! Looks like there's nothing here.</h2>
                    <?php } wp_reset_postdata(); ?>
                
            <?php
                    $args = array( 'tag' => 'partners', );
                    $loop = new WP_Query($args);

                    if ($loop->have_posts()) { while ($loop->have_posts()) { $loop->the_post(); ?>

                        <div class="partners">
                            <h2 class="shows-title"><?php the_title(); ?></h2>
                            <div class="partners-gallery">
                                <?php the_content(); ?>
                            </div>
                        </div>

                <?php }
                        wp_reset_postdata();

                    } else {
                        // If no posts are found, do nothing (leave this block empty).
                    } ?>
		</main>

	<?php endwhile; ?>

<?php
get_footer();
