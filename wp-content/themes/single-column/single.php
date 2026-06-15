<?php
/**
 * Single post template.
 *
 * @package Single_Column
 */

get_header();
?>
<main id="content" class="site-main">
	<section class="singular-content">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<article <?php post_class( 'entry-content' ); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<p class="entry-meta"><?php echo esc_html( get_the_date() ); ?></p>
					</header>
					<?php the_content(); ?>
				</article>
			<?php endwhile; ?>

			<?php the_post_navigation(); ?>
		<?php endif; ?>
	</section>
</main>
<?php
get_footer();
