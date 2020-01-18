<?php

function get_news_archive_link( $event_type_slug = null, $news_type_slug = null ) {
  $args = array();
  if ( $event_type_slug ) {
    $args['event_taxonomy'] = $event_type_slug;
  }
  if ( $news_type_slug ) {
    $args['news_taxonomy'] = $news_type_slug;
  }
  return add_query_arg( $args, get_post_type_archive_link( 'news' ) );
}
