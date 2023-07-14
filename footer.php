<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package saga
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="footer-upper">
			<div class="contact-info">
				<p>SAGA Gallery</p>
				<p>32 Union Sq E, Suite 1214</p>
				<p>New York, NY 10003</p>
				<p><a href="mailto:saga@sagaprints.com" class="footer-email-link">saga@sagaprints.com</a></p>
			</div>
			<div class="donate-button-wrapper">
				<a href="https://www.paypal.com" target="_blank"><button class="donate-button">Donate</button></a>
			</div>
		</div>
		<div class="footer-lower">
			<?php wp_nav_menu( array( 'footer_menu' => 'footer-menu' ) ); ?>
			<p class="copyright">© 2023 Society of American Graphic Artists</p>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
