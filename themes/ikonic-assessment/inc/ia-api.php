<?php

/**
 * Task : Use the WordPress HTTP API to create a function called hs_give_me_coffee() that will return a direct link to a cup of coffee. for us using the Random Coffee API [JSON].
 *
 * TAsk: Use this API https://api.kanye.rest/ and show 5 quotes on a page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



function hs_give_me_coffee() {
	$response = wp_remote_get( 'https://coffee.alexflipnote.dev/random.json' );
	if ( is_wp_error( $response ) ) {
		return false;
	}

	$body = json_decode( wp_remote_retrieve_body( $response ) );
	return $body->file ? $body->file : 'no coffee for you';
}

// echo '<pre>'; print_r(hs_give_me_coffee()); exit();

function get_kanye_quotes() {
	$quotes = array();
	for ( $i = 1; $i <= 5; $i++ ) {
		$response = wp_remote_get( 'https://api.kanye.rest/' );
		if ( ! is_wp_error( $response ) ) {
			$body     = json_decode( wp_remote_retrieve_body( $response ) );
			$quotes[] = $body->quote ? $body->quote : '';
		}
	}
	return $quotes;
}

// echo '<pre>'; print_r(get_kanye_quotes()); exit();

function display_kanye_quotes() {
	$quotes = get_kanye_quotes();
	$output = '<div><h5>Quotes</h5><ol>';
	foreach ( $quotes as $quote ) {
		$output .= "<li>{$quote}</li>";
	}
	$output .= '</ol></div>';
	return $output;
}
add_shortcode( 'kanye_quotes', 'display_kanye_quotes' );
