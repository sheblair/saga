<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saga
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="page-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

</div><!-- #post-<?php the_ID(); ?> -->
