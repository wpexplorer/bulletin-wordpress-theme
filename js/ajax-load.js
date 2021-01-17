jQuery(function($){
	$(window).load(function() {

		// Overlay
		$('.post-entry-thumbnail a').hover(function(e) {
			$(this).children('.overlay').fadeIn('fast');
		}, function(){
			$(this).children('.overlay').fadeOut('fast');
		});

		// Masonry
		var $container = $('#post-entries');
		$container.imagesLoaded(function(){
			$container.masonry({
				itemSelector: '.post-entry',
				transitionDuration: '0.3s',
			});
		});
		
		/* ajax scroll */
		var ajaxurl = wpexvars.ajaxurl;
		
		$('div#load-more').click(function() {
			
			$(this).children('a').addClass('loading').html('');
			
			var $this = $(this),
				anchor = $this.children('a'),
				nonce = anchor.val(),
				pagenum = anchor.data('pagenum'),
				maxpage = anchor.data('maxpage'),
				data = {
					action: 'aq_ajax_scroll',
					pagenum: pagenum,
					archive_type: anchor.data('archive_type'),
					archive_id: anchor.data('archive_id'),
					archive_month: anchor.data('archive_month'),
					archive_year: anchor.data('archive_year'),
					post_format: anchor.data('post_format'),
					author: anchor.data('author'),
					s: anchor.data('s'),
					security: nonce
				};
				
			$.post(ajaxurl, data, function(response) {
				content = $(response);
					
					$('div#load-more a').removeClass('loading');
					content.css({ opacity: 0 });
					$('#post-entries').append(content).imagesLoaded(function(){
						$('#post-entries').masonry( 'appended', content, true );
						$('.post-entry-thumbnail a').hover(function(){
							$(this).children('.overlay').fadeIn('fast');
						}, function(){
							$(this).children('.overlay').fadeOut('fast');
						});

					});

				
				anchor.data('pagenum', pagenum + 1);
				
				if(pagenum >= maxpage) {
					$this.fadeOut();
				}
				
			});
			
			return false;
			
		});
		
		/*hover text*/
		if ($(window).width() > 767) {
			$('#load-more a').hover(function(){
					$('#load-more-txt').stop(true,true).fadeIn();
				}, function(){
					$('#load-more-txt').stop(true,true).fadeOut();
			});
		}
		
	}); /* END window ready */
}); /* END function */