var ajax_loader = '<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>';

function scrollTo(elementSelector) {
	$('html, body').animate({
		scrollTop: $(elementSelector).offset().top
	}, 1000);
}