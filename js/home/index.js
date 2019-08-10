$(document).ready(function(e){
	init_element();
});

function init_element() {
	bind_guitar_tab_link();
}

function bind_guitar_tab_link() {
	$('.guitar_tab_link').on('click', function(e){
		$('.list-group-item').removeClass('active');
		$(this).addClass('active');
		
		scrollTo('#guitar_tab_title');
		var guitar_tab_id = $(this).attr('item_id');
		$('#guitar_tab_title').html(ajax_loader);
		$('#guitar_tab_content, #guitar_tab_video_embed_html').css('opacity', '0');
		
		$.ajax({
			url: '/home/get_guitar_tab_detail/',
			method: 'POST',
			data: {
				id: guitar_tab_id
			},
			success: function(response) {
				if (response.status == "success") {
					$('#guitar_tab_title').html(response.data.title);
					var rendered_content = "<pre>" . response.data.content.replace(/\n/g, "</pre><pre>") . "</pre>";
					$('#guitar_tab_content').html(rendered_content);
					$('#guitar_tab_video_embed_html').html(response.data.video_embed_html);
					$('#guitar_tab_content, #guitar_tab_video_embed_html').animate({
						opacity: 1
					}, 1000);
				} else {
					$("#guitar_tab_title").html("Sorry, failed to load content, please try again");
				}
			}
		});
	});
}