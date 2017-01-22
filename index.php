<?php
/**
 * The blog home page
 */
get_header(); ?>

<?php
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endwhile;
			the_posts_navigation();
		else :
			echo '<p>Sorry, there are no posts</p>';
		endif; ?>

<?php
get_footer();