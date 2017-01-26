<?php
/**
 * The bio page
 */
get_header(); ?>

<div class="inner-text">

<?php

$midnight = strtotime( '00:00:00 yesterday' );

$args = array(
	'post_type' 	=> 'shows',
	'orderby' 		=> 'meta_value_num',
	'meta_key' 		=> 'jldavis-show-date',
	'order' 		=> 'ASC',
	'meta_query' 	=> array(
		array(
			'key' 		=> 'jldavis-show-date',
			'compare' 	=> '>=',
			'value' 	=> $midnight,
			'type' 		=> 'NUMERIC',
		),
	),
);

$query = new WP_Query( $args );

$format = '<div class="date">
	<a href="%1$s">
		<p class="venue">%2$s</p>
		<p class="city">%3$s</p>
		<p class="date">%4$s</p>
	</a>
</div>';

if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
		$post_id = get_the_id();

		$date = get_post_meta( $post_id, 'jldavis-show-date', true );
		$date = date("n.j.y", $date);
		$time = get_post_meta( $post_id, 'jldavis-show-time', true );
		$city = get_post_meta( $post_id, 'jldavis-show-city', true );
		$venue = get_post_meta( $post_id, 'jldavis-show-venue', true );

		printf( $format,
			get_post_permalink( $post_id ),
			$venue,
			$city,
			$date
		);
	}
}

?>
	
</div>

<svg class="triangle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 2">
	<path
		stroke="none"
		fill="#4a7dec"
		d="M0,0L40,2,L0,2Z"
	/>
</svg>

<?php
get_footer();