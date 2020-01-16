<?php

function my_deregister_script() {
	if ( ! is_admin() ) {
		wp_deregister_script( 'jquery' );
		wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', array(), '3.4.1', true );
	}
}
add_action( 'wp_print_scripts', 'my_deregister_script', 100 );
