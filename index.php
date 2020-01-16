<?php
/**
 * Template Name: index
 */
?>

<?php get_header(); ?>

<main class="l-main">
	<div class="l-main__content">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>
