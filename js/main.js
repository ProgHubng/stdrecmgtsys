$(function(){
		$('.carousel').carousel({
			// Act on the speed
        interval: 3000 
    	});
    	// Act on the tooltip
    	$("[data-toogle=\"tooltip\"]").tooltip();
	});
	// Act on the scroll top
	$(window).on("scroll", function(){
		$(".scroll-top").click(function(){
			$("body, html").animate({
				scrollTop : 0
			}, 1600);
			return false;
		});
});