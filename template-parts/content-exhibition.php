<?php
/**
 * Template part for displaying Exhibition posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saga
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="accent-strip post-accent-strip"></div>

    <div class="back-link back-to-exhibitions">
		<a href="http://localhost:8888/saga/exhibitions">← Back to exhibitions</a>
	</div>

	<header class="post-header">
		<?php the_title();?>
	</header>

	<div class="post-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
