(function($) {
$(document).ready(function(){

// Main Navigation
$('.hamburger').click(function(){
	$(this).toggleClass('open');
	$('#primary-menu').toggleClass('open');
});

// Parallax effects
$(window).scroll(function(){
	var scrollHeight = $(this).scrollTop();
	// var blur = (scrollHeight * .03) + 'px';
	// $('.site-header .foreground').css('filter', 'blur(' + blur + ')');

	$('.site-header .foreground').css({
		'filter' : 'blur(' + scrollHeight * 0.03 + 'px)',
	});

	$('.site-header h2').css({
		'transform' : 'translate(0px,' + scrollHeight * 0.4 + '%)',
	});
});

/**
 * Home page photo tiles aspect ratio
 */
$('.home .photo-tiles img').each(function(){
	var aspectRatio = $(this).attr('width') / $(this).attr('height');

	// Add inline style so jQuery doesn't mess up flex
	$(this).parent().attr(
		'style',
		'-webkit-box-flex: ' + aspectRatio +
		';-webkit-flex: ' + aspectRatio +
		';-ms-flex: ' + aspectRatio +
		';flex: ' + aspectRatio
	);
})

});
})(jQuery);