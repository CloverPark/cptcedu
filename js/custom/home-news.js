$( document ).ready(function(){
		$(".home-events-row").click(function(){
			
			if($(".home-events-popup", this).hasClass("home-events-popup-open")) {
				$(".home-events-popup").hide();
				$(".home-events-popup").removeClass("home-events-popup-open");
				$(this).removeClass("home-events-row-active");
			}
			else {
				$(".home-events-popup", this).slideDown().addClass("home-events-popup-open");
				$(this).addClass("home-events-row-active");
			}	
	});
});