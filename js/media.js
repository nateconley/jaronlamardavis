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

});
})(jQuery);