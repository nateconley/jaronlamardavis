(function($) {

// Main Navigation
$('.hamburger').click(function(){
	$(this).toggleClass('open');
	$('#primary-menu').toggleClass('open');
});

// Parallax effects
$(window).scroll(function(){
	var scrollHeight = $(this).scrollTop();
	var blur = (scrollHeight * .03) + 'px';
	var padding = (scrollHeight * .6) + 'px';
	$('.site-header .foreground').css('filter', 'blur(' + blur + ')');
	$('.site-header h2').css('padding-top', padding);
});

})(jQuery);