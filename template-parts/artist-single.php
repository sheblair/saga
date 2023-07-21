<?php
/**
 * Template part for displaying a single Artist Page post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saga
 */

?>

<?php 
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
				$size = 'full';
	?>


	<div class="artist-container">

		<!-- Upper Section -->
		<div class="artist-single-upper">
			<div class="artist-featured-image">
				<?php the_post_thumbnail(); ?>
			</div>


			<h3 class="artist-single-title"><?php echo $name ?></h3>

			<?php if ($location) : ?>
				<p class="artist-single-location"><?php echo $location ?></p>
			<?php endif; ?>

			<?php if ($website) : ?>
				<a class="artist-single-link" target="_blank" href="<?php echo $website ?>"><p class="artist-single-link-label"><?php echo $website_label ?></p></a>
			<?php endif; ?>

			<?php if ($email) : ?>
				<a class="artist-single-link" target="_blank" href="mailto:<?php echo $email?>"><p class="artist-single-email">Contact</p></a>
			<?php endif; ?>

			<?php if ($link_1) : ?>
				<a class="artist-single-link" target="_blank" href="<?php echo $link_1 ?>"><p class="artist-single-link-label"><?php echo $link_1_label ?> </p></a>
			<?php endif; ?>

			<?php if ($link_2) : ?>
				<a class="artist-single-link" target="_blank" href="<?php echo $link_2 ?>"><p class="artist-single-link-label"><?php echo $link_2_label ?> </p></a>
			<?php endif; ?>

			<?php if ($link_3) : ?>
				<a class="artist-single-link" target="_blank" href="<?php echo $link_3 ?>"><p class="artist-single-link-label"><?php echo $link_3_label ?> </p></a>
			<?php endif; ?>

			<div class="view-selector">
					<p id="prints" class="view-option bold">Prints</p>
            		<p id="bio" class="view-option">Biography</p>
			</div>

		</div> <!-- end Upper Section -->

		<div class="accent-strip accent-strip-artist"></div>

		<!-- Lower Section - prints or biography -->
		<div class="artist-single-lower">
			<!-- Conditionally render either the images or the bio -->
			<div id="artist-bio">
				<?php if ($bio) : ?>
					<?php echo $bio ?>
				<?php endif; ?>

				<?php if ($artist_statement) : ?>
					<h4>Artist Statement</h4>
					<?php echo $artist_statement ?>
				<?php endif; ?>
			</div>
			
			<!-- Prints Gallery -->
			<div id="artist-prints"> 
				<?php if ($image_1) : ?>
					<div class="artist-print">
						<?php echo wp_get_attachment_image( $image_1, $size ); ?>
						<?php if ($image_1_caption) : ?>
							<p class="caption artist-image-caption"><?php echo $image_1_caption ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if ($image_2) : ?>
					<div class="artist-print">
						<?php echo wp_get_attachment_image( $image_2, $size );?>
						<?php if ($image_2_caption) : ?>
							<p class="caption artist-image-caption"><?php echo $image_2_caption ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if ($image_3) : ?>
					<div class="artist-print">
						<?php echo wp_get_attachment_image( $image_3, $size ); ?>
						<?php if ($image_3_caption) : ?>
							<p class="caption artist-image-caption"><?php echo $image_3_caption ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if ($image_4) : ?>
					<div class="artist-print">
						<?php echo wp_get_attachment_image( $image_4, $size ); ?>
						<?php if ($image_4_caption) : ?>
							<p class="caption artist-image-caption"><?php echo $image_4_caption ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>


				<?php if ($image_5) : ?>
					<div class="artist-print">
						<?php echo wp_get_attachment_image( $image_5, $size ); ?>
						<?php if ($image_5_caption) : ?>
							<p class="caption artist-image-caption"><?php echo $image_5_caption ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if ($image_6) : ?>
					<div class="artist-print">
						<?php echo wp_get_attachment_image( $image_6, $size ); ?>
						<?php if ($image_6_caption) : ?>
							<p class="caption artist-image-caption"><?php echo $image_6_caption ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if ($image_7) : ?>
					<div class="artist-print">
						<?php echo wp_get_attachment_image( $image_7, $size ); ?>
						<?php if ($image_7_caption) : ?>
							<p class="caption artist-image-caption"><?php echo $image_7_caption ?>
						<?php endif; ?>	
					</div>
				<?php endif; ?>

				<?php if ($image_8) : ?>
					<div class="artist-print">
						<?php echo wp_get_attachment_image( $image_8, $size ); ?>
						<?php if ($image_8_caption) : ?>
							<p class="caption artist-image-caption"><?php echo $image_8_caption ?>
						<?php endif; ?>
					</div>				
				<?php endif; ?>
			</div> <!-- end Prints Gallery -->

		</div> <!-- end Lower Section -->

	</div> <!-- end artist container -->