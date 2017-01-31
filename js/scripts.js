(function() {

// Main navigation
document.querySelector('.hamburger').addEventListener('click', function() {
	this.classList.toggle('open');
	document.getElementById('primary-menu').classList.toggle('open');
});

// Parallax effects
window.addEventListener('scroll', function() {
	var scrollHeight = this.scrollY;
	var siteHeader = document.querySelector('.site-header h2');
	
	if (siteHeader) {
		siteHeader.style.transform = 'translate(0px,' + scrollHeight * 0.4 + '%)';
	}

	// Only do our blur manipulation half the time
	if (scrollHeight % 2 === 0 && scrollHeight > 3) {
		return;
	}

	var foreground = document.querySelector('.site-header .foreground');
	foreground.style.filter = 'blur(' + (scrollHeight * .03) + 'px)';
});

})();