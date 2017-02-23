<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Adler
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'adler' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'adler' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'adler' ), 'Adler', '<a href="https://automattic.com/" rel="designer">Automattic</a>' ); ?>
		</div><!-- .site-info -->

		<nav id="footer-navigation" class="footer-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="footer-menu" aria-expanded="false">
				<?php esc_html__( 'Footer Menu', 'adler' ); ?>
			</button>
			<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu' ) ); ?>
		</nav><!-- #footer-navigation -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
