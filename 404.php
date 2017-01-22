<?php
/**
 * The bio page
 */
get_header(); ?>

<div class="inner-text">
	<h1>404</h1>
	<h5>page not found!</h5>
	<a href="<?php echo home_url(); ?>">return home</a>
</div>

<svg class="triangle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 3">
	<path
		stroke="none"
		fill="#4a7dec"
		d="M40,0L40,3L0,3Z"
	/>
</svg>

<?php
get_footer();