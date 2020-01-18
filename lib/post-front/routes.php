<?php

function get_news_archive_link( $event_type_slug = null, $news_type_slug = null ) {
	$event_type_slug  = esc_html( $event_type_slug );
	$news_type_slug  = esc_html( $news_type_slug );
	$additional_path = ! is_null( $event_type_slug ) ? ( ! is_null( $news_type_slug ) ? $event_type_slug . '/' . $news_type_slug . '/' : $event_type_slug . '/' ) : '';
	return get_post_type_archive_link( 'news' ) . $additional_path;
}
