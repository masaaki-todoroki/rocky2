<?php

function add_custom_column_to_news( $columns ) {
	$date_escape = $columns['date'];
	unset( $columns['date'] );
	$columns['thumbnail']     = 'Eye-catching image';
	$columns['event_taxonomy'] = 'イベントの種類';
	$columns['news_taxonomy'] = 'ニュースの種類';
	$columns['date']          = $date_escape;
	return $columns;
}
add_filter( 'manage_news_posts_columns', 'add_custom_column_to_news' );

function add_custom_column_id_to_news( $column_name, $id ) {
	if ( 'thumbnail' === $column_name ) {
		$thumb_id = get_post_thumbnail_id( $id );
		if ( $thumb_id ) {
			$thumb_img = wp_get_attachment_image_src( $thumb_id, 'medium' );
			echo '<img src="', esc_attr( $thumb_img[0] ), '" width="160px">';
		} else {
			echo 'Featured image is not set';
		}
	}
	if ( 'event_taxonomy' === $column_name ) {
		echo get_the_term_list( $id, 'event_taxonomy', '', ', ' );
	}
	if ( 'news_taxonomy' === $column_name ) {
		echo get_the_term_list( $id, 'news_taxonomy', '', ', ' );
	}
}
add_action( 'manage_news_posts_custom_column', 'add_custom_column_id_to_news', 10, 2 );
