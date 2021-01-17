jQuery(function($){
	$(window).load(function() {
		
		/* setup homepage slider */
		function attHomeFlex(){
			if(flexLocalize.slideshow == "true") flexLocalize.slideshow = true; else flexLocalize.slideshow = false;
			if(flexLocalize.randomize == "true") flexLocalize.randomize = true; else flexLocalize.randomize = false;
			if(flexLocalize.animation == "slide") flexSmoothHeight = true; else flexSmoothHeight = false;
			if (flexLocalize.slideshowSpeed !== '') flexLocalize.slideshowSpeed = flexLocalize.slideshowSpeed; else flexLocalize.slideshowSpeed = 7000;
			flexLocalize.animationSpeed = $('#home-slider').data('animation_speed'); // set via data attribute to prevent issue with FlexSlider
			
			$('#home-slider.flexslider').flexslider({
				slideshow : flexLocalize.slideshow,
				randomize : flexLocalize.randomize,
				animation : flexLocalize.animation,
				direction : flexLocalize.direction,
				slideshowSpeed : flexLocalize.slideshowSpeed,
				animationSpeed : flexLocalize.animationSpeed,
				smoothHeight : flexSmoothHeight,
				controlNav : false,
				prevText : '<span>Back</span>',
				nextText : '<span>Next</span>',
			});	
		}
		
		/* initialize functions */
		attHomeFlex();
		
	});
});