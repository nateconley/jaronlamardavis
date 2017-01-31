<?php
/**
 * The blog home page
 */
get_header(); ?>

<div class="dates-section">
	<h3>dates</h3>
	<div class="side">

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
				<p>%2$s<span class="city"> %3$s </span>%4$s</p>
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
		} else {
			echo '<h2 class="not-found">No Dates Found</h2>'; 
		}

		wp_reset_postdata();

		?>

		<a href="<?php echo home_url(); ?>/dates" class="read-more">More Dates >></a>
	</div>
	<svg class="triangle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 8">
		<path
			stroke="none"
			fill="#4a7dec"
			d="M0,0L40,8L0,8Z"
		/>
	</svg>
</div>
<div class="photo-tiles">
	<?php
		$image_one_id = get_post_meta( get_the_ID(), 'jldavis_front_page_image_one_id', 1 );
		$image_two_id = get_post_meta( get_the_ID(), 'jldavis_front_page_image_two_id', 1 );
		$image_three_id = get_post_meta( get_the_ID(), 'jldavis_front_page_image_three_id', 1 );
	?>
	<div class="image-one">
		<?php echo wp_get_attachment_image( $image_one_id, 'full' ); ?>
	</div>
	<div class="image-two">
		<?php echo wp_get_attachment_image( $image_two_id, 'full' ); ?>
	</div>
	<div class="image-three">
		<?php echo wp_get_attachment_image( $image_three_id, 'full' ); ?>
	</div>
</div>
<div class="bio">
	<h3>bio</h3>
	<div class="side">
		<?php echo get_post_meta( get_the_ID(), 'jldavis_front_page_bio', 1 ) ?>
		<a href="<?php echo home_url(); ?>/bio" class="read-more">Read More >></a>
	</div>
	<svg class="triangle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 8">
		<path
			stroke="none"
			fill="#4a7dec"
			d="M40,0L40,8L0,8Z"
		/>
	</svg>
</div>
<div class="links">
	<a href="<?php echo home_url(); ?>/equipment" class="equipment">
		<svg class="triangle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10">
			<circle fill="none" stroke="#fff" stroke-width="1" cx="5" cy="5" r="4" />
			<path
				fill="none"
				stroke="#fff"
				stroke-linecap="butt"
				d="M4,3 L6,5 L4,7"
			/>
		</svg>
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/drums.png" alt="old typewriter">
		<h4>equipment</h4>
	</a>
	<a href="<?php echo home_url(); ?>/media" class="media">
		<svg class="triangle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10">
			<circle fill="none" stroke="#fff" stroke-width="1" cx="5" cy="5" r="4" />
			<path
				fill="none"
				stroke="#fff"
				stroke-linecap="butt"
				d="M4,3 L6,5 L4,7"
			/>
		</svg>
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/records.png" alt="vinyl records">
		<h4>media</h4>
	</a>
</div>
<?php
get_footer();