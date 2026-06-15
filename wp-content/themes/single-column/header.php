<?php
/**
 * The theme header.
 *
 * @package Single_Column
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'single-column' ); ?></a>
<header class="site-header">
	<div class="site-header__inner">
		<div class="site-branding">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php endif; ?>
			<div>
				<?php if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php endif; ?>
				<?php $description = get_bloginfo( 'description', 'display' ); ?>
				<?php if ( $description ) : ?>
					<p class="site-description"><?php echo esc_html( $description ); ?></p>
				<?php endif; ?>
			</div>
		</div>

		<button class="menu-toggle" type="button" aria-expanded="false" aria-controls="site-header-panel">
			<?php esc_html_e( 'Menu', 'single-column' ); ?>
		</button>

		<div class="site-header__panel" id="site-header-panel">
			<nav class="site-navigation" aria-label="<?php esc_attr_e( 'Primary navigation', 'single-column' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'menu',
						'fallback_cb'    => 'single_column_fallback_menu',
					)
				);
				?>
			</nav>
			<?php get_search_form(); ?>
		</div>
	</div>
</header>
