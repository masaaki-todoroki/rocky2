<?php

function extraction_post_type_of_news( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}
	if ( $query->is_post_type_archive( 'news' ) ) {
		$query->set( 'posts_per_page', '3' );
		return;
	}
}
add_action( 'pre_get_posts', 'extraction_post_type_of_news' );

function mod_tax_query( $query ) {
  if ( $query->is_post_type_archive( 'news' ) ) {
    $tax_query = $query->tax_query;
    foreach ($tax_query->queries as $key => $query) {
      if (in_array('all', $query['terms'])) {
        unset($tax_query->queries[$key]);
      }
    }
  }
}
add_action( 'parse_tax_query', 'mod_tax_query' );
