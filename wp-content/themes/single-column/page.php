<?php
/**
 * Page template.
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
					</header>
					<?php the_content(); ?>
				</article>
			<?php endwhile; ?>
		<?php endif; ?>
	</section>
</main>
<?php
get_footer();
