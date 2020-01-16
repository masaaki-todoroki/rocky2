<?php
function custom_taxonomy_filter() {
	global $post_type;
	?>
	<?php if ( 'news' === $post_type ) : ?>
		<select name="event_taxonomy">
			<option value="">イベントの種類 - すべて</option>
			<?php $event_terms = get_terms( 'event_taxonomy' ); ?>
			<?php foreach ( $event_terms as $event_term ) : ?>
			<option value="<?php echo esc_attr( $event_term->slug ); ?>"
				<?php if ( isset( $_GET['event_taxonomy'] ) ) : ?>
					<?php if ( $_GET['event_taxonomy'] === $event_term->slug ) : ?>
						<?php print ' selected'; ?>
					<?php endif; ?>
				<?php endif; ?>
			>
				<?php echo esc_html( $event_term->name ); ?>
			</option>
			<?php endforeach; ?>
		</select>
		<select name="news_taxonomy">
			<option value="">ニュースの種類 - すべて</option>
			<?php $news_terms = get_terms( 'news_taxonomy' ); ?>
			<?php foreach ( $news_terms as $news_term ) : ?>
			<option value="<?php echo esc_attr( $news_term->slug ); ?>"
				<?php if ( isset( $_GET['news_taxonomy'] ) ) : ?>
					<?php if ( $_GET['news_taxonomy'] === $news_term->slug ) : ?>
						<?php print ' selected'; ?>
					<?php endif; ?>
				<?php endif; ?>
			>
				<?php echo esc_html( $news_term->name ); ?>
			</option>
			<?php endforeach; ?>
		</select>
	<?php endif; ?>
	<?php
}
add_action( 'restrict_manage_posts', 'custom_taxonomy_filter' );
