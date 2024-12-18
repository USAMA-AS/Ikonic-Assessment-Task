<?php

/**
 * Task: Create a WordPress archive page that displays six Projects per page with pagination. Simple pagination is enough (with next, prev buttons)
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();


$args               = array(
	'post_type'      => 'projects',
	'posts_per_page' => 6,
	'paged'          => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
);
	$projects_query = new WP_Query( $args );

if ( $projects_query->have_posts() ) {
	while ( $projects_query->have_posts() ) {
		$projects_query->the_post();
		?>
			<div class="project">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				<p><?php the_content(); ?></p>
			</div>
		<?php
	}

	echo paginate_links(
		array(
			'total' => $projects_query->max_num_pages,
		)
	);
}

wp_reset_postdata();
get_footer();
?>
