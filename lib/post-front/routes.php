<?php

function custom_rewrite_rule() {
	add_rewrite_rule( 'news/([^/0-9]+)/([^/0-9]+)/?$', 'index.php?post_type=news&event_taxonomy=$matches[1]&news_taxonomy=$matches[2]', 'top' );
	add_rewrite_rule( 'news/([^/0-9]+)/([^/0-9]+)/page/([0-9]{1,})/?$', 'index.php?post_type=news&event_taxonomy=$matches[1]&news_taxonomy=$matches[2]&paged=$matches[3]', 'top' );
}
add_action( 'init', 'custom_rewrite_rule', 10, 0 );

function get_news_archive_link( $event_type_slug = null, $news_type_slug = null ) {
	$event_type_slug  = esc_html( $event_type_slug );
	$news_type_slug  = esc_html( $news_type_slug );
	$additional_path = ! is_null( $event_type_slug ) ? ( ! is_null( $news_type_slug ) ? $event_type_slug . '/' . $news_type_slug . '/' : $event_type_slug . '/' ) : '';
	return get_post_type_archive_link( 'news' ) . $additional_path;
}
