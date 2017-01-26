<?php
/**
 * The media page
 */
get_header(); ?>

<div class="sort-navigation">
	<p class="active" data-media-type="all">ALL</p>
	<p data-media-type="video">VIDEOS</p>
	<p data-media-type="picture">PICTURES</p>
	<p data-media-type="article">ARTICLES</p>
	<p data-media-type="music">MUSIC</p>
</div>

<div class="overlay">
	<h5 class="close">close</h5>
</div>

<div class="grid">
<div class="grid-measure"></div>
<?php
$entries = get_post_meta( get_the_ID(), 'media_repeat_group', true );

foreach ( (array) $entries as $key => $entry ) {
	$echo;

	$video_format = '<a href="#">
		<div class="%1$s grid-item">
			<div class="embed">
				%2$s
			</div>
			%3$s
			<p class="caption">%4$s</p>
		</div>
	</a>';
	$picture_format = '<a href="#">
		<div class="%1$s grid-item">
			%2$s
			<p class="caption">%3$s</p>
		</div>';
	$article_format = '<a href="%1$s" target="_blank">
		<div class="%2$s grid-item">
			%3$s
		<p class="caption">%4$s</p>
		</div>';
	$music_format = '<a href="%1$s" target="blank">
		<div class="%2$s grid-item">
			%3$s	
		<p class="caption">%4$s</p>
		</div>';

	if ( isset( $entry['media_type'] ) ) {
		$id = esc_html( $entry['media_type'] );

		switch( $id ) {
			case 'video' :
				$echo = sprintf( $video_format,
					$entry[ 'media_type' ],
					wp_oembed_get( $entry[ 'oembed' ] ),
					wp_get_attachment_image( $entry[ 'image_id' ], 'medium' ),
					$entry[ 'caption' ]
				);
				break;
			case 'picture' :
				$echo = sprintf( $picture_format,
					$entry[ 'media_type' ],
					wp_get_attachment_image( $entry[ 'image_id' ], 'full' ),
					$entry[ 'caption' ]
				);
				break;
			case 'article' :
				$echo = sprintf( $article_format,
					$entry[ 'url' ],
					$entry[ 'media_type' ],
					wp_get_attachment_image( $entry[ 'image_id' ], 'medium' ),
					$entry[ 'caption' ]
				);
				break;
			case 'music' :
				$echo = sprintf( $music_format,
					$entry[ 'url' ],
					$entry[ 'media_type' ],
					wp_get_attachment_image( $entry[ 'image_id' ], 'medium' ),
					$entry[ 'caption' ]
				);
				break;
		}
	} else {
		continue;
	}

	// Do something with the data
	echo $echo;
}
?>
</div>

<svg class="triangle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 1">
	<path
		stroke="none"
		fill="#4a7dec"
		d="M0,0L40,1L0,1Z"
	/>
</svg>

<?php
get_footer();