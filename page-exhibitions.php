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
            <div class="current-shows">
                <?php get_template_part( 'template-parts/content', 'current-shows' ); ?>
            </div>
            <div class="upcoming-shows">
                <?php get_template_part( 'template-parts/content', 'upcoming-shows' ); ?>
            </div>
            <div class="past-shows">
                <?php get_template_part( 'template-parts/content', 'past-shows' ); ?>
            </div>
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
