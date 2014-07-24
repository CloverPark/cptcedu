$( document ).ready(function(){
	$(".search-icon").click(function(){
		if($(".search-form").hasClass("search-form-open")) {
			$(".search-form").animate({
				width: "0"
			});
			$(".search-form").removeClass("search-form-open");
		}
		else {
			// Set the search bar width to match the headerlinks above it. Have to do through JS because the headerlinks width is based on font-size
			var searchWidth = $(".header-links").width();
			
			$(".search-form").addClass("search-form-open");
			$(".search-form").animate({
			width: searchWidth	
			});
		}
	});
});