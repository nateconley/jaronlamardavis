(function($) {
$(document).ready(function(){

/**
 * Handle sorting navigation
 */
$('.media .sort-navigation p').click(function() {
	$('.media .sort-navigation p').removeClass('active');
	$(this).addClass('active');

	var mediaType = $(this).data('media-type');

	// remove nothing found
	$('.media .not-found').remove();

	if(mediaType == 'all') {
		$grid.isotope({ filter: '*' });
		return;
	}

	// Handle no grid items
	if($('.media .grid-item.' + mediaType).length == 0) {
		$grid.isotope({ filter: '.' + mediaType });
		$content = $('<h3 class="grid-item not-found">Nothing found</h3>');
		$grid.prepend($content);
		return;
	}

	$grid.isotope({ filter: '.' + mediaType });
});

/**
 * Initialize grid
 */
var $grid = $('.grid').isotope({
	// options
	itemSelector: '.grid-item',
	layoutMode: 'masonry',
	masonry: {
		columnWidth: '.grid-measure',
	},
});

//layout isotope after each image loads
$grid.imagesLoaded().progress( function() {
  $grid.isotope('layout');
});

/**
 * Clicking on video
 */

$('.grid-item.video').click(function() {
	var embed = $(this).children('.embed').clone();
	var iframe = $(embed).children('iframe');
	// Add autoplay to src
	$(iframe).attr('src', $(iframe).attr('src').replace('feature=oembed', 'autoplay=1'));

	$('.overlay').append($(embed));
	$('.overlay').show();
});

/**
 * Clicking on picture
 */
$('.grid-item.picture').click(function() {
	var image = $(this).children('img');
	$('.overlay').append($(image).clone());
	$('.overlay').show();
	
	// Sizing of image
	var imgHeight = $('.overlay img').height();
	var imgWidth = $('.overlay img').width();

	if ($(window).height() <= imgHeight) {
		$('.overlay img').height('100vh');
		return;
	}

	if($(window).width <= imdWidth()) {
		$('.overlay img').width('100vw');
		return;
	}
});

/**
 * Close overlay
 */
$('.overlay').click(function() {
	$(this).hide();
	$('.overlay img').remove();
	$('.overlay .embed').remove();
})

});
})(jQuery);