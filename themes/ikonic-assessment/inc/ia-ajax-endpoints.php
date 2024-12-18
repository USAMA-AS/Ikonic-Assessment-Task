<?php

/**
 * Task: Create an Ajax endpoint that will output the last three published "Projects" that belong in the "Project Type" called "Architecture" If the user is not logged in. If the user is logged In it should return the last six published "Projects" in the project type call. "Architecture". Results should be returned in the following JSON format {success: true, data: [{object}, {object}, {object}, {object}, {object}]}. The object should contain three properties (id, title, link).
 *
 * http://xyz.com/wp-admin/admin-ajax.php?action=ia_architecture_projects
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


function ia_get_architecture_projects() {
	$projects = array();
	$args     = array(
		'post_type'      => 'projects',
		'posts_per_page' => is_user_logged_in() ? 6 : 3,
		'tax_query'      => array(
			array(
				'taxonomy' => 'project_type',
				'field'    => 'slug',
				'terms'    => 'architecture',
			),
		),
	);
	$query    = new WP_Query( $args );
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			$projects[] = array(
				'id'    => get_the_ID(),
				'title' => get_the_title(),
				'link'  => get_the_permalink(),
			);
		}
	}
	wp_reset_postdata();
	return $projects;
}

function ia_architecture_projects() {
	$projects = ia_get_architecture_projects();
	$response = array(
		'success' => true,
		'data'    => $projects,
	);
	wp_send_json( $response );
}

add_action( 'wp_ajax_ia_architecture_projects', 'ia_architecture_projects' );
add_action( 'wp_ajax_nopriv_ia_architecture_projects', 'ia_architecture_projects' );
