<?php
/**
 * Accessible search form.
 *
 * @package Single_Column
 */

?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'single-column' ); ?></span>
		<input class="search-field" type="search" placeholder="<?php echo esc_attr_x( 'Search articles…', 'placeholder', 'single-column' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	</label>
	<button type="submit"><?php esc_html_e( 'Search', 'single-column' ); ?></button>
</form>
