<?php
/**
 * The template for displaying the home page
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saga
 */

get_header();
?>
    <div class="accent-strip"></div>
	
	<main id="front-page" class="site-main">
		<div id="front-page-blocks" class="blocks-container">
			<?php
				$args = array( 'category_name' => 'front-page-block' );
				$loop = new WP_Query( $args );

				if ( $loop -> have_posts() ) { 

				while ( $loop -> have_posts() ) { $loop -> the_post(); 
				
				$block_title_url = get_field('block_title_url');
				$block_title = get_field('block_title');
				$block_blurb = get_field('block_blurb');
				$block_additional_link = get_field('block_additional_link');
				$block_additional_link_label = get_field('block_additional_link_label');
				$block_thumbnail = get_field('block_thumbnail');
				$size = 'full';

				?>

					<div class="block front-page-block">
						<a href="<?php echo $block_title_url ?>"><figure class="block-img-container"><?php echo wp_get_attachment_image( $block_thumbnail, $size ) ?></figure></a>
						<p class="block-link block-title"><a href="<?php echo $block_title_url ?>"><?php echo $block_title ?></a></p>
						<?php if ( $block_blurb ) : ?>
							<p class="block-blurb"><?php echo $block_blurb ?></p>
						<?php endif; ?> 
						<?php if ( $block_additional_link ) : ?>
							<p class="block-link block-additional-link">
								<a href="<?php echo $block_additional_link ?>" target="_blank"><?php echo $block_additional_link_label ?></a>
							</p>
						<?php endif; ?>
					</div>

			<?php }
				wp_reset_postdata();

				} else {
					// No posts found with the specified tag
					echo 'No posts found.';
			} ?>
		</div>
	</main>

<?php
get_footer();
