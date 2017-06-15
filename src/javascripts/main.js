$(window).resize(function() {



});

$(document).ready(initPage);
function initPage() {
	mobileMenu();



}


function mobileMenu(){
	$('a.mobile-opener').click(function (e) {
		e.preventDefault();
		$('body').toggleClass('nav-visible');
		$(this).toggleClass('visible');
	});
}