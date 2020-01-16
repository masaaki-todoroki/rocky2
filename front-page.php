<?php
/**
 * Template Name: front-page

 */

?>

<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php the_title(); ?>
		<?php the_content(); ?>
	<?php endwhile; ?>
<?php else : ?>
	<p><?php echo esc_html_e( 'Sorry, no posts matched your criteria.', '_themename' ); ?></p>
<?php endif; ?>

<?php get_footer(); ?>
