jQuery(function($){
	$(document).ready(function(){
		$(".fitvids").fitVids();
		function wpexToggleSidebar(){
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
		} wpexToggleSidebar();
	});
});