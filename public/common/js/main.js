$(window).resize(function() {

});

$(document).ready(initPage);
function initPage() {
	mobileMenu();
	scrollTo()

}


function mobileMenu(){
	$('a.mobile-opener').click(function (e) {
		e.preventDefault();
		$('body').toggleClass('nav-visible');
		$(this).toggleClass('visible');
	});
}


function scrollTo() {
	$('.anchor-links a').click( function(){
		var scroll_el = $(this).attr('href');
		if ($(scroll_el).length != 0) {
			$('html, body').animate({ scrollTop: $(scroll_el).offset().top - 10 }, 500);
		}
		return false;
	});
}