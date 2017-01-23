(function($) {
$(document).ready(function(){

/**
 * Handle sorting navigation
 */
$('.media .sort-navigation p').click(function() {
	$('.media .sort-navigation p').removeClass('active');
	$(this).addClass('active');

	if ($(this).data('media-type') == 'all') {
		$('.media .grid-tile').show();
		return;
	}

	$('.media .grid-item').hide();

	var mediaType = $(this).data('media-type');

	$('.media .grid-item.' + mediaType).show();

	$gird.layout();
});

/**
 * Initialize grid
 */
var $grid = $('.media .grid').masonry({
  // options
  itemSelector: '.grid-item',
  columnWidth: 200
});

});
})(jQuery);