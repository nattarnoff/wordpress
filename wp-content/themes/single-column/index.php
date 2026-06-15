<?php
/**
 * Main index template.
 *
 * @package Single_Column
 */

get_header();
?>
<main id="content" class="site-main">
	<section class="post-index">
		<?php if ( is_home() && ! is_front_page() ) : ?>
			<h1 class="page-title"><?php single_post_title(); ?></h1>
		<?php elseif ( is_archive() ) : ?>
			<h1 class="page-title"><?php the_archive_title(); ?></h1>
		<?php elseif ( is_search() ) : ?>
			<h1 class="page-title">
				<?php
				printf(
					/* translators: %s: search query. */
					esc_html__( 'Search results for: %s', 'single-column' ),
					esc_html( get_search_query() )
				);
				?>
			</h1>
		<?php else : ?>
			<h1 class="page-title"><?php bloginfo( 'name' ); ?></h1>
		<?php endif; ?>

		<div class="post-list">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : ?>
					<?php the_post(); ?>
					<article <?php post_class( 'post-card' ); ?>>
						<h2 class="post-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p class="post-card__meta"><?php echo esc_html( get_the_date() ); ?></p>
						<?php the_excerpt(); ?>
					</article>
				<?php endwhile; ?>

				<?php the_posts_navigation(); ?>
			<?php else : ?>
				<article class="post-card">
					<h2 class="post-card__title"><?php esc_html_e( 'Nothing found', 'single-column' ); ?></h2>
					<p><?php esc_html_e( 'Try a different search or add your first post.', 'single-column' ); ?></p>
				</article>
			<?php endif; ?>
		</div>
	</section>
</main>
<?php
get_footer();
