$( document ).ready(function() {
	$(".menu-icon").click(function() {
		if($("nav").hasClass("nav-open")) {
			$("nav").hide();
			$(".header-links").hide();
			$("nav").removeClass("nav-open");
		}
		else {
			$("nav").show();
			$("nav").addClass("nav-open");
			$(".header-links").show();
		}
  });
  
 
  
  
	// sub-nav stuff
    
	//open sub-nav
	$(".site-nav > ul > li").click(function() {
		if($(this).hasClass("active-sub-nav")){
			
		}
		else {
		$(this).addClass("active-sub-nav");	
  		$(this).children(".nav-dropdown").show()/*.animate({left: "0px"}, 500)*/;
		$(".header-links").animate({left: "-70%"}, 500);
		$(".site-nav").animate({left: "-70%"}, 500);
	}
  	}); 
	
	//close sub-nav
	$(".nav-back").click(function() {
		$(".header-links").animate({left: "0%"}, 500);
		$(".site-nav").animate({left: "30%"}, 500, function(){
			// on animation complete
			$(".site-nav > ul > li").removeClass("active-sub-nav");
			$(".nav-dropdown").hide();
		});
		
		
		
	});
	 
  
  
});