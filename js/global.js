jQuery(function($){
	$(document).ready(function(){
		// Fancybox lightbox
		$(".fancybox").fancybox({
			openEffect	: 'none',
			closeEffect	: 'none'
		});
		// Top bar
		$("#callout-exit").click(function() {
			$("#callout-open").show();
			$("#callout").slideUp(200, 'swing');
			$.cookie('notificationCookie', 'hidden', {
					expires: 1,
					path: '/'
				});
			return false;
		});
		$("#callout-open").click(function() {
			$("#callout-open").hide();
			$("#callout").slideDown(200, 'swing');
			$.cookie('notificationCookie', 'visible', {
					expires: 1,
					path: '/'
				});
			return false;
		});
		var notificationVisibility = $.cookie('notificationCookie');
		if(notificationVisibility == 'hidden') {
			$("#callout").hide();
			$("#callout-open").show();
		};
		if(notificationVisibility == 'visible' || notificationVisibility == null) {
			$("#callout-open").hide();
			$("#callout").slideDown(200, 'swing');
		};
		// Responsive menu toggle
		$('#toggle-sidebar').click(function() {
			$('#dynamic-sidebar').slideToggle('normal');
			$(this).toggleClass('active');
			$('html,body').animate({ scrollTop: $(this).offset().top }, 'normal');
			return false;
		});
		$('#toggle-sidebar-bottom').click(function() {
			$('html,body').animate({
				scrollTop: $('#toggle-sidebar').offset().top }, 'normal',
				function(){
				$('#dynamic-sidebar').slideUp('normal', function(){
					$('#toggle-sidebar').removeClass('active');
				});
			});
			return false;
		});
	}); // End doc ready
});