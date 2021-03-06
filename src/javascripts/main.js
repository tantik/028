$(window).resize(function() {
	positionPopup();
});

$(document).ready(initPage);
function initPage() {
	mobileMenu();
	scrollTo()
	initPopup();
	OnScroll();
	ScrollToForm();
}

if(window.location.hash){
	window.hash = window.location.hash.substr(1);
	window.location.hash = '';
}
function OnScroll() {
	if (window.hash) {
		var minus = 0;
		var scrollPos = $('#'+window.hash).offset().top ;
		$("html, body").animate({ scrollTop: scrollPos - minus }, 1000);
	}
};


function ScrollToForm (){
	$('a.scroll-to-form').click(function (e) {
		$('body').removeClass('nav-visible');
		$('a.mobile-opener').removeClass('visible');
	});
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
	$('a.slide-link').click( function(){
		var scroll_el = $(this).attr('href');
		if ($(scroll_el).length != 0) {
			$('html, body').animate({ scrollTop: $(scroll_el).offset().top - 10 }, 500);
		}
		return false;
	});
}


/* Popup initiation */
function initPopup() {
	$('a[data-popup]').click(function(e) {
		$('.popup').removeClass('visible');
		e.preventDefault();
		var id = $(this).attr('data-popup');
		var maskHeight = $(document).height();
		$('.fader').css({'height':maskHeight});
		$('.fader').addClass('visible');
		$('#' + id).addClass('visible');
		positionPopup();
		if($('#' + id).height() >= $(window).height()){
			$('#' + id).css({
				top: $(window).scrollTop(),
			});
		} else {
			$('#' + id).css({
				top: $(window).scrollTop()+ $(window).height()/2,
				marginTop: -$('#' + id).height()/2
			});
		}

	});

	$('.popup-close').click(function (e) {
		e.preventDefault();
		$('.fader').removeClass('visible');
		$('.popup').removeClass('visible');
	});
	$('.fader').click(function () {
		$(this).removeClass('visible');
		$('.popup').removeClass('visible');
	});
}
/* Popup position */
function positionPopup(){
	if($('.popup.visible').width() < $(document).width()){
		$('.popup.visible').css({
			'marginLeft': -($('.popup.visible').width())/2,
			'left': '50%'
		});
	}
	else{
		$('.popup.visible').css({
			'marginLeft': 0,
			'left': 0
		});
	}
}