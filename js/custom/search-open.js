$( document ).ready(function(){
	$(".search-icon").click(function(){
		if($(".search-form").hasClass("search-form-open")) {
			$(".search-form").removeClass("search-form-open");
		}
		else {
			$(".search-form").addClass("search-form-open");
		}
	});
});