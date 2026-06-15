<?php
/**
 * Theme setup for Single Column.
 *
 * @package Single_Column
 */

if ( ! function_exists( 'single_column_setup' ) ) {
	/**
	 * Registers theme support and menus.
	 */
	function single_column_setup() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'appearance-tools' );
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'search-form',
				'script',
				'style',
			)
		);
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 96,
				'width'       => 96,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);
		add_theme_support(
			'custom-header',
			array(
				'width'              => 1600,
				'height'             => 900,
				'flex-height'        => true,
				'flex-width'         => true,
				'header-text'        => false,
				'default-text-color' => 'E8E9EB',
			)
		);

		register_nav_menus(
			array(
				'primary' => __( 'Primary Navigation', 'single-column' ),
				'footer'  => __( 'Footer Navigation', 'single-column' ),
			)
		);

		add_editor_style( 'style.css' );
	}
}
add_action( 'after_setup_theme', 'single_column_setup' );

/**
 * Enqueues front-end assets.
 */
function single_column_enqueue_assets() {
	$theme   = wp_get_theme();
	$version = $theme->get( 'Version' );

	wp_enqueue_style( 'single-column-style', get_stylesheet_uri(), array(), $version );
	wp_enqueue_script(
		'single-column-navigation',
		get_template_directory_uri() . '/assets/js/theme.js',
		array(),
		$version,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'single_column_enqueue_assets' );

/**
 * Registers widget areas.
 */
function single_column_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer Links', 'single-column' ),
			'id'            => 'footer-links',
			'description'   => __( 'Add widgets or links to the footer.', 'single-column' ),
			'before_widget' => '<section class="footer-links">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'single_column_widgets_init' );

/**
 * Renders a simple fallback menu.
 *
 * @param array $args Menu arguments.
 */
function single_column_fallback_menu( $args ) {
	$pages = wp_list_pages(
		array(
			'title_li' => '',
			'echo'     => false,
		)
	);

	$menu_class = isset( $args['menu_class'] ) ? $args['menu_class'] : 'menu';
	$home_class = is_front_page() ? ' class="current_page_item"' : '';
	$items      = '<li' . $home_class . '><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'single-column' ) . '</a></li>';
	$items     .= wp_kses_post( $pages );

	echo '<ul class="' . esc_attr( $menu_class ) . '">';
	echo $items; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo '</ul>';
}
