<?php
/**
 * Task: Register post type called "Projects" and a taxonomy "Project Type" for this post type.
 * Registering Custom Post type name as projects on init hook and ia_projects_cpt function.
 * Registering Custom Taxonomy name as project_type for projects post type on init hook and ia_projects_cpt function.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function ia_projects_cpt() {
	$ia_cpt_args = array(
		'label'              => 'Projects',
		'public'             => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'capability_type'    => 'post',
		'rewrite'            => array( 'slug' => 'projects' ),
		'has_archive'        => true,
		'query_var'          => true,
		'publicly_queryable' => true,
		'show_in_rest'       => true,

		'supports'           => array(
			'title',
			'editor',
			'thumbnail',
			'excerpt',
			'comments',
			'revisions',
		),
	);

	register_post_type( 'projects', $ia_cpt_args );

	$ia_taxonomy_args = array(
		'label'        => __( 'Project Type', 'ikonic-assessment' ),
		'rewrite'      => array( 'slug' => 'project-type' ),
		'hierarchical' => true,
	);

	register_taxonomy( 'project_type', 'projects', $ia_taxonomy_args );
}

add_action( 'init', 'ia_projects_cpt' );
