$(document).ready(function(){
	$('.program-button').click(function(){
		if ($('.home-study').hasClass('home-study-open')) {
			$('.home-study').slideUp();
			$('.home-study').removeClass('home-study-open');
		}
		else {
			$('.home-study').slideDown();
			$('.home-study').addClass('home-study-open');
		}
	});
});