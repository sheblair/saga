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
	?>


	<div class="artist-container">

		<!-- Upper Section -->
		<div class="artist-single-upper">
			<div class="artist-featured-image">
				<?php the_post_thumbnail(); ?>
			</div>

			<div class="artist-info">
				<h3 class="artist-single-title"><?php echo $name ?></h3>

				<?php if ( $location ) : ?>
					<p class="artist-single-location"><?php echo $location ?></p>
				<?php endif; ?>

				<?php if ( $website ) : ?>
					<a class="artist-single-link" target="_blank" href="<?php echo $website ?>"><p class="artist-single-link-label"><?php echo $website_label ?></p></a>
				<?php endif; ?>

				<?php if ( $email ) : ?>
					<a class="artist-single-link" target="_blank" href="mailto:<?php echo $email?>"><p class="artist-single-email">Email</p></a>
				<?php endif; ?>

				<?php if ( $link_1 ) : ?>
					<a class="artist-single-link" target="_blank" href="<?php echo $link_1 ?>"><p class="artist-single-link-label"><?php echo $link_1_label ?> </p></a>
				<?php endif; ?>

				<?php if ( $link_2 ) : ?>
					<a class="artist-single-link" target="_blank" href="<?php echo $link_2 ?>"><p class="artist-single-link-label"><?php echo $link_2_label ?> </p></a>
				<?php endif; ?>

				<?php if ( $link_3 ) : ?>
					<a class="artist-single-link" target="_blank" href="<?php echo $link_3 ?>"><p class="artist-single-link-label"><?php echo $link_3_label ?> </p></a>
				<?php endif; ?>
			</div>
			

			<div class="view-selector view-selector-single">
				<?php if ( get_the_content() ) : ?>
					<p id="prints" class="view-option bold">Gallery</p>
				<?php endif; ?>
				<?php if ( $bio || $artist_statement ) : ?>
            		<p id="bio" class="view-option">Biography</p>
				<?php endif; ?>
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
					<h4 class="artist-statement-header align-self-center">Artist Statement</h4>
					<?php echo $artist_statement ?>
				<?php endif; ?>
			</div>
			
			<!-- Prints Gallery -->
			<div id="artist-prints"> 
				<?php the_content(); ?>
			</div> <!-- end Prints Gallery -->

		</div> <!-- end Lower Section -->

	</div> <!-- end artist container -->