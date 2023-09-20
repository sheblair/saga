<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #page div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package saga
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="footer-upper">
			<?php
					$args = array( 'tag' => 'footer-upper' );
					$query = new WP_Query($args);

					if ($query -> have_posts()) {

						while ($query -> have_posts()) { $query->the_post();

							the_content();

						} wp_reset_postdata();
					} else {
						echo 'No posts found with the specified tag.';
					}
			?>
		</div>

		<div class="footer-lower">
			<?php wp_nav_menu( array( 'footer-menu' => 'footer-menu' ) ); ?>
			<div class="copyright-wrap">
				<p class="copyright">©2023 Society of American Graphic Artists</p>
				<p class="copyright-divider"> | </p>
				<p class="dev-credit">Developed by <a href="https://www.sheilablair.com/" target="_blank">Sheila Blair</a></p>
			</div>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>
</body>
</html>
