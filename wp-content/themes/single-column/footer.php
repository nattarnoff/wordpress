<?php
/**
 * The theme footer.
 *
 * @package Single_Column
 */

?>
<footer class="site-footer">
	<div class="site-footer__inner">
		<nav aria-label="<?php esc_attr_e( 'Footer navigation', 'single-column' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => has_nav_menu( 'footer' ) ? 'footer' : 'primary',
					'container'      => false,
					'menu_class'     => 'menu',
					'fallback_cb'    => 'single_column_fallback_menu',
				)
			);
			?>
		</nav>

		<?php if ( is_active_sidebar( 'footer-links' ) ) : ?>
			<?php dynamic_sidebar( 'footer-links' ); ?>
		<?php endif; ?>

		<p class="site-footer__meta">
			<?php
			printf(
				/* translators: 1: current year, 2: site name. */
				esc_html__( '© %1$s %2$s', 'single-column' ),
				esc_html( gmdate( 'Y' ) ),
				esc_html( get_bloginfo( 'name' ) )
			);
			?>
		</p>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
