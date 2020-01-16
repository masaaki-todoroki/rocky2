<?php

require_once 'lib/change-jquery-version.php';
require_once 'lib/enqueue-assets.php';
require_once 'lib/theme-support.php';

foreach ( glob( get_template_directory() . '/lib/post-admin/*.php' ) as $post_admin_file ) {
	require_once $post_admin_file;
}

foreach ( glob( get_template_directory() . '/lib/post-front/*.php' ) as $post_front_file ) {
	require_once $post_front_file;
}
