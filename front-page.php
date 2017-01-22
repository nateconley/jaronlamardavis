<?php
/**
 * The blog home page
 */
get_header(); ?>

<div class="dates">
	<h3>dates</h3>
	<div class="side">
		
	</div>
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 10">
		<path
			stroke="none"
			fill="#4a7dec"
			d="M0,0L40,10L0,10Z"
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
		<div class="inner-text">
			<?php echo get_post_meta( get_the_ID(), 'jldavis_front_page_bio', 1 ) ?>
		</div>
	</div>
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 10">
		<path
			stroke="none"
			fill="#4a7dec"
			d="M40,0L40,10L0,10Z"
		/>
	</svg>
</div>
<div class="links">
	<a href="" class="writings">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/typewriter.png" alt="old typewriter">
		<h4>writings</h4>
	</a>
	<a href="" class="media">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/records.png" alt="vinyl records">
		<h4>media</h4>
	</a>
</div>
<?php
get_footer();