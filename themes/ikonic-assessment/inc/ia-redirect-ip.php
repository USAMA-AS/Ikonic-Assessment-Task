<?php
/**
 * Task: Write a function that will redirect the user away from the site if their IP address starts with 77.29. Use WordPress native hooks and APIs to handle this.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function ia_redirect_ip() {
	$ip = $_SERVER['REMOTE_ADDR'];
	$ip = explode( '.', $ip );
	if ( '77' === $ip[0] && '29' === $ip[1] ) {
		echo '<pre>';
		wp_die( 'You are not allowed to access this site.' );
		echo '</pre>';
		exit;
	}
}

add_action( 'template_redirect', 'ia_redirect_ip' );
