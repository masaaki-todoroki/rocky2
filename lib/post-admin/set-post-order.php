<?php

function set_post_types_order( $wp_query ) {
	if ( is_admin() ) {
		$post_type = $wp_query->query['post_type'];
		if ( 'news' === $post_type ) {
			$wp_query->set( 'orderby', 'date' );
			$wp_query->set( 'order', 'DESC' );
		}
	}
}
add_filter( 'pre_get_posts', 'set_post_types_order' );
