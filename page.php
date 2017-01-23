<?php
/**
 * The bio page
 */
get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="inner-text">
	<?php the_content(); ?>
</div>

<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, this page could not be found.' ); ?></p>
<?php endif; ?>

<svg class="triangle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 3">
	<path
		stroke="none"
		fill="#4a7dec"
		d="M40,0L40,3L0,3Z"
	/>
</svg>

<?php
get_footer();