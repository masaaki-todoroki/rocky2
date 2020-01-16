<?php

function _themename_assets() {
	wp_enqueue_style( '_themename-stylesheet', get_template_directory_uri() . '/dist/assets/css/bundle.css', array(), '1.0.0', 'all' );
	wp_enqueue_script( '_themename-scripts', get_template_directory_uri() . '/dist/assets/js/bundle.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', '_themename_assets' );

function _themename_admin_assets() {
	wp_enqueue_style( '_themename-admin-stylesheet', get_template_directory_uri() . '/dist/assets/css/admin.css', array(), '1.0.0', 'all' );
	wp_enqueue_script( '_themename-admin-scripts', get_template_directory_uri() . '/dist/assets/js/admin.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'admin_enqueue_scripts', '_themename_admin_assets' );

// function _themename_block_editor_assets() {
// wp_enqueue_style( '_themename-block-style', get_template_directory_uri() . '/dist/assets/css/editor-style.css', array(), '1.0.0', 'all' );
// wp_enqueue_style( '_themename-block-style-plus', get_template_directory_uri() . '/dist/assets/css/editor-style-plus.css', array(), '1.0.0', 'all' );
// wp_enqueue_script( '_themename-block-custom', get_template_directory_uri() . '/dist/assets/js/block-editor.js', array( 'wp-blocks', 'wp-element', 'wp-editor' ), '1.0.0', true );
// wp_enqueue_script( '_themename-block-custom-select', get_template_directory_uri() . '/dist/assets/js/blocks.build.js', array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-rich-text', 'wp-element', 'wp-compose', 'wp-data' ), '1.0.0', true );
// }
// add_action( 'enqueue_block_editor_assets', '_themename_block_editor_assets' );
