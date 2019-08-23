$(document).ready(function(e){
	init_element();
});

function init_element() {
	bind_guitar_tab_link();
	bind_btn_autoscroll();
	
	$('#autoscroll_help').tooltip();
	$('#guitar_tab_content').fitText(7.5, { maxFontSize: '16' });
}

function bind_guitar_tab_link() {
	$('#guitar_tab_content, #guitar_tab_video_embed_html, #guitar_tab_control').css('opacity', '0');
		
	$('.guitar_tab_link').on('click', function(e){
		stop_scroll_duration_decrement();
		
		$('.list-group-item').removeClass('active');
		$(this).addClass('active');
		
		scrollTo('#guitar_tab_title');
		
		var guitar_tab_id = $(this).attr('item_id');
		$('#guitar_tab_title').html(ajax_loader);
		$('#guitar_tab_content, #guitar_tab_video_embed_html, #guitar_tab_control').css('opacity', '0');
		
		$.ajax({
			url: 'home/get_guitar_tab_detail/',
			method: 'POST',
			data: {
				id: guitar_tab_id
			},
			success: function(response) {
				if (response.status == "success") {
					$('#guitar_tab_title').html(response.data.title);
					// var rendered_content = '<pre class="mb-0">' + response.data.content.replace(/\n/g, '</pre><pre class="mb-0">') + '&nbsp;</pre>';
					var rendered_content = response.data.content;
					$('#guitar_tab_content').html(rendered_content);
					$('#scroll_duration').val(response.data.duration);
					$('#guitar_tab_video_embed_html').html(response.data.video_embed_html);
					$('#guitar_tab_content, #guitar_tab_video_embed_html, #guitar_tab_control').animate({
						opacity: 1
					}, 1000);
				} else {
					$("#guitar_tab_title").html("Sorry, failed to load content, please try again");
				}
			}
		});
	});
}

var scroll_duration_timer;

function bind_btn_autoscroll() {
	$("#btn_autoscroll_play").on("click", function(e){
		start_scroll_duration_decrement();
		
		var duration = $("#scroll_duration").val();
		$("html, body").animate({
			scrollTop: $(document).height() - document.body.clientHeight + (document.body.clientHeight / 2), // total document height, browser window's height, window's half height to maintain view point on center of browser
		}, {
			duration: duration * 1000,
			easing: "linear"
		});
	});
	
	$("#btn_autoscroll_stop").on("click", function(e){
		stop_scroll_duration_decrement();
	});
}

function start_scroll_duration_decrement() {
	var duration = $("#scroll_duration").val();
	scroll_duration_timer = setTimeout(function(e){
		if (duration > 0) {
			$("#scroll_duration").val(duration - 1);
			start_scroll_duration_decrement();
		}
	}, 1000);
}
function stop_scroll_duration_decrement() {
	clearTimeout(scroll_duration_timer);
	$("html, body").stop();
}