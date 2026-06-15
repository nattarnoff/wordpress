<?php
/**
 * Front page template with hero and recent posts.
 *
 * @package Single_Column
 */

get_header();

$hero_title   = get_bloginfo( 'name' );
$hero_summary = get_bloginfo( 'description' );
$hero_image   = get_header_image();

if ( have_posts() ) {
	the_post();

	if ( get_the_title() ) {
		$hero_title = get_the_title();
	}

	if ( has_excerpt() ) {
		$hero_summary = get_the_excerpt();
	}

	if ( has_post_thumbnail() ) {
		$hero_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
	}

	rewind_posts();
}

$hero_style = $hero_image ? sprintf( ' style="%s"', esc_attr( "background-image: url('" . esc_url( $hero_image ) . "');" ) ) : '';

$recent_posts = new WP_Query(
	array(
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'posts_per_page'      => 3,
		'ignore_sticky_posts' => true,
	)
);
?>
<main id="content" class="site-main site-main--front">
	<section class="hero"<?php echo $hero_style; ?>>
		<div class="hero__inner">
			<div class="hero__content">
				<p class="hero__eyebrow"><?php esc_html_e( 'Accessible stories', 'single-column' ); ?></p>
				<h1 class="hero__title"><?php echo esc_html( $hero_title ); ?></h1>
				<?php if ( $hero_summary ) : ?>
					<p class="hero__summary"><?php echo esc_html( $hero_summary ); ?></p>
				<?php endif; ?>
			</div>

			<div class="hero__articles" aria-labelledby="latest-articles-title">
				<h2 class="section-heading" id="latest-articles-title"><?php esc_html_e( 'Latest articles', 'single-column' ); ?></h2>
				<div class="hero__articles-list">
					<?php if ( $recent_posts->have_posts() ) : ?>
						<?php while ( $recent_posts->have_posts() ) : ?>
							<?php $recent_posts->the_post(); ?>
							<article <?php post_class( 'hero-card' ); ?>>
								<h3 class="hero-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<p class="hero-card__meta"><?php echo esc_html( get_the_date() ); ?></p>
								<?php the_excerpt(); ?>
							</article>
						<?php endwhile; ?>
					<?php else : ?>
						<p><?php esc_html_e( 'Add posts to feature them here.', 'single-column' ); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

	<?php if ( have_posts() ) : ?>
		<?php the_post(); ?>
		<section class="content-section">
			<article <?php post_class( 'page-content' ); ?>>
				<?php the_content(); ?>
			</article>
		</section>
	<?php endif; ?>
</main>
<?php
wp_reset_postdata();
get_footer();
