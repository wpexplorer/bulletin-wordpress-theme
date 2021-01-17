jQuery(function($){
	$(window).load(function() {
		function equalHeight(group) {
			var tallest = 0;
			group.each(function() {
				var thisHeight = $(this).height();
				if(thisHeight > tallest) {
					tallest = thisHeight;
				}
			});
			group.height(tallest);
		}
		
		equalHeight($(".post-entry-details"));
		
		$('div#load-more').click(function() {
			equalHeight($(".post-entry-details"));
		});
	});
});