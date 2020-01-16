<?php

function aoitheme_theme_support() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'comment-list', 'comment-form', 'gallery', 'caption' ) );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'align-wide' );
	add_image_size( '_themename-blog-image', 1200, 0 );
}
add_action( 'after_setup_theme', 'aoitheme_theme_support' );
