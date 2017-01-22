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

});
})(jQuery);