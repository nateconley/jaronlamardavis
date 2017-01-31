<?php
/**
 * The bio page
 */
get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="inner-text">
	<?php $post_id = get_the_id(); ?>
	<div class="show-title">
	<h1><?php echo get_post_meta( $post_id, 'jldavis-show-venue', true ); ?></h1><br />
	<h2><?php echo get_post_meta( $post_id, 'jldavis-show-city', true ); ?></h2><br />
	<h3><?php echo date( 'n.j.y', get_post_meta( $post_id, 'jldavis-show-date', true ) ); ?>
	<?php echo get_post_meta( $post_id, 'jldavis-show-time', true ); ?>
	</div></h3>
	<?php echo get_post_meta( $post_id, 'jldavis-show-details', true ); ?><br />
	<a href="<?php echo home_url(); ?>/dates"><< Back to Dates</a>
</div>

<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, this page could not be found.' ); ?></p>
<?php endif; ?>

<svg class="triangle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 2">
	<path
		stroke="none"
		fill="#4a7dec"
		d="M40,0L40,2L0,2Z"
	/>
</svg>

<?php
get_footer();