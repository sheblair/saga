<?php
/**
 * Template part for displaying Archives posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saga
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="accent-strip post-accent-strip"></div>

    <div class="back-link back-to-archives">
		<a href="http://localhost:8888/saga/archives">← Back to archives</a>
	</div>

	<header class="post-header">
		<?php the_title();?>
	</header>

	<div class="post-content post-content-news">
		<?php the_content(); ?>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
