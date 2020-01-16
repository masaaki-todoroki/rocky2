<?php

function archive_navi_template( $template ) {
	$template = '
	<div class="p-news-page %1$s" role="pagination">
	%3$s
	</div><!-- /p-news-page -->
	';
	return $template;
}
add_action( 'navigation_markup_template', 'archive_navi_template' );
